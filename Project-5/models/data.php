<?php

class Data

{

  protected $blogdb;

  public function __construct($blogdb)
    {
     $this->blogdb = $blogdb;

  }


  /******************************************************************
                      BLOG  DATA AND ENTRIES
  ******************************************************************/


  public function getData()
  {
    $data = $this->blogdb->prepare('SELECT * FROM blog');
    $data->execute();
    $results = $data->fetchAll(PDO::FETCH_ASSOC);
    return $results;

  }

/*******************************************************************/
  public function listEntries()
  {

    $data = $this->blogdb->prepare('SELECT * FROM blog ORDER BY DATE desc');
    $data->execute();
    $results = $data->fetchAll(PDO::FETCH_ASSOC);


        return $results;

  }

/******************************************************************/
  public function getDetails($id)
  {

        $sql = $this->blogdb->prepare("SELECT * FROM blog WHERE BlogID = ?");
        $sql->bindValue(1, $id , PDO::PARAM_INT);
        $sql->execute();
        $results = $sql->fetchALL(PDO::FETCH_ASSOC);
        return $results;
  }

/***************************************************************/
  public function displayDetails($id)
  {
          $data = $this->getDetails($id);
          $getdata = $data[0];
          $title = $getdata['Title'];
          $getdate = $getdata['Date'];
          $date = date("F d, Y", strtotime($getdate));
          $entry = $getdata['Entry'];


        return array('title' => $title,
                     'getdate' => $getdate,
                     'date'=> $date,
                     'entry' => $entry);



  }


/********************************************************************/

    public function newEntry($title, $date, $entry)
    {

        $sql = $this->blogdb->prepare("INSERT INTO blog (Title,
          Date, Entry) VALUES (?, ?, ?)");

        $sql->bindValue(1 , $title, PDO::PARAM_STR);
        $sql->bindValue(2 , $date, PDO::PARAM_STR);
        $sql->bindValue(3 , $entry, PDO::PARAM_STR);
        $sql->execute();


    }

/********************************************************************/


    public function editData($title, $entry, $id)
    {

          $sql = $this->blogdb->prepare("UPDATE blog SET Title = ?, Entry = ?
              WHERE BlogID = ?");

          $sql->bindValue(1, $title , PDO::PARAM_STR);
          $sql->bindValue(2, $entry , PDO::PARAM_STR);
          $sql->bindValue(3, $id , PDO::PARAM_INT);
          $sql->execute();

          return true;


    }


    /******************************************************************
                             BLOG  COMMENTS
    ******************************************************************/



}
