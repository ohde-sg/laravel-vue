const mix = require('laravel-mix');
var LiveReloadPlugin = require('webpack-livereload-plugin');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix
  .webpackConfig({
    plugins: [new LiveReloadPlugin({ port: 35729 })]
  })
  .options({
    hmrOptions: {
      host: '0.0.0.0',
      port: 3030
    }
  })
  .js('resources/js/app.js', 'public/js')
  .vue();
