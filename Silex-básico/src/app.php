<?php 

use SON\ViewRenderer;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$app = new Silex\Application();

$app['debug'] = true;

$app['valor1'] = "Teste";

$app['view.config'] =[
    'path\-templates' => __DIR__ . '/../templates'
];

$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
    'db.options' => array(
        'driver' => 'pdo_mysql',
        'host' => 'localhost',
        'dbname' => 'son_silex_basico',
        'user' => 'root',
        'password' => '1234'

    ),
));

$app['view.renderer'] =function(){
    $pathTemplates = $app['view.config']['path_templates'];
    return new ViewRenderer($pathTemplates);
};

$app->get('\create-table', function(Silex\Application $app){
    
    $file = fopen(__DIR__ . '/../data/schema.sql', 'r');
    while ($line = fread($file, 4096)){
        $app['db']->executeQuery($line);
    }

    fclose($file);

    return "Tabelas criadas";
});

$app->get('/home', function() use($app){
    
    return $app['view.renderer']->render('home');
});

$app->post('/get-name/{param1}/{param2}', function(Request $request, Silex\Application $app, $param2, $param1){
    $name = $request->get('name','sem nome');
    return $app['vew.renderer']->render('home', [
        'name' => $name,
        'param1' =>$param1,
        'param2' => $param2
    ]);

    $name = $request->get('name','sem nome');
});

$app->run();

