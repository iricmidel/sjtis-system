
var student_number;

window.onload = loadStudentList();

function loadStudentList(){

  $.ajax({

    url: "../../_backend/controller/student_controller.php",
    type: "POST",
    data: {func: 3},
    success: function(result){

      var data = $.trim(result).split("=");

      student_number = data[0];
      $("#student_name").html(data[1]);
      $("#grade_section").html(data[2]);
      $("#student_age").html(data[3]);
      $("#student_dob").html(data[4]);
      $("#student_address").html(data[5]);
      $("#student_guardian").html(data[6]);
      $("#student_contact").html(data[7]);
      $("#student_gender").html(data[8]);
      $("#student_date_entered").html(data[9]);
      $("#student_pob").html(data[10]);
      $("#student_occupation").html(data[11]);

    }

  });

}
