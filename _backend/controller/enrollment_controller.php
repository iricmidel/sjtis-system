<?php

  session_start();

  include("../class/enrollment_class.php");

  switch ($_POST['func']) {

    case 1: //ENROLL NEW STUDENT

      $enroll_new = new EnrollmentClass();
      $enroll_new->setStudent_Name($_POST['name']);
      $enroll_new->setStudent_Gender($_POST['gender']);
      $enroll_new->setStudent_DoB($_POST['dob']);
      $enroll_new->setStudent_PoB($_POST['pob']);
      $enroll_new->setStudent_Guardian($_POST['guardian']);
      $enroll_new->setStudent_Occupation($_POST['occupation']);
      $enroll_new->setStudent_Address($_POST['address']);
      $enroll_new->setStudent_Contact($_POST['contact']);
      $enroll_new->setStudent_Information($_POST['studinfo']);
      $enroll_new->setGradeLevel_ID($_POST['gradelvl']);
      $enroll_new->setSection_ID($_POST['section']);
      $enroll_new->setSchoolYear_ID($_POST['sy']);
      echo $enroll_new->enrollNewStudent();

      break;

  }

?>
