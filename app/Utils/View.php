<?php

namespace App\Utils;

//Métodos que vão renderizar as views

class View {
    /**
     * Método responsável por retornar o conteúdo de uma view
     * Recebe o conteúdo exato
     * @param string view
     * @return string
     */
    private static function getContentView($view){
        $file = __DIR__.'/../../resources/view/'.$view.'.html';
        return file_exists($file) ? file_get_contents($file) : '';

    }


    /**
     * Método responsável por retornar o conteúdo renderizado de uma view
     * Passa as variáveis para as views
     * @param string view
     * @param array $vars (strings/numerics)
     * @return string
     */
    public static function render ($view, $vars = []) {
        // Conteudo da view
        $contentView = self::getContentView($view);

        //Descobrir a chave do array de variáveis
        $keys = array_keys($vars);
        $keys = array_map(function($item) {
            return '{{'.$item.'}}';
        }, $keys);
 
        return str_replace($keys, array_values($vars), $contentView);

    }
}