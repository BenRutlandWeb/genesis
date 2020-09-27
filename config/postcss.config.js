module.exports = {
  plugins: [
    require("postcss-import"),
    require("tailwindcss")("./config/tailwind.config.js"),
    ...(process.env.NODE_ENV === "production"
      ? [require("autoprefixer"), require("cssnano")]
      : []),
  ],
};
