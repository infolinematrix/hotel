/**
 * Created by rahul on 19/8/17.
 */

$(document).ready(function () {


    var base_url = $('body').data('baseurl');

    $('.cat').livequery('change', function () {

        $id = $(this).val();
        var url = base_url + '/admin/category/parent/' + $id;

        $(this).nextAll().remove();

        $.get(url, function (data, textStatus) {
            setTimeout(finishAjax('show_sub_categories', data), 400);
        });

        return false;
    });

    $('.loc').livequery('change', function () {

        $id = $(this).val();

        var url = base_url + '/admin/location/parent/' + $id;
       
        $(this).nextAll().remove();

        $.get(url, function (data, textStatus) {
            setTimeout(finishAjax('show_sub_locations', data), 400);
        });

        return false;
    });

    function finishAjax(id, response) {
        $d = '#' + id;
        $('#loader').remove();
        $($d).append(response);
    }
});