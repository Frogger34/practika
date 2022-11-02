$('#err').hide();
$('#err2').hide();
$(document).ready(function () {

    $('#hover').hover(function () {
            // over
            $('#err').fadeIn(200);
            $('#err2').fadeIn(200);
            $('#err3').text("Ой-ей!");
        }, function () {
            // out
            $('#err').fadeOut(200);
            $('#err2').fadeOut(200);
            $('#err3').text("Наведи на меня");
        }
    );
});