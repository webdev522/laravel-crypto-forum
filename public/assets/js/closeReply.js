
      $(document).ready(function(){

            // $(".reply-btn").click(function(){
            //   $(".reply-box").removeClass("hide");
            //    $(".reply-close").removeClass("hide");
            //   $(".reply-btn").addClass("hide");
            // });
            //
            // $(".reply-close").click(function(){
            //   $(".reply-box").addClass("hide");
            //    $(".reply-btn").removeClass("hide");
            //   $(".reply-close").addClass("hide");
            // });

      });

      function edit_box(id) {
          $(".edit-box"+id).removeClass("hide");
      }

      function edit_close(id){
          $(".edit-box"+id).addClass("hide");
      }