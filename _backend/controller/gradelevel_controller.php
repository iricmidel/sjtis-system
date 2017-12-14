<?php

  session_start();

  include("../class/gradelevel_class.php");

  switch ($_POST['func']) {

    case 1: //SAVE NEW GRADE LEVEL

      $save_gradelevel = new GradeLevelClass();
      $save_gradelevel->setGradeLevel_Desc($_POST['desc']);
      echo $save_gradelevel->saveGradeLevel();

      break;

    case 2: //DELETE GRADE Level

      $delete_gradelevel = new GradeLevelClass();
      $delete_gradelevel->setGradeLevel_ID($_POST["id"]);
      echo $delete_gradelevel->deleteGradeLevel();

      break;

    case 4: //LOAD GRADE LEVEL TO TABLE

      $load_gradelevel = new GradeLevelClass();
      echo $load_gradelevel->loadGradeLevel();

      break;

    case 5: //LOAD GRADE LEVEL TO OPTION

      $load_gradelevel_option = new GradeLevelClass();
      echo $load_gradelevel_option->loadGradeLevelOption();

  }

?>
