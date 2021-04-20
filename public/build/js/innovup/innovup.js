
$('.dropdown-toggle.user-dd-toggle').click(function(){
    var elem = '.dropdown-menu.user-dd';
    if($(elem).hasClass('show')) {
        $('.dropdown-menu.user-dd').removeClass('show')
    } else {
        $('.dropdown-menu.user-dd').addClass('show');
    }
});