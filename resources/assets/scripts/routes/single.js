export default () => {
  if( Sharect ){
    const sharect = new Sharect();
    sharect.config({
      twitterUsername: '@MetrasWebsite',
    }).init();
  }


  const tweets = document.getElementsByClassName('background-color');
  if( tweets.length ){
    Array.from(tweets).forEach(tweet => {

      tweet.addEventListener( 'click', () => {
        const url = window.location;
        const text = element.textContent;
        window.open('http://twitter.com/share?url=' + url + '&text=' + encodeURIComponent(text), '', 'left=0,top=0,width=550,height=450,personalbar=0,toolbar=0,scrollbars=0,resizable=0');
      });

    });
  }

  const footNote = document.getElementsByClassName('modern-footnotes-footnote__note');
  if( footNote.length ){
    Array.from(footNote).map(element => {
      console.log(getOffset(element));
       return console.log({
         number: element.getAttribute('data-mfn'),
         content: element.textContent,
       });
    });
  }


}


function getOffset(el) {
  const rect = el.getBoundingClientRect();
  return {
    left: rect.left + window.scrollX,
    top: rect.top + window.scrollY
  };
}
