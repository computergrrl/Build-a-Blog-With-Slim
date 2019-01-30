<?php

use Slim\Http\Request;
use Slim\Http\Response;

// Routes

/**************DETAIL PAGE *****************************************/
$app->map(['GET', 'POST'], '/detail/{q}', function (Request $request, Response $response, array $args) {


    $args['db'] = $this->db;
    $args['data'] = $this->data;
    $args['comments'] = $this->comments;
    $args['blog'] = $this->data->getData();
    $q = $args['q'];
    $args['details'] = $this->data->displayDetails($q);
    $args['getComments'] = $this->comments->getComments($q);


    if($request->getMethod() == 'POST') {

    $args = array_merge($args, $request->getParsedBody());


      $name = $args['name'];

      //if no name is entered, then the name "Anonymous" will be used
          if(empty($name)) {
            $name = "Anonymous";
          }
      $comment = $args['comment'];
      $date = date("F d, Y h:i A");

      /*if form is posted and comment field has data in it then
      call the newComment method */
      if(!empty($comment)) {
        $this->comments->newComment($q, $name, $comment, $date);

        return $response->withStatus(302)->withHeader('Location' , "/detail/$q");
      }
  }


    return $this->renderer->render($response, 'detail.spark', $args);

});

/************ NEW ENTRY PAGE ***************************************/

$app->map(['GET', 'POST'], '/new', function (Request $request, Response $response, array $args) {


    $args['db'] = $this->db;
    $args['data'] = $this->data;



    if($request->getMethod() == 'POST') {

    $args = array_merge($args, $request->getParsedBody());


          $title = $args['title'];
          $date = $args['date'];
          $entry = $args['entry'] ;

          if(!empty($title) && !empty($date)
        && !empty($entry)) {
           $this->data->newEntry($title, $date, $entry);

//After adding new entry redirect to home page
return $response->withStatus(302)->withHeader('Location' , '/');


/*if any of the fields are left blank then set the value of $args['error']
so that it displays on the page  */

}  elseif(empty($_POST['title']) || empty($_POST['date']) ||
                 empty($_POST['entry'])) {


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
    $q = $args['q'];
    $args['details'] = $this->data->displayDetails($q);

    if($request->getMethod() == 'POST') {

          $args = array_merge($args, $request->getParsedBody());


          $title = $args['title'];
          $entry = $args['entry'] ;
          $id = $args['q'];

/* If the form fields aren't empty then go ahead and call to the editData
method which will update the database  */
          if(!empty($args['title']) && !empty($args['entry'])) {
           $this->data->editData($title, $entry, $id);


//After editing the form redirect to the homepage
      return $response->withStatus(302)->withHeader('Location' , '/');

/*if any of the fields are left blank then set the value of $args['error']
so that it displays on the page  */
}         elseif(empty($args['title']) || empty($args['entry'])) {


               $args['error'] =
                '<span class="error">Fields can not be left blank</span>';

                   }

    }

    return $this->renderer->render($response, 'edit.spark', $args);

});

/*******************   HOME PAGE  ***********************************/
$app->get('/', function (Request $request, Response $response, array $args) {


    $args['db'] = $this->db;
    $args['data'] = $this->data;
    $args['blog'] = $this->data->getData();
    $args['list'] = $this->data->listEntries();


    return $this->renderer->render($response, 'index.spark', $args);

});




/*********************************************************************
/********** JUST FOR FUN - DATABASE POPULATION PAGE ******************
**********************************************************************/

$app->get('/pop', function (Request $request, Response $response, array $args) {


    $args['db'] = $this->db;
    $args['data'] = $this->data;
    $args['blog'] = $this->data->getData();



    return $this->renderer->render($response, 'population_arrays.php', $args);

});
