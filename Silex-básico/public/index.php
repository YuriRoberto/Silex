<?php 

require __DIR__ . '/../vendor/autoload.php';

$app = new Silex\Application();

$app->get('\hello world', function(){
    return "Hello World!! Minha primeira aplicação com Silex!";
});

$app->get('/home', function(){
    return "<form method='post' action='/get-name/son/valor2'>
        <input type='text' name='name'/>
        <button type='submit'>Enviar</button>    
    </form>";
});

$app->post('/get-name/{param1}/{param2}', function(Request $request, $param2, $param1){
    $name = $request->get('name','sem nome');
    
    return "Post foi enviado.
        <br/>Name:$name.
        <br/>Param1: $param1.
        <br/>Param2: $param2.
        ";
});

$app->run();
