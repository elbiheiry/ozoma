/* Loading 
================================*/
$(window).on("load", function () {
  "use strict";
  AOS.init({
    offset: 100,
    duration: 500,
    easing: "ease-in-out",
  });
  $(".load_cont").fadeOut(function () {
    $(this).parent().fadeOut();
    $("body").css({
      "overflow-y": "visible",
    });
  });
});

$(document).ready(function () {
  "use strict";
  // Top
  var scrollbutton = $(".scroll_btn");
  $(window).scroll(function () {
    $(this).scrollTop() >= 1 ? scrollbutton.hide() : scrollbutton.show();
  });
  //Header
  $(window).scroll(function () {
    let scroll = $(window).scrollTop();
    if (scroll >= 20) {
      $("header").addClass("move shadow");
    } else {
      $("header").removeClass("move shadow");
    }
  });
  // Category btn
  $(".categery_btn").click(function () {
    $(".category_nav").toggleClass("move");
  });
});
