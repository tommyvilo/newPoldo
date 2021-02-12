var height;
$(window).scroll(function() {
    height = $(document).height()-$(window).height();
    //console.log(height+" "+$(this).scrollTop());
    if (height==0) {
        document.getElementById("footer").style.display = "inline";
    } else {
        document.getElementById("footer").style.display = "none";
    }
});