<?php
// Inclui o arquivo de configuração para obter definições e configurações globais
require_once("./config/database.php");

Database::getConnection();

// Obtém a URI da requisição atual
// $uri = urldecode(
//     parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
// );

// // Verifica se a URI é a raiz, vazia ou '/index.php' e redefine para '/day_records.php' se verdadeiro
// if ($uri === '/' || $uri === '' ||  $uri === '/index.php') {
//     $uri = '/day_records.php';
// }

// // Inclui o controlador correspondente à URI solicitada
// require_once(CONTROLLER_PATH . "/{$uri}");
