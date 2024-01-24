(function ($) {
  $(document).ready(function (e) {
    
  /*------------------------------------------------
              LOADER
  ------------------------------------------------*/
  $(window).on('load', function() {
    $("#loader-wrapper").fadeOut();
    $("#loaded").delay(1000).fadeOut("slow");
  });

    // Smooth scroll to top function
    function scrollToTop() {
      if (document.documentElement.scrollTop > 0) {
        window.scrollBy(0, -70);
        requestAnimationFrame(scrollToTop);
      }
    }

    // Scroll event handler
    $(window).scroll(function() {
      var scrollToTopImage = $('#scrollToTopImage');
      var scrollTopValue = $(this).scrollTop();
      scrollToTopImage.toggle(scrollTopValue > 600);
    });

    // Scroll to top image click event handler
    $('#scrollToTopImage').on('click', function() {
      scrollToTop();
    });

    // Hide empty or comment-only <p> elements
    $('p').each(function() {
      var $paragraph = $(this);
      if ($paragraph.is(':empty') || $paragraph.html().trim() === '<!-- Contents Here -->') {
        $paragraph.hide();
      }
    });
         // typing text animation script
         var typed = new Typed(".typing", {
          strings: ["Developer", "Blogger", "Wordpress Developer", "Freelancer"],
          typeSpeed: 100,
          backSpeed: 60,
          loop: true
      });

    // Initialize WOW.js animation library
    new WOW().init();
  });
})(jQuery);

