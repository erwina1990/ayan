$(document).ready(function () {
    $('#btnClose').click(function () {
        $('.BoxBody').animate({ right: '-50%' }),
            $('.btnButtomDisp').css('display', 'block'),
            $('.MainBody').css({ 'background': 'linear-gradient(rgba(255, 255, 255, 0), rgba(255, 255, 255, 0)), url(img/bazarpic.jpg) center center', 'background-repeat': 'no-repeat', 'background-size': 'cover' });
    });
    $('.btnButtomDisp').css('display', 'none'),
        $('.btnButtomDisp').click(function () {
            $('.BoxBody').animate({ right: '25%' }),
                $('.btnButtomDisp').css('display', 'none'),
                $('.MainBody').css({ 'background': 'linear-gradient(rgba(255, 255, 255, 0.3), rgba(255, 255, 255, 0.3)), url(img/bazarpic.jpg) center center', 'background-repeat': 'no-repeat', 'background-size': 'cover' });
        });
    $(".btnButtomDisp").hover(function () {
            $(this).css('width', '90px'),
                $(this).css('cursor', 'pointer');
        },
        function () {
            $(this).css('width', '37px');
        });
});


