$(document).ready(() => {
  $(".section-about").waypoint(
    (a) => {
      if ("down" === a) {
        $("nav").addClass("sticky");
        $(".nav").hide();
      } else {
        $("nav").removeClass("sticky");
        $(".nav").show();
      }
    },
    { offset: "600px" }
  ),
    $(".card").waypoint(
      (a) => {
        if ("down" === a) {
          $("nav").addClass("sticky");
          $(".nav").hide();
        } else {
          $("nav").removeClass("sticky");
          $(".nav").show();
        }
      },
      { offset: "600px" }
    ),
    $(".footer").waypoint(
      (a) => {
        if ("down" === a) {
          $("nav").addClass("sticky");
          $(".nav").hide();
        } else {
          $("nav").removeClass("sticky");
          $(".nav").show();
        }
      },
      { offset: "600px" }
    ),
    $(".flag").waypoint(
      (a) => {
        if ("down" === a) {
          $("nav").addClass("sticky");
          $(".nav").hide();
        } else {
          $("nav").removeClass("sticky");
          $(".nav").show();
        }
      },
      { offset: "600px" }
    ),
    $("a").click((a) => {
      $("html, body").animate(
        { scrollTop: $($attr(this, "href")).offset().top },
        700
      ),
        a.preventDefault();
    }),
    $(".mobile-nav-icon").click(() => {
      $(".header__nav-bar").slideToggle(200, null, function () {
        if ($(this).css("display") == "block") $(this).css("display", "flex");
      }),
        $(".mobile-nav-icon").hasClass("fa-bars")
          ? ($(".mobile-nav-icon").addClass("fa-times"),
            $(".mobile-nav-icon").removeClass("fa-bars"))
          : ($(".mobile-nav-icon").addClass("fa-bars"),
            $(".mobile-nav-icon").removeClass("fa-times"));
    });
});
