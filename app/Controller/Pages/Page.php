<?php

namespace App\Controller\Pages;

use \App\Utils\View;

//Recebe uma ação de consulta, consulta o model para obter os dados e passa os dados para a view
class Page {

    /**
     * Método responsável por renderizar o topo da página
     * @return string
     */
    private static function getHeader() {
        return View::render('pages/header');
    }

    /**
     * Método responsável por renderizar o footer da página
     * @return string
     */
    private static function getFooter() {
        return View::render('pages/footer');
    }


    /**
     * Método responsável por retornar o conteúdo (view) da nossa página genérica
     * @return string
     */
    public static function getPage($title, $content) { 
        return View::render('pages/page', [
            'title' => $title,
            'header' => self::getHeader(),
            'content' => $content,
            'footer' => self::getFooter()
        ]);
    }

}