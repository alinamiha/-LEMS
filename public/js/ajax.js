$(function() {

    $('#send-form').on('click',function(e){

        e.preventDefault();
        var cv_name = $('#cv_name').val();

        var description = $('#description').val();
        var type_of_working = $('#type_of_working').val();
        var city = $('#city').val();
        var position = $('#post').val();

        $.ajax({

            url: '/cv',

            type: "POST",

            data: {cv_name:cv_name,description:description,type_of_working:type_of_working,city:city,post:position},

            headers: {

                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            },

            success: function (data) {
                // $('#addArticle').modal('hide');
                //
                // $('#articles-wrap').removeClass('hidden').addClass('show');
                //
                // $('.alert').removeClass('show').addClass('hidden');
                var html = '<div class="wrap">\n' +
                    '                <div class="my-account-wrap-info">\n' +
                    '                    <span>'+data['cv_name'] +'</span>\n' +
                    '                    <a href="{{$cv->id}}">Переглянути</a>\n' +
                    '                </div>\n' +
                    '            </div>'

                // var str = '<tr><td>'+data['id']+
                //
                //     '</td><td><a href="/cv/'+data['id']+'">'+data['cv_name']+'</a>'+
                //
                //     '</td><td><a href="/cv/'+data['id']+'" class="delete" data-delete="'+data['id']+'">Удалить</a></td></tr>';

                $('#wrap-cv').append(html);

            },

            error: function (msg) {

                alert('Ошибка');

            }

        });

    });

})


