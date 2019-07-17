$(window).scroll(function() {
    var scroll = $(window).scrollTop();

    if (scroll >= 20) {
        $("[bar].flat.fixed").addClass("depth-1");
    } else {
        $("[bar].flat.fixed").removeClass("depth-1");
    }
});
$(window).scroll(function() {
    var scroll = $(window).scrollTop();

    if (scroll >= 7) {
          $("[bar].prominent").addClass("condensed");


    } else {
        $("[bar].prominent").removeClass("condensed");


    }
});