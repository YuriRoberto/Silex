<?php 

require __DIR__ . '/../vendor/autoload.php';

$app = new Silex\Application();

$app->get('\hello world', function(){
    return "Hello World!! Minha primeira aplicação com Silex!";
});

$app->get('/home', function(){
    return "<form method='post' action='/home'>
        <input type='text' name='name'/>
        <button type='submit'>Enviar</button>    
    </form>";
});

$app->post('/home', function(){
    $name = $request->get('name','sem nome');
    $data = $request->request->all();
    print_r($data);die();
    return new Response("Post foi enviado! Name:$name", 404);
});

$app->run();
