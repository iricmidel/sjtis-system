<?php

  date_default_timezone_set('Asia/Singapore');

  class StudentClass{

    private $student_id;
    private $student_number;
    private $student_name;
    private $student_gender;
    private $student_dob;
    private $student_pob;
    private $student_guardian;
    private $student_occupation;
    private $student_address;
    private $student_contact;
    private $student_info;


    public function setStudent_ID($id){
      $this->student_id = $this->clean_value($id);
    }

    public function setStudent_Number($number){
      $this->student_number = $this->clean_value($number);
    }

    public function setStudent_Name($name){
      $this->student_name = $this->clean_value($name);
    }

    public function setStudent_Gender($gender){
      $this->student_gender = $this->clean_value($gender);
    }

    public function setStudent_DoB($dob){
      $this->student_dob = $this->clean_value($dob);
    }

    public function setStudent_PoB($pob){
      $this->student_pob = $this->clean_value($pob);
    }

    public function setStudent_Guardian($guardian){
      $this->student_guardian = $this->clean_value($guardian);
    }

    public function setStudent_Occupation($occupation){
      $this->student_occupation = $this->clean_value($occupation);
    }

    public function setStudent_Address($address){
      $this->student_address = $this->clean_value($address);
    }

    public function setStudent_Contact($contact){
      $this->student_contact = $this->clean_value($contact);
    }

    public function setStudent_Information($info){
      $this->student_info = $this->clean_value($info);
    }


    public function generateStudent_ID(){

      include("../connection.php");

      $sql = "SELECT studentID FROM tblstudent
              WHERE LENGTH(studentID) = (SELECT MAX(LENGTH(studentID)) FROM tblstudent)
              ORDER BY studentID DESC LIMIT 1";

      $result = $con->query($sql);

      if($result->num_rows > 0){

        while($row = $result->fetch_assoc()){

          $hold = explode("-",$row['studentID']);
          $id = $hold[1]+1;
          $this->student_id = "ST-".$id;

        }

      }
      else {

        $this->student_id = "ST-1000";

      }

      EnrollmentClass::setStudent_ID($this->student_id);

    }

    public function generateStudent_Number(){

      include("../connection.php");

      $sql = "SELECT studentNumber FROM tblstudent
              WHERE LENGTH(studentNumber) = (SELECT MAX(LENGTH(studentNumber)) FROM tblstudent)
              ORDER BY studentNumber DESC LIMIT 1";

      $result = $con->query($sql);

      if($result->num_rows > 0){

        while($row = $result->fetch_assoc()){

          $hold = explode("-",$row['studentNumber']);
          $id = $hold[1]+1;
          $this->student_number =  date("Y")."-".str_pad($id, 5, "0", STR_PAD_LEFT);;

        }

      }
      else {

        $this->student_number = date("Y")."-00001";

      }

    }


    public function saveNewStudent(){

      include("../connection.php");

      $this->generateStudent_ID();
      $this->generateStudent_Number();

      $current_date = date("Y-m-d");

      $sql = $con->prepare("INSERT INTO tblstudent (studentID,studentNumber,studentName,studentGender,
             studentDoB,studentPoB,studentGuardian,studentOccupation,studentAddress,studentContactNumber,
             studentInfo,studentDateEntered) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");

      $sql->bind_param("ssssssssssss",$this->student_id,$this->student_number,$this->student_name,
            $this->student_gender,$this->student_dob,$this->student_pob,$this->student_guardian,
            $this->student_occupation,$this->student_address,$this->student_contact,$this->student_info,
            $current_date);

      if($sql->execute() == TRUE){

        return 1;

      }
      else {

        return 0;

      }

    }

    public function getStudent_Information(){

      include("../connection.php");

      $sql = "SELECT tblstudent.*,gradelvlDesc,sectionName
              FROM tblenrollment,tblstudent,tblgradelevel,tblsection,tblschoolyear
              WHERE tblenrollment.studentID = tblstudent.studentID
              AND tblenrollment.gradelvlID = tblgradelevel.gradelvlID
              AND tblenrollment.sectionID = tblsection.sectionID
              AND tblenrollment.syID = tblschoolyear.syID
              AND studentNumber = '$this->student_number'
              AND enrollmentStatus = 1 AND studentStatus = 1
              ORDER BY enrollmentID DESC LIMIT 1";

      $result = $con->query($sql);

      if($result->num_rows == 1){

        while($row = $result->fetch_assoc()){

          $birthdate = new DateTime($row['studentDoB']);
          $current_age = date_diff(date_create($row['studentDoB']), date_create(date('Y-m-d')));

          return  $row['studentNumber']."=".$row['studentName']."=".
                  $row['gradelvlDesc']."  ".$row['sectionName']."=".
                  $current_age->format('%y')."=".$birthdate->format("F j, Y")."=".
                  $row['studentPoB']."=".$row['studentAddress']."=".
                  $row['studentGuardian']."=".$row['studentContactNumber']."=".
                  $row['studentGender']."=".$row['studentDateEntered']."=".
                  $row['studentPoB']."=".$row['studentOccupation'];

        }

      }

    }

    public function loadStudentList($stud,$gradelvl,$section,$sy){

      include("../connection.php");

      $sql = "SELECT studentName,gradelvlDesc,sectionName,studentNumber
              FROM tblenrollment,tblstudent,tblgradelevel,tblsection,tblschoolyear
              WHERE tblenrollment.studentID = tblstudent.studentID
              AND tblenrollment.gradelvlID = tblgradelevel.gradelvlID
              AND tblenrollment.sectionID = tblsection.sectionID
              AND tblenrollment.syID = tblschoolyear.syID
              AND (studentName LIKE '%$stud%' OR studentNumber LIKE '%$stud%')
              AND tblenrollment.gradelvlID LIKE '%$gradelvl%'
              AND tblenrollment.sectionID LIKE '%$section%'
              AND tblenrollment.syID LIKE '%$sy%'
              AND enrollmentStatus = 1 AND studentStatus = 1
              ORDER BY gradelvlDesc, sectionName, studentName ASC";

      $result = $con->query($sql);

      if($result->num_rows > 0){

        while($row = $result->fetch_assoc()){

          echo '<tr>
                  <td width="5%"><i class="fa fa-user"></i></td>
                  <td><a onclick="viewStudent(\''.$row['studentNumber'].'\')">'.$row['studentName'].'</a></td>
                  <td>'.$row['gradelvlDesc'].'</td>
                  <td>'.$row['sectionName'].'</td>
                  <td> <a class="button is-small is-primary" href="#">Edit</a>
                      <a class="button is-small is-danger" href="#">Delete</a>
                  </td>
                </tr>';

        }

      }

    }


    private function clean_value($value){

      $return_value = preg_replace('/[^a-zA-Z0-9\s-_\/().%+&#]/', "", strip_tags($value));

      return $return_value;

    }

  }


?>
