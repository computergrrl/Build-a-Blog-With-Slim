<?php

class Data

{

  protected $blogdb;

  public function __construct($blogdb)
    {
     $this->blogdb = $blogdb;

  }


/*****************************************************************/
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
  public function displayDetails($id)
  {

          $getdata = $this->getData();
          $title = $getdata[$id]['Title'];
          $getdate = $getdata[$id]['Date'];
          $date = date("F d, Y", strtotime($getdate));
          $entry = $getdata[$id]['Entry'];


        return array('title' => $title,
                     'getdate' => $getdate,
                     'date'=> $date,
                     'entry' => $entry);

  }


/********************************************************************/

    public function displayEditPage()
    {

      // echo "<form method=\"post\">
      //     <label for="title"> Title</label>
      //     <input type="text" name="title"><br>
      //     <label for="entry">Entry</label>
      //     <textarea rows="5" name="entry"></textarea>
      //     <input type="submit" value="Save Entry" class="button">
      //     <a href="#" class="button button-secondary">Cancel</a>
      // </form>
      //
    }

/********************************************************************/


    public function editData($title, $entry, $id)
    {

          $sql = $this->blogdb->prepare("UPDATE blog SET Title = ?, Entry = ?,
              WHERE BlogID = ?");

          $sql->bindValue(1, '$title' , PDO::PARAM_STR);
          $sql->bindValue(2, '$entry' , PDO::PARAM_STR);
          $sql->bindValue(3, '$id' , PDO::PARAM_INT);
          $sql->execute();



    }


    /******************************************************************
                             BLOG  COMMENTS
    ******************************************************************/



  public function getComments($id = null)
  {

          $sql = $this->blogdb->prepare("SELECT * FROM comments WHERE BlogID = ?");
          $sql->bindValue(1, $id, PDO::PARAM_INT);
          $sql->execute();
          $results = $sql->fetchAll(PDO::FETCH_ASSOC);
          return $results;



  }

/*********************************************************************/
  public function displayComments($id = null)
  {

    foreach($this->getComments($id) as $comment) {
    echo '<div class="comment">';
    echo "<strong>" . $comment['name'] . "</strong>";
    echo '<time datetime="' .$comment['date'] . '">' .$comment['date'] . "</time>";
    echo '<p>' . $comment['comment'] . '</p></div>';

    }
    return true;
  }

/************************************************************************/

}
