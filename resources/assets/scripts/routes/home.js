import StickyScroller from "sticky-scroller";

/**
 * Home
 */
export default () => {
  jQuery(document).ready(function() {
    if( jQuery(document).height() > jQuery('#sidebar').height() ) {
      const scroller = new StickyScroller(".home #sidebar");

      $('.sidebar-inner').addClass('initialized')
    }
  });
};
