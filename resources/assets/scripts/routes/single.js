export default () => {
  if( Sharect ){
    const sharect = new Sharect();
    sharect.config({
      twitterUsername: '@MetrasWebsite',
      selectableElements: ['.background-color'],
    }).init();

  }
}
