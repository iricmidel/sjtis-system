<?php

  session_start();

  include("../class/subject_class.php");

  switch ($_POST['func']) {

    case 1: //SAVE NEW SUBJECT

      $save_subject = new SubjectClass();
      $save_subject->setSubject_Code($_POST['code']);
      $save_subject->setSubject_Desc($_POST['desc']);
      $save_subject->setSubject_Unit($_POST['unit']);
      $save_subject->setSubject_GradeLevel($_POST['gradelvl']);
      echo $save_subject->saveSubject();

      break;

    case 4: //LOAD SUBJECTS TO TABLE

      $load_subject = new SubjectClass();
      echo $load_subject->loadSubject();

      break;

  }

?>
