export default () => {
  if( Sharect ){
    const sharect = new Sharect();
    sharect.config({
      twitterUsername: '@MetrasWebsite',
      selectableElements: ['.background-color'],
    }).init();
  }


  jQuery('.background-color').each((index,element) => {
    console.log( element );
    $(element).tooltip();
    element.addEventListener( 'click', () => {
      const url = window.location;
      const text = element.textContent;
      window.open('http://twitter.com/share?url=' + url + '&text=' + encodeURIComponent(text), '', 'left=0,top=0,width=550,height=450,personalbar=0,toolbar=0,scrollbars=0,resizable=0');
    });
  });

  //
  // console.log(document.getElementsByClassName('background-color'));
  //
  // Array.from(document.getElementsByClassName('background-color')).map(element => {
  //
  //   return new Popper(element, element.textContent, {placement: 'top'});
  // });
  // var popper = new Popper(document.getElementsByClassName('.background-color'), alert('hii'), {
  //   placement: 'top'
  // });


}
