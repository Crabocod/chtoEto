$(document).ready(function (){
    $('form[name=loginForm]').on('submit', function (e){
        e.preventDefault();

        var msg = $(this).serialize();
        $.ajax({
            type: 'POST',
            url: '/login',
            data: msg,
            success: function(data) {
                window.location.href = '/';
            },
            error:  function(data){
                alert(data.responseJSON.message);
            }
        });
    });

    $('form[name=signUpForm]').on('submit', function (e){
        e.preventDefault();

        var msg = $(this).serialize();
        $.ajax({
            type: 'POST',
            url: '/sign-up',
            data: msg,
            success: function(data) {
                $('#successAlert').show();
            },
            error:  function(data){
                alert(data.responseJSON.message);
            }
        });
    });
});
