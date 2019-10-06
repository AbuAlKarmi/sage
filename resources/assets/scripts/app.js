/**
 * External Dependencies
 */
import 'jquery';
import 'bootstrap';
import { router } from 'js-dom-router';
require('./componsnets/soundcloud');

/**
 * DOM-based routing
 */
import about from './routes/about';
import single from './routes/single';
import home from './routes/home';

/**
 * Below is an example of a dynamic import; it will not be loaded until it's needed.
 *
 * See: {@link https://webpack.js.org/guides/code-splitting/#dynamic-imports | Dynamic Imports}
 */
// const home = async () => import(/* webpackChunkName: "./scripts/routes/home" */ './routes/home');
// const single = async () => import(/* webpackChunkName: "./scripts/routes/single" */ './routes/single');

/**
 * Set up DOM router
 *
 * .on(<name of body class>, callback)
 *
 * See: {@link http://goo.gl/EUTi53 | Markup-based Unobtrusive Comprehensive DOM-ready Execution} by Paul Irish
 */
router
  .on('about-us', about)
  .on('home', home)
  .on('single', single)
  .ready();
  // .on('home', async (event) => (await home()).default(event))
  // .on('single', async (event) => (await single()).default(event))
  // .ready();


