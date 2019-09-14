import simpleStickySidebar from './sticky-sidebar';
/**
 * This file allows you to add functionality to the Theme Customizer
 * live preview. jQuery is readily available.
 *
 * {@link https://codex.wordpress.org/Theme_Customization_API}
 */

/**
 * Change the blog name value.
 *
 * @param {string} value
 */
// wp.customize('blogname', (value) => {
//   value.bind(to => $('.brand').text(to));
// });\

jQuery(document).ready(function() {
  if(jQuery('.carousel').length ){
    initSlider(jQuery('.carousel'));
  }

  simpleStickySidebar('.sidebar-inner', {
    container: '.sidebar',
    bottomSpace : 180,
  });
});


function initSlider($slider){
  var time = 2;
  var $bar,
    $slick,
    isPause,
    tick,
    percentTime;

  $slick = $slider;
  $slick.slick({
    // rtl: true,
    arrows: true,
    // speed: 3000,
    autoplaySpeed: 3000,
    // adaptiveHeight: false,
    fade: true,
    cssEase: 'linear',
  });

  $bar = $('.slider-progress .progress');

  function startProgressbar() {
    resetProgressbar();
    percentTime = 0;
    isPause = false;
    tick = setInterval(interval, 30);
  }

  function interval() {
    if (isPause === false) {
      percentTime += 1 / (time + 0.1);
      $bar.css({
        width: percentTime + "%"
      });
      if (percentTime >= 100) {
        $slick.slick('slickNext');
        startProgressbar();
      }
    }
  }

  function resetProgressbar() {
    $bar.css({
      width: 0 + '%'
    });
    clearTimeout(tick);
  }

  startProgressbar();

  $('.slick-next, .slick-prev').click(function() {
    startProgressbar();
  });

}
