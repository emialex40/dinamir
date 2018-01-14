$(document).ready(function() {

   var input = $('.input');

   $('.like_form').submit(function() {
        event.preventDefault();
        var formData = $(this).serialize();

        $.ajax({
            type: 'POST',
            url: 'saver.php',
            data: formData,
            success: function(data) {
                input.val(data);
            }
        });
    });

});