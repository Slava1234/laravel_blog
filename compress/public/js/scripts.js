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



    $('#create_comment').click(function(e){
        e.preventDefault();

        $.ajax({
           type: 'POST',
           url: '/post_comment',
           cache: false,
           data: {
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
           }
       });
    });


});
