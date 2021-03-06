//Look Ma, I made a javascript!
//-Roy

/*
* function updateNavbar()
* activates current page in navbar
*/
function updateNavbar(){
    var page = $("meta[name='navpage']").attr("content");
    //console.log("page:");
    //console.log(page);
    $('.nav-link').each(function() {
        //console.log("looking for:")
        //console.log(($(this).attr('navpage')));
        if (($(this).attr('navpage')) == $("meta[name='navpage']").attr("content")){
             $(this).addClass('active');
        }
    });
}

//wait for navbar to load, then update it.
$(document).ready(function(){
    console.log('document ready');
    var canvas = document.getElementsByClassName('nav-link');
    if (canvas) {
        //console.log('non-mutation - navbar loaded');
        updateNavbar();
    }
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

    
});