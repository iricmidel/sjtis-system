<?php

  date_default_timezone_set('Asia/Singapore');

  class SectionClass{

    private $section_id;
    private $section_name;
    private $room_name;
    private $gradelevel_id;

    public function setSection_ID($id){
      $this->section_id = $this->clean_value($id);
    }

    public function setSection_Name($name){
      $this->section_name = $this->clean_value($name);
    }

    public function setRoom_Name($name){
      $this->room_name = $this->clean_value($name);
    }

    public function setGradeLevel_ID($id){
      $this->gradelevel_id = $this->clean_value($id);
    }

    private function generateSection_ID(){

      include("../connection.php");

      $sql = "SELECT sectionID FROM tblsection
              WHERE LENGTH(sectionID) = (SELECT MAX(LENGTH(sectionID)) FROM tblsection)
              ORDER BY sectionID DESC LIMIT 1";

      $result = $con->query($sql);

      if($result->num_rows > 0){

        while($row = $result->fetch_assoc()){

          $hold = explode("-",$row['sectionID']);
          $id = $hold[1]+1;
          $this->section_id = "SEC-".$id;

        }

      }
      else {

        $this->section_id = "SEC-100";

      }

    }


    public function saveSection(){

      include("../connection.php");

      $this->generateSection_ID();

      $sql = $con->prepare("INSERT INTO tblsection (sectionID,sectionName,sectionRoom,gradelvlID)
                            VALUES (?,?,?,?)");

      $sql->bind_param("ssss", $this->section_id, $this->section_name, $this->room_name, $this->gradelevel_id);

      if($sql->execute() == TRUE){

        return 1;

      }
      else {

        return 0;

      }

    }

    public function loadSection(){

      $counter = 1;

      include("../connection.php");

      $sql="SELECT * FROM tblgradelevel,tblsection
            WHERE sectionStatus = 1
            AND tblsection.gradelvlID = tblgradelevel.gradelvlID
            ORDER BY gradelvlDesc, sectionName ASC";

      $result = $con->query($sql);

      if($result->num_rows > 0){

        while($row = $result->fetch_assoc()){

          echo '<tr>';
          echo '<td>'.($counter++).'</td>';
          echo '<td>'.$row['sectionName'].'</td>';
          echo '<td>'.$row['gradelvlDesc'].'</td>';
          echo '<td>'.$row['sectionRoom'].'</td>';
          echo '<td>

                  <a class="button is-success is-outlined">
                    <span class="icon is-small">
                      <i class="fa fa-pencil"></i>
                    </span>
                  </a>

                  <a class="button is-danger is-outlined" onclick="deleteSection(\''.$row['sectionID'].'\')">
                    <span class="icon is-small">
                      <i class="fa fa-trash"></i>
                    </span>
                  </a>

                </td>';
          echo '</tr>';

        }

      }


    }

    public function deleteSection(){

      include("../connection.php");

      $sql = $con->prepare("UPDATE tblsection
                            SET sectionStatus = 0
                            WHERE sectionID = ?");

      $sql->bind_param("s",$this->section_id);

      if($sql->execute() == TRUE){

        return 1;

      }
      else {

        return 0;

      }

    }


    private function clean_value($value){

      $return_value = preg_replace('/[^a-zA-Z0-9\s-_\/().%+&#]/', "", strip_tags($value));

      return $return_value;

    }


  }

?>
