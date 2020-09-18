<?php

require_once 'vendor/autoload.php';

use CoffeeCode\Router\Router;
use Source\Model\Ricoshop;

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
$route->post("/", "Ricoshop:ricoshopsIndex");
$route->get("/{page}", "Ricoshop:ricoshopsIndex");
$route->get("/loja/{nome}", "Ricoshop:show");
$route->get("/{id}/edit", "Ricoshop:edit");
$route->post("/{id}/edit", "Ricoshop:edit");

$route->group("/ops");
$route->get("/{errcode}", "Coffee:notFound");

$route->dispatch();

if ($route->error()) {
    $route->redirect("/ops/{$route->error()}");
}

ob_end_flush();