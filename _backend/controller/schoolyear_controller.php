<?php

  session_start();

  include("../class/schoolyear_class.php");

  switch ($_POST['func']) {

    case 1: //GET SCHOOL YEAR

      $get_sy = new SchoolYearClass();
      echo $get_sy->getCurrentSchoolYear();

      break;

  }

 ?>
