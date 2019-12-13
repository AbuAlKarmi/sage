require('../hammer.min');
import Popper from 'popper.js';
import uniq from 'lodash/uniq';

export default () => {
  if (Sharect) {
    const sharect = new Sharect();
    sharect.config({
      twitterUsername: '@MetrasWebsite',
    }).init();
  }

  const tweets = uniq([
    ...Array.from(document.getElementsByClassName('background-color')),
    ...Array.from(document.querySelectorAll( `.entry-content span` )).filter(element => Array.from(element.style).includes('background-color')),
  ]);

  if (tweets.length) {
    tweets.forEach(tweet => {
      jQuery(tweet)
        .attr('data-tooltip-content', '#tooltip_content')
        .attr('data-toggle','tooltip');
    });
    jQuery('[data-toggle="tooltip"]')
      .tooltipster({
        contentCloning: true,
        theme: 'tooltipster-borderless',
      })
      .hover(
        (e) => {
          jQuery('#sharable-text').text(e.target.innerText);
        },
        () => {
          jQuery('#sharable-text').empty();
        }
      );
    jQuery('[data-toggle="tooltip"]').on('click', (element) => {
      let url = jQuery('link[rel="shortlink"]:first').attr('href');
      if( url === undefined ){
        url = encodeURIComponent(jQuery('link[rel="canonical"]:first').attr('href'));
      }
      const text = jQuery(element.target).text();
      window.open('http://twitter.com/share?url=' + url + '&text=' + encodeURIComponent(text), '', 'left=0,top=0,width=550,height=450,personalbar=0,toolbar=0,scrollbars=0,resizable=0');
    });

  }

  //Swip Event
  if($('body').hasClass('isMobile')){
    // initHummertime();
  }


  if( Boolean(window.ALLOW_LINK_PREVIEW) ){
    initLinkPreview();
  }
}


const initLinkPreview = () => {
  const popper = document.querySelector('.my-popper');
  let popperInstance = null;

  const removePopperInstance = () => {
    if( popperInstance ){
      popperInstance.destroy();
    }
  };

  jQuery('.post .entry-content a.ek-link').on({
    mouseover(e) {
      const link = jQuery(e.target).attr('href');
      jQuery(popper).find('.content').html(`<embed width="700" height="300" src="${link}">`);
      popperInstance = new Popper(e.target, popper, {});
    },
  });

  $(document).on('scroll', (e) => {
    removePopperInstance();
  });

  $(document).on('click',(e) => {
    removePopperInstance();
  });
};

const initHummertime = () => {

  delete Hammer.defaults.cssProps.userSelect;

  var hammertime = new Hammer(jQuery('body')[0], {
    behavior: {
      userSelect: true,
    },
  });


  hammertime.on('swipeleft', function(ev) {
    const nextLink = $('.single-post-navigation .post-nav-1');
    if(nextLink.length){
      window.location.href = nextLink.find('.card-image a').attr('href');
    }
  });

  hammertime.on('swiperight', function(ev) {
    const prevLink = $('.single-post-navigation .post-nav-2');
    if(prevLink.length){
      window.location.href = `${window.location.protocol}//${window.location.host}`;
    }
  });


  var interval = null;

  function startStuff(func, time) {
    interval = setInterval(func, time);
  }

  function stopStuff() {
    clearInterval(interval);
  }

  hammertime.on('panstart', (ev) => {
    stopStuff();
    $('body').addClass('panleft');
    startStuff(() => {
      $('body')
        .removeClass('panleft')
        .removeClass('panright');
    }, 500);
  });

  hammertime.on('panleft', (ev) => {
    $('body').addClass('panleft');
  });
  hammertime.on('panright', (ev) => {
    $('body').addClass('panright');
  });

  hammertime.on('panend', (ev) => {
    console.log('panend');
    $('body')
      .removeClass('panleft')
      .removeClass('panright');
  });
};


function getOffset(elem) { // crossbrowser version
  var box = elem.getBoundingClientRect();

  var body = document.body;
  var docEl = document.documentElement;

  var scrollTop = window.pageYOffset || docEl.scrollTop || body.scrollTop;
  var scrollLeft = window.pageXOffset || docEl.scrollLeft || body.scrollLeft;

  var clientTop = docEl.clientTop || body.clientTop || 0;
  var clientLeft = docEl.clientLeft || body.clientLeft || 0;

  var top  = box.top +  scrollTop - clientTop;
  var left = box.left + scrollLeft - clientLeft;

  return { top: Math.round(top), left: Math.round(left) };
}


document.addEventListener('DOMContentLoaded', (event) => {
  const $ = jQuery;
  if( !$('body').hasClass('isMobile') ){
    setTimeout(() => {
      const footNote = $('.modern-footnotes-footnote__note');
      if( footNote.length ){
        $('body').css({'position':'relative'}).append('<div id="foot-notes" class="metras-foot-notes"></div>');
        $(footNote).each((index, element) => {
          const footnote = {
            number: $(element).data('mfn'),
            text: $(element).text(),
          };
          footnote['offset'] = $(`[data-mfn="${footnote.number}"]`).offset();
          const offsetLeft = Math.round($('article').offset().left - 315);

          const $previousNote = $(`#note-${footnote.number - 1}`);
          let $noteOffset = footnote.offset.top - 20;
          if( $previousNote.length && ($previousNote.offset().top + $previousNote.height()) >= $noteOffset){
            $noteOffset = $previousNote.offset().top + $previousNote.height();
          }
          $('#foot-notes').append(`<div class="foot-note" id="note-${footnote.number}" style="position: absolute; top: ${$noteOffset}px; left: ${offsetLeft}px;"><div class="number">${footnote.number}</div><div class="content">${footnote.text}</div></div>`);
        });
      }
    }, 100);

    // $(document).on({
    //   mouseenter(e){
    //     if( e ){
    //       toggleNoteVisability(e, true);
    //     }
    //
    //   },
    //   mouseleave(e){
    //     if(e){
    //       toggleNoteVisability(e, false);
    //     }
    //   }
    // }, `[data-mfn], [data-mfn] a`);
  }
});

const toggleNoteVisability = (e, show = false) => {
  console.log( e.fromElement.localName );
  const $element = ['p','a'].includes(e.fromElement.localName) ? $(e.target).closest('[data-mfn]') : $(e.target);
  const number = $element.data('mfn');
  if(number){
    $(`#note-${number}`).css({
      display: show ? 'block' : 'none',
      top: $element.offset().top - 30,
    });
  }
};

// jQuery(document)
//   .on('mouseenter','.modern-footnotes-footnote', () => {
//     console.log('hover');
//   })
//   .on('mouseout', () => {
//     console.log('hoverOut');
//   });
