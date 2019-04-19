var url = APP_URL + "/";

$('#create_films_submit').on('click', function () {
        var data = document.getElementById('create_films');
        var form_data = new FormData(data);
        console.log(data);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: url + "addfilms",
            data: form_data,
            cache: false,
            processData: false,
            contentType: false,
            type: 'POST',
            success: function (response) {
                var data = jQuery.parseJSON(response);
                console.log(data); 
                if (data.code === 1) {
                    $.toast({
                        heading: 'Success',
                        text: data.message,
                        showHideTransition: 'slide',
                        icon: 'success',
                        position: 'top-center'
                    })
                } else
                {
                    $.toast({
                        heading: 'Error',
                        text: data.message,
                        icon: 'error',
                        position: 'top-center'
                    })
                }
                document.getElementById("create_films").reset();
            }
        });


});

$('#films_comment_submit').on('click', function () {
        var data = document.getElementById('create_comment');
        var form_data = new FormData(data);
        console.log(data);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: url + "films/comment",
            data: form_data,
            cache: false,
            processData: false,
            contentType: false,
            type: 'POST',
            success: function (response) {
                var data = jQuery.parseJSON(response);
                console.log(data); 
                if (data.code === 1) {
                    $.toast({
                        heading: 'Success',
                        text: data.message,
                        showHideTransition: 'slide',
                        icon: 'success',
                        position: 'top-center'
                    })
                } else
                {
                    $.toast({
                        heading: 'Error',
                        text: data.message,
                        icon: 'error',
                        position: 'top-center'
                    })
                }
                document.getElementById("create_comment").reset();
                $("#comment-list").load(" #comment-list");
            }
        });


});

$(document).ready(function () {
    $.ajax({ 
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: url +'films',
        type: 'GET',
        success: function (response) {
           
           var data = JSON.parse(response);
           var new_data = [];
           $.each(data.data,function(index,value){
                new_data.push('<div class="row films-pad"><div class="col-sm-12"><h2><a href="'+url+'films/'+value.slug+'">'+value.name+'</a></h2></div><div class="col-sm-4"> <div><img src="'+url+value.photo+'"></div>\n\
                                </div> <div class="col-sm-8"> \n\
                                <p>Name : '+value.name+'</p> \n\
                                <p>Realease Date : '+value.realease_date+'</p> \n\
                                <p>Rating : '+value.rating+'</p> \n\
                                <p>Ticket Price : '+value.ticket_price+'</p>\n\
                                <p>Country : '+value.country+'</p> \n\
                                <p>Genre : '+value.genre+'</p> \n\
                                </div> \n\
                                <div class="col-sm-12"><div class="description">'+value.description.substr(0, 500)+'<a href="'+url+'films/'+value.slug+'"> Read More</a></a></div></div> </div><hr/>');
           })
           $('#getfilms').html(new_data);
        }
    });
    
    
});