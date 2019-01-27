<?php

use Slim\Http\Request;
use Slim\Http\Response;

// Routes

//$app->redirect('./');
$app->get('/test', function (Request $request, Response $response, array $args) {
    // Sample log message
    $this->logger->info("Amber was here '/detail' route");
    $args['db'] = $this->db;
    $args['data'] = $this->data;

    // Render index view
    return $this->renderer->render($response, 'test.spark', $args);

});
//**********Example from StackOverflow.com************
// $app->post('/', function ($request, $response, $args) {
//     $email = $request->getParam('Email');
//     $subject = $request->getParam('Subject');
//     echo "Email: $email<br/>";
//     echo "Subject: $subject";
// });

$app->get('/detail', function (Request $request, Response $response, array $args) {
    // Sample log message
    $this->logger->info("Amber was here '/detail' route");

    $args['db'] = $this->db;
    $args['data'] = $this->data;



    // Render index view
    return $this->renderer->render($response, 'detail.spark', $args);

});

$app->get('/new', function (Request $request, Response $response, array $args) {
    // Sample log message
    $this->logger->info("Amber was here '/new' route");
    $args['db'] = $this->db;
    $args['data'] = $this->data;


    // Render index view
    return $this->renderer->render($response, 'new.spark', $args);

});

$app->map(['GET', 'POST'], '/edit', function (Request $request, Response $response, array $args) {
    // Sample log message
    $this->logger->info("Amber was here '/edit' route");
    $args['db'] = $this->db;
    $args['data'] = $this->data;

    if($request->getMethod() == 'POST') {

          $args = array_merge($args, $request->getParsedBody());
          if(!empty($args['title']) || !empty($args['entry'])) {
            echo $args['title'];
          }

          else {echo "These are empty!";}

    }

    // Render index view
    return $this->renderer->render($response, 'edit.spark', $args);

});


$app->get('/', function (Request $request, Response $response, array $args) {
    // Sample log message
    $this->logger->info("Amber was here '/' route");
    $args['db'] = $this->db;
    $args['data'] = $this->data;


    // Render index view
    return $this->renderer->render($response, 'index.spark', $args);

});
