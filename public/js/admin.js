$(document).ready(function (){

    $('.delete-song').on('click', function (e) {
        e.preventDefault();
        if (confirm('Are you sure?')) {
            let data = {};
            data['id'] = $(this).closest('tr').find('input[name=id]').val();
            data['_token'] = $('input[name=_token]').val();

            $.ajax({
                type: 'POST',
                url: '/delete-song',
                data: data,
                success: function (data) {
                    alert('Song successfully deleted!');
                },
                error: function (data) {
                    alert(data.responseJSON.message);
                }
            });
        }
    });

    $('.save-song').on('click', function (e) {
        e.preventDefault();

        let title = $(this).closest('tr').find('input[name=title]').val();
        let id = $(this).closest('tr').find('input[name=id]').val();
        let text = $(this).closest('tr').find('input[name=text]').val();
        let audio = $(this).closest('tr').find('input[name=audio]').prop('files')[0];

        var data = new FormData();
        data.append('id', id);
        data.append('title', title);
        data.append('text', text);
        data.append('audio', audio);
        data.append('_token', $('input[name=_token]').val());

        $.ajax({
            type: 'POST',
            url: '/save-song',
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            data: data,
            success: function(data) {
                alert('Song successfully updated!');
            },
            error:  function(data){
                alert(data.responseJSON.message);
            }
        });
    });

    $('form.add-song').on('submit', function (e){
        e.preventDefault();
        let _this = $(this);
        let title = $(this).find('#title').val();
        let text = $(this).find('#text').val();
        let audio = $(this).find('#audio').prop('files')[0];

        var data = new FormData();
        data.append('title', title);
        data.append('text', text);
        data.append('audio', audio);
        data.append('_token', $(this).find('input[name=_token]').val());

        $.ajax({
            type: 'POST',
            url: '/add-song',
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,

            data: data,
            success: function(data) {
                alert('Song successfully published!');
                _this[0].reset();
            },
            error:  function(data){
                alert(data.responseJSON.message);
            }
        });
    });
});
