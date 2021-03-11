jQuery( document ).ready(function( $ ) {
  // Set up main nav and dropdown
  $('#banner-nav .nav-link').first().addClass('active');
  // $('.dropdown-toggle').dropdown();

  var bannerHeight = 168;
  var $bannerSub = $('#banner .banner-sub');
  bannerHeight = $bannerSub.offset().top;

  $(window).scroll(function() {


    var scroll = $(window).scrollTop();
    if(scroll >= bannerHeight) {
      $('#main').addClass('scroll-pos-1');
    }
    else{
      $('#main').removeClass('scroll-pos-1');
    }
  });
});
