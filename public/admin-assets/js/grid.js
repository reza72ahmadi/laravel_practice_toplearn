$(document).ready(function () {
  function removeAllSidebarToggleClass() {
    $("#sidebar-toggle-show").removeClass("d-inline d-md-none");
    $("#sidebar-toggle-hide").removeClass("d-none d-md-inline");
  }

  $("#sidebar-toggle-hide").click(function () {
    $("#sidebar").fadeOut(300);
    $("#main-body").animate({ width: "100%" }, 300);
    setTimeout(function () {
      removeAllSidebarToggleClass();
      $("#sidebar-toggle-show").addClass("d-inline");
      $("#sidebar-toggle-hide").addClass("d-none");
    }, 300);
  });

  $("#sidebar-toggle-show").click(function () {
    $("#sidebar").fadeIn(300);
    removeAllSidebarToggleClass();
    $("#sidebar-toggle-hide").removeClass("d-none");
    $("#sidebar-toggle-show").addClass("d-none");
  });
  //--toggle----
  $("#menu-toggle").click(function () {
    $("#body-header").toggle(300);
  });

  // search
  $("#search-toggle").click(function () {
    $("#search-toggle").removeClass("d-md-inline");
    $("#search-area").addClass("d-md-inline");
    $("#search-input").animate({ width: "12rem" }, 300);
  });
  //   seach input
  $("#search-area-hide").click(function () {
    $("#search-input").animate({ width: "0rem" }, 300);
    setTimeout(function () {
      $("#search-toggle").addClass("d-md-inline");
      $("#search-area").removeClass("d-md-inline");
    }, 300);
  });
  $("#header-notification-toggle").click(function () {
    $("#header-notification").fadeToggle();
  });
  $("#comment-notification-toggle").click(function () {
    $("#header-comment").fadeToggle();
  });
  $("#header-profile-toggle").click(function () {
    $("#header-profile").fadeToggle();
  });

  $(".sidebar-dropdown-toggle").click(function () {
    $(this).parent().toggleClass("sidebar-group-link-active");

    $(this).children(".angle").toggleClass("fa-angle-left fa-angle-down");

    // Close other dropdowns
    $(".sidebar-group-link")
      .not($(this).parent())
      .removeClass("sidebar-group-link-active");
    $(".sidebar-group-link")
      .not($(this).parent())
      .children(".sidebar-dropdown-toggle")
      .children(".angle")
      .removeClass("fa-angle-down")
      .addClass("fa-angle-left");
  });

  $("#full-screen").click(function () {
    function toggleFullScreen() {
      if (!document.fullscreenElement) {
        // Enter fullscreen
        document.documentElement.requestFullscreen();
        $("#screen-compress").removeClass("d-none");
        $("#screen-expand").addClass("d-none");
      } else {
        // Exit fullscreen
        if (document.exitFullscreen) {
          document.exitFullscreen();
          $("#screen-compress").addClass("d-none");
          $("#screen-expand").removeClass("d-none");
        }
      }
    }
    toggleFullScreen();
  });
});
