<?php

if (!defined('_PS_VERSION_')) {
    exit;
}

class AgriProductHistory extends Module
{
    public function __construct()
    {
        $this->name = 'agriproducthistory';
        $this->tab = 'administration';
        $this->version = '1.0.0';
        $this->author = 'Maxime LE GENTIL';
        $this->need_instance = 0;
        $this->bootstrap = true; // Pour utiliser le style BO de PrestaShop

        parent::__construct();

        $this->displayName = $this->l('Historique des modifications produits');
        $this->description = $this->l('Affiche dans la fiche produit qui a modifié le produit et à quelle date en utilisant les logs natifs.');
    }

    public function install()
    {
        return parent::install();
    }

    public function uninstall()
    {
        return parent::uninstall();
    }
}
