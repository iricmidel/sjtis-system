
  window.onload = loadStudentList();

  function loadStudentList(){

    $.ajax({

      url: "../../_backend/controller/student_controller.php",
      type: "POST",
      data: {func: 1},
      success: function(result){

        $("#load_student_list").html(result);

      }

    });

  }

  function viewStudent(student_number){

    $.ajax({

      url: "../../_backend/controller/student_controller.php",
      type: "POST",
      data: {func: 2, student_number:student_number},
      success: function(result){

        if($.trim(result) == student_number){
          window.location = "./view_student_profile.html";          
        }

      }

    });

  }
