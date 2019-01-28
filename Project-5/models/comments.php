<?php

class  Comments

{

    protected $blogdb;


/****** CONSTRUCTOR *******/


  public function __construct($blogdb)
  {
      $this->blogdb = $blogdb;

  }

/*********************************************************/


/*SQL statement for fetching comments associated with blogID */

  public function getComments($id = null)
  {

        $sql = $this->blogdb->prepare("SELECT * FROM comments WHERE BlogID = ?");
        $sql->bindValue(1, $id, PDO::PARAM_INT);
        $sql->execute();
        $results = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $results;



  }

/*********************************************************************/



  public function newComment($id, $name, $comment, $date)
  {

    /* CRUD for adding a new comment  */
        $sql = $this->blogdb->prepare("INSERT INTO comments
      (BlogId, name, comment, date) VALUES
      (?, ?, ?, ?)");

      $sql->bindValue(1, $id, PDO::PARAM_STR);
      $sql->bindValue(2, $name, PDO::PARAM_STR);
      $sql->bindValue(3, $comment, PDO::PARAM_STR);
      $sql->bindValue(4, $date, PDO::PARAM_STR);
      $sql->execute();
  }

/************************************************************************/







}
