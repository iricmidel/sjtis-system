<?php

  session_start();

  include("../class/gradelevel_class.php");

  switch ($_POST['func']) {

    case 1: //SAVE NEW GRADE LEVEL

      $save_gradelevel = new GradeLevelClass();
      $save_gradelevel->setGradeLevel_Desc($_POST['desc']);
      echo $save_gradelevel->saveGradeLevel();

      break;

    case 4: //LOAD GRADE LEVEL TO TABLE

      $load_gradelevel = new GradeLevelClass();
      echo $load_gradelevel->loadGradeLevel();

      break;

    default:
      # code...
      break;
  }



 ?>
