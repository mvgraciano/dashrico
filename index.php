<?php

require_once 'vendor/autoload.php';

use CoffeeCode\Router\Router;

ob_start();

$route = new Router(url(), ":");
$route->namespace("Source\App");

$route->group(null);
$route->get("/", "App:home");

$route->group("/produtos");
$route->get("/", "Produto:productsIndex");
$route->get("/{page}", "Produto:productsIndex");

$route->group("/ricoshops");
$route->get("/", "Ricoshop:ricoshopsIndex");
$route->get("/{page}", "Ricoshop:ricoshopsIndex");

$route->group("/ops");
$route->get("/{errcode}", "Coffee:notFound");

$route->dispatch();

if ($route->error()) {
    $route->redirect("/ops/{$route->error()}");
}

ob_end_flush();