/**
 * Created by dev on 3/1/18.
 */



$("#massmail_form").submit(function (event) {
    event.preventDefault(); //prevent default action
    var post_url = $(this).attr("action"); //get form action url
    var request_method = $(this).attr("method"); //get form GET/POST method
    var form_data = $(this).serialize(); //Encode form elements for submission


    $.ajax({
        url: post_url,
        type: request_method,
        async: true,
        data: form_data
    }).done(function (response) { //
        //$("#server-results").html(response);
        //$('#msg').html('Mail Sent...');
        $("#msg").html(data.message).fadeIn('slow');
    });


    //$('#msg').html('sending...');

    /*setTimeout(function () {

     $.ajax({
     url : post_url,
     type: request_method,
     async : true,
     data : form_data
     }).done(function(response){ //
     //$("#server-results").html(response);
     //$('#msg').html('Mail Sent...');
     $("#msg").html(data.message).fadeIn('slow');
     });

     },2000);*/

    
});