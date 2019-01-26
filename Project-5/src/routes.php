<?php

use Slim\Http\Request;
use Slim\Http\Response;

// Routes
$app->get('/amber', function (Request $request, Response $response, array $args) {
    // Render index view
    $response->getBody()->write("Hello, $name");


});

$app->get('/', function (Request $request, Response $response, array $args) {
    // Sample log message
    $this->logger->info("Amber was here '/' route");
    $args['db'] = $this->db;
    $args['data'] = $this->data;


    // Render index view
    return $this->renderer->render($response, 'index.spark', $args);


});


//
// $app->get('../models', function (Request $request, Response $response, array $args) {
//     // Sample log message
//     // $this->logger->info("Slim-Skeleton '/' route");
//     $args['blogdb'] = $this->db;
//     $args['info'] = $args['db']->
//
//     // Render index view
//     return $this->renderer->render($response, 'data.php', $args);
//
//
//
// });
