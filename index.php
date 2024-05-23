<?php

require_once "./src/model/articles.php";
require_once "./src/model/categories.php";

$routes = [];

route('/Blog-AFPA-ECF4', function () {
    require_once "./src/template/home.php";
    echo "<br>";
});

route('/Blog-AFPA-ECF4/connexion', function () {
    require_once "./src/template/connexion.php";
    echo "connexion";
    echo "<br>";
});

route('/Blog-AFPA-ECF4/ajout', function () {
    require_once "./src/template/ajouter.php";
    echo "ajouter";
    echo "<br>";
});

function route(string $path, callable $callback)
{
    global $routes;
    $routes[$path] = $callback;
}

run();

function run()
{
    global $routes;
    $uri = $_SERVER['REQUEST_URI'];
    $found = false;
    foreach ($routes as $path => $callback) {

        

        if($path !== $uri) continue; 

        $found = true;
        $callback();
    }

    if (!$found) {
        $notFoundCallback = $routes['/Blog-AFPA-ECF4'];
        $notFoundCallback();
    }
}
