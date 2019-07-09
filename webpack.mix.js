const mix = require('laravel-mix');
const exec = require('child_process').exec;

require('laravel-mix-purgecss');



// Public path helper
const publicPath = path => `${mix.config.publicPath}/${path}`;

// Source path helper
const src = path => `resources/assets/${path}`;

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Sage application. By default, we are compiling the Sass file
 | for your application, as well as bundling up your JS files.
 |
 */

// Public Path
mix
  .setPublicPath('./dist')
  .setResourceRoot(`wp-content/themes/metras.co/${mix.config.publicPath}/`)
  .webpackConfig({
    output: { publicPath: mix.config.resourceRoot }
  });

// Browsersync
mix.browserSync('metras.test');


// Styles
mix.sass(src`styles/app.scss`, 'styles')
  .sass(src`styles/app-rtl.scss`, 'styles')
  .purgeCss()
  .then(() => {
    exec('node_modules/rtlcss/bin/rtlcss.js ./dist/styles/app-rtl.css ./dist/styles/app-rtl.css');
  });



// JavaScript
mix.js(src`scripts/app.js`, 'scripts')
   .js(src`scripts/customizer.js`, 'scripts');
   // .extract();

// Assets
mix.copyDirectory(src`images`, publicPath`images`)
   .copyDirectory(src`fonts`, publicPath`fonts`);

// Autoload
mix.autoload({
  jquery: ['$', 'window.jQuery'],
});

// Options
mix.options({
  processCssUrls: false,
});

// Source maps when not in production.
if (!mix.inProduction()) {
  mix.sourceMaps();
}

// Hash and version files in production.
if (mix.inProduction()) {
  mix.version();
}
