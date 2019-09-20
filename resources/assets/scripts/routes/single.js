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

      tweet.addEventListener('click', () => {
        const url = window.location;
        const text = element.textContent;
        window.open('http://twitter.com/share?url=' + url + '&text=' + encodeURIComponent(text), '', 'left=0,top=0,width=550,height=450,personalbar=0,toolbar=0,scrollbars=0,resizable=0');
      });

    });
  }
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

  setTimeout(() => {
    const footNote = document.getElementsByClassName('modern-footnotes-footnote__note');
    if( Array.from(footNote).length ){
      jQuery('body').css({'position':'relative'}).append('<div id="foot-notes" class="metras-foot-notes"></div>');
      Array.from(footNote).forEach(element => {


        console.log('offset', jQuery(element).offset());
        console.log('position', jQuery(element).position());
        const footnote = {
          number: element.getAttribute('data-mfn'),
          text: element.textContent,
        };

        footnote['offset'] = jQuery(`[data-mfn="${footnote.number}"]`).offset();

        const offsetLeft = Math.round(jQuery('article').offset().left - 315);

        jQuery('#foot-notes').append(`<div class="foot-note" style="position: absolute; top: ${footnote.offset.top - 20}px; left: ${offsetLeft}px;"><div class="number">${footnote.number}</div><div class="content">${footnote.text}</div></div>`);
      });
    }
  }, 2000);

});

