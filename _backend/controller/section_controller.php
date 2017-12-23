<?php

  session_start();
  include("../class/section_class.php");

  switch ($_POST['func']) {

    case 1: //SAVE NEW SECTION

      $save_section = new SectionClass();
      $save_section->setSection_Name($_POST['name']);
      $save_section->setRoom_Name($_POST['room']);
      $save_section->setGradeLevel_ID($_POST['gradelvl']);
      echo $save_section->saveSection();

      break;

    case 2: //DELETE SECTION

      $delete_section = new SectionClass();
      $delete_section->setSection_ID($_POST["id"]);
      echo $delete_section->deleteSection();

      break;

    case 4: //LOAD SECTION TO TABLE

      $load_section = new SectionClass();
      echo $load_section->loadSection();

      break;

    case 5: //LOAD SECTION TO option

      $load_section = new SectionClass();
      $load_section->setGradeLevel_ID($_POST['id']);
      echo $load_section->loadSectionOption();

      break;

  }

?>
