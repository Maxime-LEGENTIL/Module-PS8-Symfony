<?php

namespace Agriproducthistory\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ControllerEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Twig\Environment;

class ProductAdminSubscriber implements EventSubscriberInterface
{
    private $twig;
    private $db;

    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
        $this->db = \Db::getInstance();
    }

    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::CONTROLLER => 'onKernelController',
        ];
    }

    public function onKernelController(ControllerEvent $event)
    {
        $request = $event->getRequest();
        $route = $request->attributes->get('_route');

        if ($route === 'admin_product_form') {
            $productId = $request->attributes->get('id');

            // Récupère ton historique depuis ta table custom
            $logs = $this->db->executeS('
                SELECT * FROM '._DB_PREFIX_.'agriproduct_logs
                WHERE id_product = '.(int)$productId.'
                ORDER BY date_add DESC
            ');

            // Injecte dans le contexte Twig
            $this->twig->addGlobal('agriproduct_logs', $logs);
        }
    }
}
