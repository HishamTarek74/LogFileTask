
// Define Vars
var file, data, jsonData;
var start = 0;
var paginate = 10;

/**
 *
 * get file value and catch get request backend
 * to listen jsonData and append the data
 * line by line to list group item
 *
 */
function getFileLines() {
    file = $('#file').val();
    $.get("src/Log.php?file=" + file + "&start=" + start + "&paginate=" + paginate, function (response, status) {
        jsonData = JSON.parse(response);
        if (jsonData.code == 200) {
            data = jsonData.data;
            console.log(jsonData.start);
            $('.card').removeClass('text-danger');
            $('.card').html('');
            $('.card').empty();
            for (let i = 0; i < data.length; i++) {
                // alert(data.length);
                $('.card').append('<li class="list-group-item">' + data[i] + '</li>');
            }

            $('.previous').attr('data-start', jsonData.previous)
            $('.next').attr('data-start', jsonData.next)
            $('.end').attr('data-start', jsonData.end)
        } else {
            $('.card').addClass('text-danger');
            $('.card').html(jsonData.message);
        }
    });
}

$('.page-link').click(function () {
    start = $(this).attr('data-start');
    getFileLines();
});

$('form').submit(function (event) {
    event.preventDefault();
    start = 0;
    getFileLines();
});
