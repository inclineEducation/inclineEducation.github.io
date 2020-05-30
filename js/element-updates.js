$(document).ready(function(){
    console.log('document ready');
    var observer = new MutationObserver(function (mutations, me) {
        var canvas = document.getElementsByClassName('nav-link');
        if (canvas) {
            $('.nav-link').each(function() {
                console.log('navbar item: ' + $(this).attr('href').split('.html')[0]);
                console.log('current page: ' + location.href.split("/").slice(-1)[0].split('.html')[0]);
                if (($(this).attr('href').split('.html')[0] == location.href.split("/").slice(-1)[0].split('.html')[0]) ||
                ($(this).attr('href').split('.html')[0] == 'index' && location.href.split("/").slice(-1)[0].split('.html')[0] == '')){
                     $(this).addClass('active');
                }
            });

            me.disconnect();
            return;
        }
    });

    observer.observe(document, {
        childList: true,
        subtree: true
    })
    
});