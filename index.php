<?php
require_once 'vendor/autoload.php';

$router = new AltoRouter();//instance du Routeur

$router->setBasePath("/Projets/superWeek");//definir le chemin racine du projet ;
// var_dump($router);

$router->map('GET', '/', function () {
    echo "<h1>Bienvenu sur l'accueil</h1>";
}, '/');//cartographie de nos route

$router->map('GET','/users',function(){
    echo "<h1>Bienvenu sur la liste des Utilisateurs </h1>";
},'users');

$router->map('GET','/users1',function(){
    echo "<h1>Bienvenu sur la page de l'utilisateur 1 </h1>";
},'users1');

$match = $router->match();

if (is_array($match) && is_callable($match['target'])) {
    call_user_func_array($match['target'], $match['params']);
} else {
    // no route was matched
    header($_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
}
