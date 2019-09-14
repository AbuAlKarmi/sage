import simpleStickySidebar from "../sticky-sidebar";


/**
 * Home
 */
export default () => {
  //--
  jQuery(document).ready(function() {
    simpleStickySidebar('.sidebar-inner', {
      container: '.sidebar',
      bottomSpace: 180,
    });
  });
};
