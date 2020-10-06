const mix = require("laravel-mix");

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Genesis theme.
 |
 */
const cssWithTailwind = [require("postcss-import"), require("tailwindcss")];
const cssWithoutTailwind = [require("postcss-import")];

mix
  .js("src/js/admin.js", "js")
  .js("src/js/app.js", "js")
  .js("src/js/login.js", "js")

  .postCss("src/css/admin.css", "css", cssWithoutTailwind)
  .postCss("src/css/app.css", "css", cssWithTailwind)
  .postCss("src/css/editor.css", "css", cssWithoutTailwind)
  .postCss("src/css/login.css", "css", cssWithTailwind)

  .setPublicPath("assets")

  .version();
