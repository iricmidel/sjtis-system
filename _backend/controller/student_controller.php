<?php

  session_start();

  include("../class/student_class.php");

  switch ($_POST['func']) {

    case 1: //LOAD STUDENT LIST

      $load_student = new StudentClass();
      echo $load_student->loadStudentList("","","","");

      break;

    case 2: //SET STUDENT NUMBER TO SESSION

      $_SESSION['student_number'] = $_POST['student_number'];
      echo $_SESSION['student_number'];

      break;

    case 3: //GET STUDENT INFORMATION

      $get_student_info = new StudentClass();
      $get_student_info->setStudent_Number($_SESSION['student_number']);
      echo $get_student_info->getStudent_Information();

      break;


  }

?>
