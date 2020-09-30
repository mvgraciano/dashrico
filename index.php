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
$route->post("/", "Ricoshop:ricoshopsIndex");
$route->get("/{page}", "Ricoshop:ricoshopsIndex");
$route->get("/loja/{nome}", "Ricoshop:show");
$route->get("/{id}/edit", "Ricoshop:edit");
$route->post("/{id}/edit", "Ricoshop:edit");

$route->get("/planos", "PlanoRicoshop:index");
$route->post("/planos", "PlanoRicoshop:index");
$route->get("/planos/{nome}", "PlanoRicoshop:show");
$route->get("/planos/{id}/edit", "PlanoRicoshop:edit");
$route->post("/planos/{id}/edit", "PlanoRicoshop:edit");

$route->get("/assinaturas", "AssinaturaRicoshop:index");
$route->get("/assinaturas/{page}", "AssinaturaRicoshop:index");
$route->get("/assinaturas/{id}", "AssinaturaRicoshop:show");
$route->get("/assinaturas/{id}/edit", "AssinaturaRicoshop:edit");
$route->post("/assinaturas/{id}/edit", "AssinaturaRicoshop:edit");
$route->get("/assinaturas/nova", "AssinaturaRicoshop:new");
$route->post("/assinaturas/nova", "AssinaturaRicoshop:new");

$route->get("/assinaturas/{id}/financeiro", "LancamentoFinanceiro:index");
$route->get("/assinaturas/{id}/financeiro/lancamento", "LancamentoFinanceiro:new");
$route->post("/assinaturas/{id}/financeiro/lancamento", "LancamentoFinanceiro:new");

$route->group("/ops");
$route->get("/{errcode}", "Coffee:notFound");

$route->dispatch();

if ($route->error()) {
    $route->redirect("/ops/{$route->error()}");
}

ob_end_flush();