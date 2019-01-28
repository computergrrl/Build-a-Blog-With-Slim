<?php

use Slim\Http\Request;
use Slim\Http\Response;

// Routes

//$app->redirect('./');
$app->get('/test', function (Request $request, Response $response, array $args) {
    // Sample log message
    $args['db'] = $this->db;
    $args['data'] = $this->data;
    $args['blog'] = $this->data->getData();
    $args['id'] = $_GET['q'] ;
    $this->logger->info("Amber was here '/detail' route");


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

    $args['db'] = $this->db;
    $args['data'] = $this->data;
    $args['blog'] = $this->data->getData();
    $args['id'] = $_GET['q'] ;
    $this->logger->info("Amber was here '/detail' route");


    // Render index view
    return $this->renderer->render($response, 'detail.spark', $args);

});

$app->get('/new', function (Request $request, Response $response, array $args) {
    // Sample log message
    $args['db'] = $this->db;
    $args['data'] = $this->data;
    $this->logger->info("Amber was here '/new' route");

    // Render index view
    return $this->renderer->render($response, 'new.spark', $args);

});

$app->map(['GET', 'POST'], '/edit', function (Request $request, Response $response, array $args) {
    // Sample log message

    $args['db'] = $this->db;
    $args['data'] = $this->data;
    $args['blog'] = $this->data->getData();
    $args['id'] = $_GET['q'];
    $this->logger->info("Amber was here '/edit' route");


    if($request->getMethod() == 'POST') {

          $args = array_merge($args, $request->getParsedBody());


          $title = $args['title'];
          $entry = $args['entry'] ;
          $id = $args['id'];
          if(!empty($args['title']) && !empty($args['entry'])) {
           $this->data->editData($title, $entry, $id);

          }

          else {echo "These are empty!";}

    }

    // Render index view
    return $this->renderer->render($response, 'edit.spark', $args);

});


$app->get('/', function (Request $request, Response $response, array $args) {
    // Sample log message

    $args['db'] = $this->db;
    $args['data'] = $this->data;
    $args['blog'] = $this->data->getData();
    $this->logger->info("Amber was here '/' route");


    // Render index view
    return $this->renderer->render($response, 'index.spark', $args);

});
