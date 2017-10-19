process.env.DISABLE_NOTIFIER = true;
var gulp = require('gulp');
var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
	mix.scripts(
		[
			"jquery.min.js",
			"bootstrap.js",
			"bootstrap-notify.min.js",
			"bootstrap-datepicker.js",
			"mustache.js",
			"moment-with-locales.js",
			"app.js"
		],
		"public/js/app.js"
	)
	.scripts(
		[
			"validate-0.11.1.min.js"
		],
		"public/js/validate.js"
	)
	.scripts(
		[
			"axios.min.js"
		],
		"public/js/axios.js"
	)
	.scripts(
		[
			"vue.js"
		],
		"public/js/vue.js"
	)
	.scripts(
		[
			"jquery-ui.min.js"
		],
		"public/js/autocomplete.js"
	)
	.styles(
		[
			"bootstrap.min.css",
			"bootstrap-datepicker3.min.css"
		],
		"public/css/app.css"
	)
	.styles(
		[
			"dashboard.css"
		],
		"public/css/backend.css"
	)
	.styles(
		[
			"jumbotron.css"
		],
		"public/css/frontend.css"
	)
	.styles(
		[
			"jquery-ui.min.css"
		],
		"public/css/autocomplete.css"
	)
	.version(
		[
			"js/app.js",
			"js/axios.js",
			"js/validate.js",
			"js/vue.js",
			"js/autocomplete.js",
			"css/app.css",
			"css/backend.css",
			"css/frontend.css",
			"css/autocomplete.css"
		],
		"public/build"
	).copy(
		"resources/assets/fonts",
		"public/build/fonts"
	);
});
