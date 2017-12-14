<?php

  date_default_timezone_set('Asia/Singapore');

  class SubjectClass{

    private $subject_id;
    private $subject_code;
    private $subject_desc;
    private $subject_unit;
    private $gradelevel_id;

    public function setSubject_ID($id){
      $this->subject_id = $this->clean_value($id);
    }

    public function setSubject_Code($code){
      $this->subject_code = $this->clean_value($code);
    }

    public function setSubject_Desc($desc){
      $this->subject_desc = $this->clean_value($desc);
    }

    public function setSubject_Unit($unit){
      $this->subject_unit = $this->clean_value($unit);
    }

    public function setSubject_GradeLevel($id){
      $this->gradelevel_id = $this->clean_value($id);
    }


    private function generateSubject_ID(){

      include("../connection.php");

      $sql = "SELECT subjectID FROM tblsubject
              WHERE LENGTH(subjectID) = (SELECT MAX(LENGTH(subjectID)) FROM tblsubject)
              ORDER BY subjectID DESC LIMIT 1";

      $result = $con->query($sql);

      if($result->num_rows > 0){

        while($row = $result->fetch_assoc()){

          $hold = explode("-",$row['subjectID']);
          $id = $hold[1]+1;
          $this->subject_id = "SUBJ-".$id;

        }

      }
      else {

        $this->subject_id = "SUBJ-100";

      }

    }

    public function saveSubject(){

      include("../connection.php");

      $this->generateSubject_ID();

      $sql = $con->prepare("INSERT INTO tblsubject (subjectID,subjectCode,subjectDesc,subjectUnit,gradelvlID)
                            VALUES (?,?,?,?,?)");

      $sql->bind_param("sssss", $this->subject_id,$this->subject_code,$this->subject_desc,
                        $this->subject_unit,$this->gradelevel_id);

      if($sql->execute() == TRUE){

        return 1;

      }
      else {

        return 0;

      }


    }

    public function loadSubject(){

      $counter = 1;

      include("../connection.php");

      $sql="SELECT * FROM tblsubject,tblgradelevel
            WHERE subjectStatus = 1
            AND tblsubject.gradelvlID = tblgradelevel.gradelvlID
            ORDER BY gradelvlDesc,subjectDesc ASC";

      $result = $con->query($sql);

      if($result->num_rows > 0){

        while($row = $result->fetch_assoc()){

          echo '<tr>';
          echo '<td>'.($counter++).'</td>';
          echo '<td>'.$row['subjectCode'].'</td>';
          echo '<td>'.$row['subjectDesc'].'</td>';
          echo '<td>'.$row['subjectUnit'].'</td>';
          echo '<td>'.$row['gradelvlDesc'].'</td>';
          echo '<td>
                  <a class="button is-success is-outlined">
                    <span class="icon is-small">
                      <i class="fa fa-pencil"></i>
                    </span>
                  </a>

                  <a class="button is-danger is-outlined" onclick="deleteGrade(\''.$row['subjectID'].'\')">
                    <span class="icon is-small">
                      <i class="fa fa-trash"></i>
                    </span>
                  </a>
                </td>';
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
