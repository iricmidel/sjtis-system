
  window.onload = load_all_gradelevel();

  function load_all_gradelevel(){

    loadGradeLevel();
    loadGradeLevelOption();

  }

  function saveGradeLevel(){

    var desc = $("#gl_desc").val();

    if($.trim(desc) != ""){

      $.ajax({

        url: "../../_backend/controller/gradelevel_controller.php",
        type: "POST",
        data: {func: 1, desc: desc},
        success: function(result){

          if($.trim(result) == 1){

            load_all_gradelevel();

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

  function deleteGrade(id){

    if(confirm("Are you sure you want to delete this grade level?")){

      $.ajax({

        url: "../../_backend/controller/gradelevel_controller.php",
        type: "POST",
        data: {func: 2, id: id},
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
