<?php


require_once 'vendor/autoload.php';

use App\ControllerUser;
use App\AuthController;


$router = new AltoRouter(); //instance du Routeur
// $faker = Faker\Factory::create();


$router->setBasePath("/Projets/superWeek"); //definir le chemin racine du projet ;
// var_dump($router);

$router->map('GET', '/', function () {
    echo "<h1>Bienvenu sur l'accueil</h1>";
}, '/'); //cartographie de nos route

$router->map('GET', '/users', function () {
    $controllerUser = new ControllerUser();
    $controllerUser->showAllUser();
}, 'users');

$router->map('GET', '/users1', function () {
    echo "<h1>Bienvenu sur la page de l'utilisateur 1 </h1>";
}, 'users1');

$router->map('GET', '/users/createUser', function () {
    $controllerUser =  new ControllerUser();
    $controllerUser->insertUserFake();
    echo "<h1>page to Create User</h1>";
}, "/users/createUser");

$router->map('GET', '/users/register', function () { //register
    require_once(__DIR__ . '/src/View.php');
}, '/users/register');

$router->map('POST', '/users/register', function () { //registerForm
    require_once(__DIR__ . '/src/View.php');
    $controllerRegister = new AuthController();
    if (isset($_POST['submit'])) {
        $controllerRegister->register($_POST['email'], $_POST['firstname'], $_POST['lastname'], $_POST['password']);
    }
}, '/users/registerValidForm');

$router->map('GET', '/users/login', function () {
    require_once(__DIR__ . '/src/ViewLogin.php');
}, '/users/login');

$router->map('POST', '/users/login', function () {
    require_once(__DIR__ . '/src/ViewLogin.php');
    var_dump($_SESSION);
    $controllerRegister = new AuthController();
    if (isset($_POST['submit'])) {
        $controllerRegister->login($_POST['email'], $_POST['password']);
    }
}, '/users/loginOk');


$router->map('GET', '/users/[i:id]', function ($id) {
    $controllerUser = new AuthController();
    $id = $controllerUser->getId($id);
}, '/users/idSession');

$router->map('GET', '/books/write', function () {
    require_once(__DIR__ . '/src/ViewBook.php');
}, '/book/write');

$router->map('POST','/books/write',function(){
    require_once(__DIR__.'/src/ViewBook.php');
    session_start();
    var_dump($_SESSION);
    $controlleurBook = new AuthController();
    if(isset($_POST['submit'])){
        $controlleurBook->insertBook($_POST['title_book'],$_POST['content_book'],intval($_SESSION['user']['id']));
    }
},'/books/insertBook');

$router->map('GET','/books',function(){
            $controllerShowBook = new AuthController();
            $controllerShowBook->showBookUser();
},'/books');

$router->map('GET','/books/[i:id]',function($id){
    $controllerUser = new AuthController();
    $id = $controllerUser->getBookId($id);
},'/books/id');

$router->map('GET','/logout',function(){
            require_once(__DIR__.'/src/ViewLogout.php');
            var_dump($_SESSION);
},'/logout');


//Config route
$match = $router->match();

if (is_array($match) && is_callable($match['target'])) {
    call_user_func_array($match['target'], $match['params']);
} else {
    // no route was matched
    header($_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
}
