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
    /*gets all the data from the blog table and returns data as
    an associative array  */
    $data = $this->blogdb->prepare('SELECT * FROM blog');
    $data->execute();
    $results = $data->fetchAll(PDO::FETCH_ASSOC);
    return $results;

  }

/*******************************************************************/
  public function listEntries()
  {
/*gets all the data from the blog table and orders it by date.  Then returns
that data as an associative array  */
    $data = $this->blogdb->prepare('SELECT * FROM blog ORDER BY DATE desc');
    $data->execute();
    $results = $data->fetchAll(PDO::FETCH_ASSOC);


        return $results;

  }

/******************************************************************/

//Gets the details for a specific blog entry
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
    /*Calls the getDetails method and then uses that info to set variables
    that will be used in HTML display */
          $data = $this->getDetails($id);
          $getdata = $data[0];
          $title = $getdata['Title'];
          $getdate = $getdata['Date'];
          $date = date("F d, Y", strtotime($getdate));
          $entry = $getdata['Entry'];

/*returns the assigned variables as an associative array which can be used
in HTML display  */
        return array('title' => $title,
                     'getdate' => $getdate,
                     'date'=> $date,
                     'entry' => $entry);



  }


/********************************************************************/

//CRUD for adding new entry

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

//CRUD for editing an entry
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




}
