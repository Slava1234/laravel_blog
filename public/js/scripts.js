$(function () {


    // validation create post form
    $create_post_title =  $('#title');
    $create_post_body =  $('#body');

    /*$('#submit_create_post_form').click(function(e){
        if  ($create_post_title.val() == "") {
            e.preventDefault();
            $create_post_title.css({
               border: '1px solid red'
            });
        }
        if  ($create_post_body.val() == "") {
            e.preventDefault();
            $create_post_body.css({
                border: '1px solid red'
            });
        }
    });*/


    // post comment
    $('#create_comment').click(function(e){
        e.preventDefault();

        $.ajax({
           type: 'POST',
           url: '/post_comment',
           cache: false,
           data: {
               post_id: $(this).parents('form').find("input[name=post_id]").val(),
               username: $(this).parents('form').find("#name").val(),
               userEmail: $(this).parents('form').find("#email").val(),
               userComment: $(this).parents('form').find("#comment").val(),
               _token: $(this).parents('form').find("input[name=_token]").val()
           },
           beforeSend: function (e) {
               console.log("requesting to post comment");
           },
           success: function (response) {
                console.log(response);
               if(response == "done") {
                  $('.post-comment-message .alert-success').fadeIn(300);
                  setTimeout(function(){
                      $('.post-comment-message .alert-success').fadeOut(300);
                  }, 3000);
               } else if (response == "cookie_exists"){
                    $('.post-comment-message .alert-danger').fadeIn(300);
                    setTimeout(function(){
                        $('.post-comment-message .alert-danger').text("");
                        $('.post-comment-message .alert-danger').text("Добавить комментарий сожно через: " + );
                        $('.post-comment-message .alert-danger').fadeOut(300);
                    }, 3000);
               } else {
                    $('.post-comment-message .alert-danger').fadeIn(300);
                    setTimeout(function(){
                        $('.post-comment-message .alert-danger').text("");
                        $('.post-comment-message .alert-danger').text("Ошибка...");
                        $('.post-comment-message .alert-danger').fadeOut(300);
                    }, 3000);
               }
               
           }
       });
    });


});
