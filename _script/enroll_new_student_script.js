
  var current_sy;

  window.onload = loadGradeLevelOption();

  document.getElementById("s_grade_level").addEventListener("change", loadSectionOption);

  function loadGradeLevelOption(){

    $.ajax({

      url: "../../_backend/controller/gradelevel_controller.php",
      type: "POST",
      data: {func: 5},
      success: function(result){

        $("#s_grade_level").html(result);

      }

    }).done(function(){
        loadSectionOption();
        getSchoolYear();
    });

  }

  function loadSectionOption(){

    var id = $("#s_grade_level").val();

    $.ajax({

      url: "../../_backend/controller/section_controller.php",
      type: "POST",
      data: {func: 5, id:id},
      success: function(result){

        $("#s_section").html(result);

      }

    });

  }

  function getSchoolYear(){

    $.ajax({

      url: "../../_backend/controller/schoolyear_controller.php",
      type: "POST",
      data: {func: 1},
      success: function(result){

        var hold = $.trim(result).split("/");
        current_sy = hold[0];

        $("#sy_yr").val(hold[1]);

      }

    });

  }

  function enrollNewStudent(){

    var name = $("#s_name").val();
    var gender = $("#s_gender").val();
    var dob = $("#s_dob").val();
    var pob = $("#s_pob").val();
    var guardian = $("#s_guardian").val();
    var occupation = $("#s_occupation").val();
    var address = $("#s_address").val();
    var contact = $("#s_contact").val();
    var gradelvl = $("#s_grade_level").val();
    var section = $("#s_section").val();
    var studinfo = $("#s_info").val();
    var sy = current_sy;

    $.ajax({

      url: "../../_backend/controller/enrollment_controller.php",
      type: "POST",
      data: {func: 1, name:name, gender:gender, dob:dob, pob:pob,
             guardian:guardian, occupation:occupation, address:address, sy:sy,
             contact:contact, gradelvl:gradelvl, section:section, studinfo:studinfo},
      success: function(result){

        alert(result);

      }

    });

  }
