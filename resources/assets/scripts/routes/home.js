import StickyScroller from "sticky-scroller";

/**
 * Home
 */
export default () => {
  jQuery(document).ready(function() {
    // if( jQuery(document).height() > jQuery('.sidebar:first').height() ) {
    //   simpleStickySidebar('.sidebar-inner', {
    //     container: '.sidebar',
    //     bottomSpace: 180,
    //   });
    //
    //   $('.sidebar-inner').addClass('initialized')
    // }
    const scroller = new StickyScroller("#sidebar");
  });
};
