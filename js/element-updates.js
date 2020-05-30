$(document).ready(function(){
    console.log('document ready');
    $('.nav-link').each(function() {
        console.log('navbar item: ' + $(this).attr('href').split('.html')[0]);
        console.log('current page: ' + location.href.split("/").slice(-1)[0].split('.html')[0]);
        if ($(this).attr('href').split('.html')[0] == location.href.split("/").slice(-1)[0].split('.html')[0]){
             $(this).addClass('active');
        }
    });
});