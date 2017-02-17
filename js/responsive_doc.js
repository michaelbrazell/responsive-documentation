//Internet Explorer 10 in Windows 8 and Windows Phone 8
if (navigator.userAgent.match(/IEMobile\/10\.0/)) {
  var msViewportStyle = document.createElement('style')
  msViewportStyle.appendChild(
    document.createTextNode(
      '@-ms-viewport{width:auto!important}'
    )
  )
  document.querySelector('head').appendChild(msViewportStyle)
}

//Smooth Scroll
$(function() {
  $('a.smooth_scroll[href*=#]:not([href=#])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top
        }, 1000);
				$('.row-offcanvas').removeClass('active')
        return false;
      }
    }
  });
});

// Display Component Count
$(document).ready(function(){
  $('.component-count').html($('.component-count-statistics').html());
});
