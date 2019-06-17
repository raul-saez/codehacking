const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css');

   mix.styles([
      'resources/css/bootstrap.css',
      'resources/css/blog-post.css',
      'resources/css/font-awesome.css',
      'resources/css/metisMenu.css',
      'resources/css/sb-admin-2.css'
  
  ], 'public/css/libs.css');
  
  mix.scripts([
      'resources/js/jquery.js',
      'resources/js/bootstrap.js',
      'resources/js/metisMenu.js',
      'resources/js/sb-admin-2.js',
      'resources/js/scripts.js'
  
  ], 'public/js/libs.js');