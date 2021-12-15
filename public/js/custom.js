
$(document).ready(function(){

    $('#jsEditComment').on('click',function(e){
        e.preventDefault();
        $('#comment_post_div').css('visibility','hidden');
        $('#comment_edit_div').css('visibility','relative');
    });

});