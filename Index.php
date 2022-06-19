<?php
use Core\Router;

require_once __DIR__ . '/vendor/autoload.php';

$router = new Router;

$dotenv = Dotenv\Dotenv::createUnsafeImmutable(__DIR__);
$dotenv->load();

//echo getenv('APP_ENV')."\n";
//echo getenv('NOME')."\n";
//echo getenv('SENHA')."\n";
