function isProduction() {
  return process.env.NODE_ENV === "production";
}

module.exports = {
  plugins: [
    require("postcss-import"),
    require("tailwindcss"),
    require("autoprefixer"),
    ...(isProduction() ? [require("cssnano")] : []),
  ],
};
