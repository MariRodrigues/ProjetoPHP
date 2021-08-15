<?php

namespace App\Controller\Pages;

use \App\Utils\View;
use \App\Model\Entity\Qualidade;

//Recebe uma ação de consulta, consulta o model para obter os dados e passa os dados para a view
class Home extends Page {
    /**
     * Método responsável por retornar o conteúdo (view) da home
     * @return string
     */
    public static function getHome() { 
        $objQualidade = new Qualidade;

        $content = View::render('pages/home', [
            'name' => $objQualidade->name,
            'description' => $objQualidade->description
        ]);

        return parent::getPage('WDEV - Canal - Home', $content);
    }

}