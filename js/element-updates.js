$(document).ready(function(){
    $('.nav-link').each(function() {
        if ($(this).attr('href').split('.html')[0] == location.href.split("/").slice(-1)[0].split('.html')[0]){
             $(this).addClass('active');
        }
    });
});