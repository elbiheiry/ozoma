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

/* Top
=============================*/
$(document).ready(function () {
  "use strict";
  // Top
  var scrollbutton = $(".up_btn");
  $(window).scroll(function () {
    $(this).scrollTop() >= 1000
      ? scrollbutton.addClass("show")
      : scrollbutton.removeClass("show");
  });
  scrollbutton.click(function () {
    $("html , body").animate(
      {
        scrollTop: 0,
      },
      600
    );
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
  // Toggle Icon

  $(".toggle-btn").click(function () {
    $("aside").toggleClass("move");
  });
  // Profile
  $(".menu_btn").click(function () {
    $(".profile_head").toggleClass("move");
  });
  // Timer
  $(".timer_count").countTo();
  // Data Table
  $(".datatable").DataTable({
    info: false,
  });
  // Check all
  $(document).ready(function () {
    $("#selectAll").click(function () {
      if (this.checked) {
        $(".checkboxAll").each(function () {
          $(".checkboxAll").prop("checked", true);
        });
      } else {
        $(".checkboxAll").each(function () {
          $(".checkboxAll").prop("checked", false);
        });
      }
    });
  });

  // Counter Down
  if ($(".countdown").length) {
    $(".countdown").countdown({
      render: function (data) {
        if (data.years >= 1) {
          var $days = data.years * 365 + data.days;
        } else {
          var $days = data.days;
        }
        $(this.el).html(
          '<div class="sec">' +
            this.leadingZeros(data.sec, 2) +
            " <span>ثانية</span></div>" +
            '<div class="min">' +
            this.leadingZeros(data.min, 2) +
            " <span>دقيقة</span></div>" +
            '<div class="hour">' +
            this.leadingZeros(data.hours, 2) +
            " <span>ساعة</span></div>" +
            '<div class="day">' +
            this.leadingZeros($days) +
            " <span>يوم</span></div>"
        );
      },
    });
  }
});
