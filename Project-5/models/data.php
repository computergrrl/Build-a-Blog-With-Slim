<?php

class Data

{

  protected $blogdb;

  public function __construct($blogdb)
    {
     $this->blogdb = $blogdb;

  }

  public function blogdata()
  {
    $data = $this->blogdb->prepare('SELECT * FROM blog');
    $data->execute();
    $results = $data->fetchAll(PDO::FETCH_ASSOC);
    return $results;

  }

   
}
