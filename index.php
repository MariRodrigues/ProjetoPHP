<?php

require __DIR__.'/vendor/autoload.php';

use \App\Http\Router;
use \App\Http\Response;
use \App\Controller\Pages\Home;

define('URL','http://localhost:8090/projeto');

$obRouter = new Router(URL);

$obRouter->get('/', [
    function(){
        return new Response(200, Home::getHome());
    }
]);

$obRouter->run()->sendResponse();