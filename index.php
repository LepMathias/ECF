<?php
//documentation https://altorouter.com/
use lib\AltoRouter;

require_once __DIR__ . '/lib/AltoRouter.php';

$router = new AltoRouter();

$router->map( 'GET|POST', '/', function() {
    require_once __DIR__ . '/public/pages/index.php';
});
$router->map( 'GET|POST', '/menus', function() {
    require_once __DIR__ . '/public/pages/menus.php';
});


$match = $router->match();

// call closure or throw 404 status
if( is_array($match) && is_callable( $match['target'] )) {
    call_user_func_array( $match['target'], $match['params'] );
} else {
    // no route was matched
    header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
}