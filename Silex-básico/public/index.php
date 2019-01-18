<?php 

require __DIR__ . '/../vendor/autoload.php';

$app = new Silex\Application();

$app->get('\hello world', function(){
    return "Hello World!! Minha primeira aplicação com Silex!";
});

$app->run();
