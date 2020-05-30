/*
* function updateNavbar()
* activates current page in navbar
*/
function updateNavbar(){
    $('.nav-link').each(function() {
        if (($(this).attr('href').split('.html')[0] == location.href.split("/").slice(-1)[0].split('.html')[0]) ||
        ($(this).attr('href').split('.html')[0] == 'index' && location.href.split("/").slice(-1)[0].split('.html')[0] == '')){
             $(this).addClass('active');
        }
    });
}

//wait for navbar to load, then update it.
$(document).ready(function(){
    console.log('document ready');
    var canvas = document.getElementsByClassName('nav-link');
    if (canvas) {
        updateNavbar();
    } else {
        var observer = new MutationObserver(function (mutations, me) {
            var canvas = document.getElementsByClassName('nav-link');
            if (canvas) {
                updateNavbar();
                me.disconnect();
                return;
            }
        });
        observer.observe(document, {
            childList: true,
            subtree: true
        });
    }

    
});