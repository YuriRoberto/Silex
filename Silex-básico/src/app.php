<?php 

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$app = new Silex\Application();

$app->get('\hello world', function(){
    return "Hello World!! Minha primeira aplicação com Silex!";
});

$app->get('/home', function(){
    ob_start();
    include __DIR__ . '/../templates/home.phtml';
    $saida = ob_get_clean();
    return $saida;
});

$app->post('/get-name/{param1}/{param2}', function(Request $request, $param2, $param1){
    $name = $request->get('name','sem nome');
    ob_start();
    include __DIR__ . '/../templates/get-name.phtml';
    $saida = ob_get_clean();
    return $saida;
});

$app->run();

