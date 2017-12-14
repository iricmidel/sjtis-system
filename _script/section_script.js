
  window.onload = loadSection();

  function saveSection(){

    var name = $("#sec_name").val();
    var room = $("#rm_name").val();
    var gradelvl = $("#load_gl_option").val();

    if(($.trim(name) != "") && ($.trim(room) != "")){

      $.ajax({

        url: "../../_backend/controller/section_controller.php",
        type: "POST",
        data: {func: 1, name: name, room: room, gradelvl:gradelvl},
        success: function(result){

          alert(result)

          if($.trim(result) == 1){

            loadSection();

          }
          else{

            alert("error occured!");

          }

        }

      });

    }

  }

  function loadSection(){

    $.ajax({

      url: "../../_backend/controller/section_controller.php",
      type: "POST",
      data: {func: 4},
      success: function(result){

        $("#load_section").html(result);

      }

    });


  }

  function deleteSection(id){

    if(confirm("Are you sure you want to delete this section?")){

      $.ajax({

        url: "../../_backend/controller/section_controller.php",
        type: "POST",
        data: {func: 2, id: id},
        success: function(result){

          if($.trim(result) == 1){
          
            loadSection();

          }
          else{

            alert("error occured!");

          }

        }

      });

    }

  }
