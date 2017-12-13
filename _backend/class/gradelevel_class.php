<?php

  date_default_timezone_set('Asia/Singapore');

  class GradeLevelClass{

    private $gradelevel_id;
    private $gradelevel_desc;

    public function setGradeLevel_ID($id){
      $this->gradelevel_id = $this->clean_value($id);
    }

    public function setGradeLevel_Desc($id){
      $this->gradelevel_desc = $this->clean_value($id);
    }

    private function generateGradelevel_ID(){

      include("../connection.php");

      $sql = "SELECT gradelvlID FROM tblgradelevel
              WHERE LENGTH(gradelvlID) = (SELECT MAX(LENGTH(gradelvlID)) FROM tblgradelevel)
              ORDER BY gradelvlID DESC LIMIT 1";

      $result = $con->query($sql);

      if($result->num_rows > 0){

        while($row = $result->fetch_assoc()){

          $hold = explode("-",$row['gradelvlID']);
          $id = $hold[1]+1;
          $this->gradelevel_id = "GL-".$id;

        }

      }
      else {

        $this->gradelevel_id = "GL-100";

      }

    }

    public function saveGradeLevel(){

      include("../connection.php");

      $this->generateGradelevel_ID();

      $sql = $con->prepare("INSERT INTO tblgradelevel (gradelvlID,gradelvlDesc)
                            VALUES (?,?)");

      $sql->bind_param("ss", $this->gradelevel_id, $this->gradelevel_desc);

      if($sql->execute() == TRUE){

        return 1;

      }
      else {

        return 0;

      }

    }

    public function loadGradeLevel(){

      $counter = 0;

      include("../connection.php");

      $sql="SELECT * FROM tblgradelevel WHERE gradelvlStatus = 1
            ORDER BY gradelvlDesc";

      $result = $con->query($sql);

      if($result->num_rows > 0){

        while($row = $result->fetch_assoc()){

          echo '<tr>';
          echo '<td>'.($counter+1).'</td>';
          echo '<td>'.$row['gradelvlDesc'].'</td>';
          echo '<td>

          <a class="button is-success is-outlined">
              <span class="icon is-small">
                <i class="fa fa-pencil"></i>
              </span>
            </a>

            <a class="button is-danger is-outlined">
              <span class="icon is-small">
                <i class="fa fa-trash"></i>
              </span>
            </a></td>';
          echo '</tr>';

        }

      }

    }

    private function clean_value($value){

      $return_value = preg_replace('/[^a-zA-Z0-9\s-_\/().%+&#]/', "", strip_tags($value));

      return $return_value;

    }


  }

 ?>
