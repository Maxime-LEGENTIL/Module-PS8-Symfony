<?php

namespace agriproducthistory\Controller\Override;

use PrestaShopBundle\Controller\Admin\Sell\Catalog\Product\ProductEditController as CoreProductEditController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductEditController extends CoreProductEditController
{
    private $innerController;

    public function __construct($innerController /*, autres dépendances si nécessaire*/)
    {
        $this->innerController = $innerController;
        echo "ok";
    }

    public function editAction(Request $request): Response
    {
        // Ajoutez vos données personnalisées dans l'objet Request
        $request->attributes->set('customData', 'Mon info personnalisée à afficher');
        
        // Appel au controller d'origine
        $response = $this->innerController->editAction($request);
        
        return $response;
    }
    
}
