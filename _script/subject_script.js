
  window.onload = loadalldata();

  function loadalldata(){

    loadSubject();
    loadGradeLevelOption();

  }

  function saveSubject(){

    var code = $("#subj_code").val();
    var desc = $("#subj_desc").val();
    var unit = $("#subj_unit").val();
    var gradelvl = $("#load_gl_option").val();

    if(($.trim(code) != "") && ($.trim(desc) != "") && ($.trim(unit) != "")){

      $.ajax({

        url: "../../_backend/controller/subject_controller.php",
        type: "POST",
        data: {func: 1, code:code, desc: desc, unit:unit, gradelvl: gradelvl},
        success: function(result){

          if($.trim(result) == 1){

            loadSubject();

          }
          else{

            alert("error occured!");

          }

        }

      });

    }

  }

  function loadSubject(){

    $.ajax({

      url: "../../_backend/controller/subject_controller.php",
      type: "POST",
      data: {func: 4},
      success: function(result){

        $("#load_subj_table").html(result);

      }

    });

  }

  function loadGradeLevelOption(){

    $.ajax({

      url: "../../_backend/controller/gradelevel_controller.php",
      type: "POST",
      data: {func: 5},
      success: function(result){

        $("#load_gl_option").html(result);

      }

    });

  }
