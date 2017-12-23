
<?php

  date_default_timezone_set('Asia/Singapore');

  class SchoolYearClass{

    private $sy_id;
    private $sy_start;
    private $sy_end;

    public function getCurrentSchoolYear(){

      include("../connection.php");

      $sql = "SELECT * FROM tblschoolyear WHERE syStatus = 1";

      $result = $con->query($sql);

      if($result->num_rows == 1){

        while($row = $result->fetch_assoc()){

          echo $row['syID']."/".$row['syStart']."-".$row['syEnd'];

        }

      }

    }

  }


?>
