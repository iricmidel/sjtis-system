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

  }

?>
