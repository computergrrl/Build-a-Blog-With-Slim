<?php

use Slim\Http\Request;
use Slim\Http\Response;

// Routes


// $app->get('/test', function (Request $request, Response $response, array $args) {
//
//     $args['db'] = $this->db;
//     $args['data'] = $this->data;
//     $args['blog'] = $this->data->getData();
//     // $args['id'] = $_GET['q'] ;
//     $this->logger->info("Amber was here '/detail' route");
//
//
//
//     return $this->renderer->render($response, 'test.spark', $args);
//
// });
/**************DETAIL PAGE *****************************************/
$app->map(['GET', 'POST'], '/detail/{q}', function (Request $request, Response $response, array $args) {


    $args['db'] = $this->db;
    $args['data'] = $this->data;
    $args['comments'] = $this->comments;
    $args['blog'] = $this->data->getData();
    $this->logger->info("Amber was here '/detail' route");

    if($request->getMethod() == 'POST') {

    $args = array_merge($args, $request->getParsedBody());

      $id = $args['q'];
      $name = $args['name'];

      //if no name is entered, then the name "Anonymous" will be used
          if(empty($name)) {
            $name = "Anonymous";
          }
      $comment = $args['comment'];
      $date = date("F d, Y h:i A");

      if(!empty($comment)) {
        $this->comments->newComment($id, $name, $comment, $date);
      }
  }



    return $this->renderer->render($response, 'detail.spark', $args);

});

/************ NEW ENTRY PAGE ***************************************/

$app->map(['GET', 'POST'], '/new', function (Request $request, Response $response, array $args) {


    $args['db'] = $this->db;
    $args['data'] = $this->data;

    $this->logger->info("Amber was here '/new' route");

    if($request->getMethod() == 'POST') {

    $args = array_merge($args, $request->getParsedBody());


          $title = $args['title'];
          $date = $args['date'];
          $entry = $args['entry'] ;

          if(!empty($title) && !empty($date)
        && !empty($entry)) {
           $this->data->newEntry($title, $date, $entry);

         }  elseif(empty($_POST['title'] || $_POST['date'] ||
                 $_POST['entry'])) {

                   $args['error'] =
                    '<span class="error">All fields required</span>';
                 }

    }

    return $this->renderer->render($response, 'new.spark', $args);

});

/*******************   EDIT PAGE  ***********************************/

$app->map(['GET', 'POST'], '/edit/{q}', function (Request $request, Response $response, array $args) {


    $args['db'] = $this->db;
    $args['data'] = $this->data;
    $args['blog'] = $this->data->getData();
    $this->logger->info("Amber was here '/edit' route");


    if($request->getMethod() == 'POST') {

          $args = array_merge($args, $request->getParsedBody());


          $title = $args['title'];
          $entry = $args['entry'] ;
          $id = $args['q'];
          if(!empty($args['title']) && !empty($args['entry'])) {
           $this->data->editData($title, $entry, $id);

          }
        }

    return $this->renderer->render($response, 'edit.spark', $args);

});

$app->get('/', function (Request $request, Response $response, array $args) {


    $args['db'] = $this->db;
    $args['data'] = $this->data;
    $args['blog'] = $this->data->getData();
    $this->logger->info("Amber was here '/' route");



    return $this->renderer->render($response, 'index.spark', $args);

});




/*********************************************************************
/********** JUST FOR FUN - DATABASE POPULATION PAGE ******************
**********************************************************************/

$app->get('/pop', function (Request $request, Response $response, array $args) {


    $args['db'] = $this->db;
    $args['data'] = $this->data;
    $args['blog'] = $this->data->getData();
    $this->logger->info("Amber was here '/' route");



    return $this->renderer->render($response, 'population_arrays.php', $args);

});
