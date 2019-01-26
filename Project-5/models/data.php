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
                   echo '<h2><a href="detail.php?q=' .
                   $entry["blogId"] . '">' .

                   $entry['Title'] . '</a></h2>';

                    echo '<time datetime="'  .
                    $getdate . '">' .
                     $date . '</time>';
                }

        return array();

  }
}
