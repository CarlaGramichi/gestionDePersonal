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

// mix.autoload({jquery: ['$', 'jQuery', 'window.jQuery']});

mix.js('resources/js/app.js', 'public/js');
// mix.copy('node_modules/devbridge-autocomplete/dist/jquery.autocomplete.min.js', 'public/js/plugins/devbridge-autocomplete/jquery.autocomplete.min.js');
mix.copy('resources/css/plugins/typeahead/typeaheadjs.css', 'public/css/plugins/typeaheadjs.css');
mix.copy('node_modules/bootstrap-3-typeahead/bootstrap3-typeahead.min.js', 'public/js/plugins/typeahead/typeahead.min.js');
mix.copy('node_modules/inputmask/dist/min/jquery.inputmask.bundle.min.js', 'public/js/plugins/inputmask/inputmask.min.js');
mix.copy('node_modules/chart.js/dist/Chart.min.js', 'public/js/plugins/chartjs/chart.min.js');
mix.copy('node_modules/chart.js/dist/Chart.min.css', 'public/css/plugins/chartjs/chart.min.css');
mix.scripts('resources/js/global.js', 'public/js/global.js').version();
mix.scripts('resources/js/career_selectors.js', 'public/js/career_selectors.js').version();

mix.sass('resources/sass/app.scss', 'public/css').version();
