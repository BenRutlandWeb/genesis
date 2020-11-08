const mix = require("laravel-mix");

const postCss = [
  require("postcss-import"),
  require("postcss-nested"),
  require("tailwindcss"),
];

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Genesis theme.
 |
 */

mix
  .js("resources/js/admin.js", "js")
  .js("resources/js/app.js", "js")

  .postCss("resources/css/admin.css", "css", postCss)
  .postCss("resources/css/app.css", "css", postCss)
  .postCss("resources/css/editor.css", "css", postCss)

  .setPublicPath("dist")

  .version();
