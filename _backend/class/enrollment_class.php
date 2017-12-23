<?php

  date_default_timezone_set('Asia/Singapore');

  include("../class/student_class.php");

  class EnrollmentClass extends StudentClass{

    private $gradelvl_id;
    private $section_id;
    private $student_id;
    private $schoolyear_id;
    private $enrollment_id;

    public function setGradeLevel_ID($id){
      $this->gradelvl_id = $this->clean_value($id);
    }

    public function setSection_ID($id){
      $this->section_id = $this->clean_value($id);
    }

    public function setStudent_ID($id){
      $this->student_id = $this->clean_value($id);
    }

    public function setSchoolYear_ID($id){
      $this->schoolyear_id = $this->clean_value($id);
    }


    public function generateEnrollment_ID(){

      include("../connection.php");

      $sql = "SELECT enrollmentID FROM tblenrollment
              WHERE LENGTH(enrollmentID) = (SELECT MAX(LENGTH(enrollmentID)) FROM tblenrollment)
              ORDER BY enrollmentID DESC LIMIT 1";

      $result = $con->query($sql);

      if($result->num_rows > 0){

        while($row = $result->fetch_assoc()){

          $hold = explode("-",$row['enrollmentID']);
          $id = $hold[1]+1;
          $this->enrollment_id = "E-".$id;

        }

      }
      else {

        $this->enrollment_id = "E-10000";

      }

    }

    public function enrollNewStudent(){

      include("../connection.php");

      $this->generateEnrollment_ID();

      if($this->saveNewStudent() == 1){

        $current_datetime = date("Y-m-d h:i:sa");
      
        $sql = $con->prepare("INSERT INTO tblenrollment (enrollmentID,enrollmentDateTime,
               studentID,gradelvlID,sectionID,syID) VALUES (?,?,?,?,?,?)");

        $sql->bind_param("ssssss",$this->enrollment_id,$current_datetime,$this->student_id,
                         $this->gradelvl_id,$this->section_id,$this->schoolyear_id);

        if($sql->execute() == TRUE){

          return 1;

        }
        else {

          return 0;

        }

      }

    }

    private function clean_value($value){

      $return_value = preg_replace('/[^a-zA-Z0-9\s-_\/().%+&#]/', "", strip_tags($value));

      return $return_value;

    }


  }

?>
