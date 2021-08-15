<?php
namespace App\Http;

class Response {
    private $httpCode = 200;

    /**
     * Cabeçalho do Response
     * @var array
     */
    private $headers = [];

    /**
     * Tipo de conteúdo que está sendo retornado
     */
    private $contentType = 'text/html';

    /**
     * Conteúdo do Response
     */
    private $content;

    public function __construct($httpCode, $content, $contentType= 'text/html')
    {
        $this->httpCode = $httpCode;
        $this->content = $content;
        $this->setContentType($contentType);
        
    }

    /**
     * Método responsável por alterar o contentType do response
     */
    public function setContentType($contentType) {
        $this->contentType = $contentType;
        $this->addHeader('Content-Type', $contentType);
    }

    /**
     * Método responsável por adicionar um registro no cabeçalho de response
     */
    public function addHeader($key, $value) {
        $this->headers[$key] = $value;
    }

    /**
     * Método responsável por enviar os headers para o navegador
     */
    private function sendHeaders(){
        //Status
        http_response_code($this->httpCode);

        //enviar headers
        foreach($this->headers as $key=>$value){
            header($key.': '.$value);
        }
    }

    /**
     * Método responsável por enviar a resposta para o usuário
     */
    public function sendResponse() {
        //Envia os headers
        $this->sendHeaders();

        //Imprime o conteúdo
        switch($this->contentType){
            case 'text/html':
                echo $this->content;
                break;
        }
    }

}