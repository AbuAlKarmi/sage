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
    speed: 1500,
    adaptiveHeight: false
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
