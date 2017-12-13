
  window.onload = loadGradeLevel();

  function saveGradeLevel(){

    var desc = $("#gl_desc").val();

    if($.trim(desc) != ""){

      $.ajax({

        url: "../../_backend/controller/gradelevel_controller.php",
        type: "POST",
        data: {func: 1, desc: desc},
        success: function(result){

          if($.trim(result) == 1){

            loadGradeLevel();

          }
          else{

            alert("error occured!");

          }

        }

      });

    }

  }

  function loadGradeLevel(){

    $.ajax({

      url: "../../_backend/controller/gradelevel_controller.php",
      type: "POST",
      data: {func: 4},
      success: function(result){

        $("#load_gradelevel").html(result);

      }

    });

  }
