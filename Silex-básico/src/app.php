<?php 

use SON\ViewRenderer;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$app = new Silex\Application();

$app['valor1'] = "Teste";

$app['view.config'] =[
    'path\-templates' => __DIR__ . '/../templates'
];

$app['view.renderer'] =function(){
    $pathTemplates = $app['view.config']['path_templates'];
    return new ViewRenderer($pathTemplates);
};

$app->get('\hello world', function(Silex\Application $app){
    echo $app['get_date_time']->format(\DateTime::W3C);
    echo "<br/>";
    sleep(10);
    echo$app['get_date_time']->format(\DateTime::W3C);

    return "Hello World!! Minha primeira aplicação com Silex!"{$app['valor1']};
});

$app->get('/home', function() use($app){
    
    return $app['view.renderer']->render('home',[]);
});

$app->post('/get-name/{param1}/{param2}', function(Request $request, Silex\Application $app, $param2, $param1){
    echo $app['valor1'];
    $name = $request->get('name','sem nome');
    ob_start();
    include __DIR__ . '/../templates/get-name.phtml';
    $saida = ob_get_clean();
    return $saida;
});

$app->run();

