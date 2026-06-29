<?php
session_start();

require_once __DIR__ . '/../core/Router.php';
require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../core/Model.php';
require_once __DIR__ . '/../config/database.php';

$url = isset($_GET['url']) ? $_GET['url'] : '';
$router = new Router();
$router->dispatch($url);
