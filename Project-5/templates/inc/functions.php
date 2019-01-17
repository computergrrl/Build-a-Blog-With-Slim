<?php

try {
      $sql = "SELECT * FROM blog";
      $results = $db->prepare($sql);
      $results->execute();
      $blog = $results->fetchAll(PDO::FETCH_ASSOC);
}  catch (Exception $e) {

        echo "Error: " . $e->getMessage();
}
