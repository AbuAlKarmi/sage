require('../hammer.min');

export default () => {
  if (Sharect) {
    const sharect = new Sharect();
    sharect.config({
      twitterUsername: '@MetrasWebsite',
    }).init();
  }


  const tweets = document.getElementsByClassName('background-color');
  if (tweets.length) {
    Array.from(tweets).forEach(tweet => {
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
      const url = window.location;
      const text = jQuery(element.target).text();
      window.open('http://twitter.com/share?url=' + url + '&text=' + encodeURIComponent(text), '', 'left=0,top=0,width=550,height=450,personalbar=0,toolbar=0,scrollbars=0,resizable=0');
    });
  }



  //Swip Event
  var hammertime = new Hammer(jQuery('body')[0], {});
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

  hammertime.on('panstart', (ev) => {
    $('body').addClass(ev.additionalEvent);
  });

  hammertime.on('panend', (ev) => {
    $('body')
      .removeClass('panleft')
      .removeClass('panright');
  });

}


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
          console.log(index, element);
          const footnote = {
            number: $(element).data('mfn'),
            text: $(element).text(),
          };
          footnote['offset'] = $(`[data-mfn="${footnote.number}"]`).offset();
          const offsetLeft = Math.round($('article').offset().left - 315);
          $('#foot-notes').append(`<div class="foot-note" id="note-${footnote.number}" style="position: absolute; top: ${footnote.offset.top - 20}px; left: ${offsetLeft}px;"><div class="number">${footnote.number}</div><div class="content">${footnote.text}</div></div>`);


        });
      }
    }, 2000);
  }
});

// jQuery(document)
//   .on('mouseenter','.modern-footnotes-footnote', () => {
//     console.log('hover');
//   })
//   .on('mouseout', () => {
//     console.log('hoverOut');
//   });
