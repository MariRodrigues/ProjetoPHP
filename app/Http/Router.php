<?php

namespace App\Http;
use \Closure;
use Exception;

class Router
{
    /**
     * URL completa do projeto (raiz)
     */
    private $url = '';

    /**
     * Prefixo de todas as rotas
     */
    private $prefix = '';

    /**
     * Índice de rotas
     */
    private $routes = [];

    /**
     * Instância de request
     */
    private $request;

    /**
     * Método responsável por iniciar a classe
     */
    public function __construct($url)
    {
        $this->request = new Request();
        $this->url = $url;
        $this->setPrefix();
    }

    private function setPrefix()
    {
        // Informações da URL atual
        $parseUrl = parse_url($this->url);

        //Define o prefixo
        $this->prefix = $parseUrl['path'] ?? '';
    }

    private function addRoute($method, $route, $params = [])
    {
        //Validação dos parâmetros
        foreach($params as $key=>$value) {
            if($value instanceof Closure){
                $params['controller'] = $value;
                unset($params[$key]);
                continue;
            }
        }

        //Padrão de validação
        $patternRoute = '/^'.str_replace('/','\/',$route).'$/';

        //Adiciona a rota dentro da classe
        $this->routes[$patternRoute][$method] = $params;
    }

    /**
     * Método responsável por definir uma rota de GET
     */
    public function get($route, $params = [])
    {
        return $this->addRoute('GET', $route, $params);
    }

    /**
     * Método responsável por executar a rota atual
     * @return Response
     */
    public function run() {
        try {
            throw new Exception("Página não encontrada", 404);

        } catch (Exception $e){
            return new Response($e->getCode(), $e->getMessage());
        }
    }

}
