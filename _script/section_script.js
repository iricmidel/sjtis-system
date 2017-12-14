
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

            //load_all_gradelevel();
            alert("saved");

          }
          else{

            alert("error occured!");

          }

        }

      });

    }

  }
