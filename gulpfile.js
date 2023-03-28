const elixir = require('laravel-elixir');

elixir(function(mix) {
   mix.sass('resources/sass/style.scss', 'public/css');
});
