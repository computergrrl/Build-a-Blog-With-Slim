<?php

class Data

{

  protected $blogdb;

  public function __construct($blogdb)
    {
     $this->blogdb = $blogdb;

  }

  public function getData()
  {
    $data = $this->blogdb->prepare('SELECT * FROM blog');
    $data->execute();
    $results = $data->fetchAll(PDO::FETCH_ASSOC);
    return $results;

  }

  public function listEntries()
  {

               foreach($this->getData() as $entry) {
                 $getdate = $entry['Date'];
                 $date = date("F d, Y", strtotime($getdate));

                   echo '<h2><a href="/detail?q=' .
                   $entry["BlogId"] . '">' ;

                   echo $entry['Title'] . '</a></h2>';

                   echo '<time datetime="'  . $getdate . '">';
                   echo $date . '</time>';
                }

        return array();

  }

  public function getComments()
  {

    $sql = $this->blogdb->prepare("SELECT * FROM comments");
    $sql->execute();
    $results = $sql->fetchAll(PDO::FETCH_ASSOC);
    return $results;

  }



}
