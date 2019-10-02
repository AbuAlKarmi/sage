
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

jQuery(document).on('click', '.brand', (e) => {
  e.preventDefault();
  jQuery('body').toggleClass('menu-open');
});


jQuery(document).ready(function() {
  if(jQuery('.carousel').length ){
    initSlider(jQuery('.carousel'));
  }

  if(jQuery('body').hasClass('isMobile')){
    jQuery('#header-menu').append(jQuery('.affix-menu .nav-primary').clone());
    jQuery('.affix-menu .nav-primary').remove();
  }

  var toggleAffix = function(affixElement, scrollElement, wrapper) {
    var height = affixElement.outerHeight(),
      top = wrapper.offset().top;

    if (scrollElement.scrollTop() >= top){
      wrapper.height(height);
      affixElement.addClass("affix");
    }
    else {
      affixElement.removeClass("affix");
      wrapper.height('auto');
    }

  };


  $('#header-menu').each(function() {
    var ele = $(this),
      wrapper = $('<div></div>');

    ele.before(wrapper);
    $(window).on('scroll resize', function() {
      toggleAffix(ele, $(this), wrapper);
    });

    // init
    toggleAffix(ele, $(window), wrapper);
  });

  // jQuery('iframe').each(function (index, element) {
  //   console.log('llll');
  //   jQuery('iframe').load( function() {
  //     console.log('@@@', jQuery('iframe').contents().find("head"));
  //     // .append($("<style type='text/css'>  .my-class{display:none;}  </style>"));
  //   });
  // })

});

setTimeout(() => {
  $(".wp-block-embed:not([class*='wp-block-embed-']) iframe").each(function(){
    function injectCSS(){
      $iframe.contents().find('head').append(
        $(`<style type='text/css'>
            body{
                direction: rtl;
            }
            .art-bd{
                width: 40%;
            }
            .pair-bd{
                display: flex;
            }
            .txt-bd .description{
                display: none;
            }
            .txt-bd .action{
                display: none;
            }
            .card .provider{
              float: right;
              letter-spacing: 0;
              margin-right: 0px;
            }
            .brd{
                display: none;
            }
            </style>`)
      );
    }

    var $iframe = $(this);
    $iframe.on('load', injectCSS);
    injectCSS();
  });
}, 300);

setTimeout(() => {
  $('iframe.embedly-card').each(function(){
    function injectCSS(){
      $iframe.contents().find('head').append(
        $(`<style type='text/css'>  
            body{
                direction: rtl;
            }  
            .brd{
                display: none;
            }
            </style>`)
      );
    }

    var $iframe = $(this);
    $iframe.on('load', injectCSS);
    injectCSS();
  });
}, 300);





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
    adaptiveHeight: false,
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
