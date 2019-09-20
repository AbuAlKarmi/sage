import simpleStickySidebar from "../sticky-sidebar";


/**
 * Home
 */
export default () => {
  //--
  console.log(jQuery(document).height(), jQuery('.sidebar:first').height());
  jQuery(document).ready(function() {
    if( jQuery(document).height() > jQuery('.sidebar:first').height() ) {
      simpleStickySidebar('.sidebar-inner', {
        container: '.sidebar',
        bottomSpace: 180,
      });

      $('.sidebar-inner').addClass('initialized')
    }
  });
};
