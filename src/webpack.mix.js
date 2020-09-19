const mix = require('laravel-mix');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin')


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
    .sass('resources/css/app.scss', 'public/css')
    .options({
        processCssUrls: false,
        postCss: [
            require('postcss-import'),
            require('tailwindcss'),
        ]
    })
    .webpackConfig({
        plugins: [
            new BrowserSyncPlugin(
              // BrowserSync options
              {
                // browse to http://localhost:3000/ during development
                host: 'localhost',
                port: 3000,
                // proxy the Webpack Dev Server endpoint
                // (which should be serving on http://localhost:3100/)
                // through BrowserSync
                proxy: 'nginx:80'
              },
              // plugin options
              {
                // prevent BrowserSync from reloading the page
                // and let Webpack Dev Server take care of this
                reload: false
              }
            )
          ],
    });
