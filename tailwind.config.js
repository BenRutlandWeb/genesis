module.exports = {
  future: {
    removeDeprecatedGapUtilities: true,
    purgeLayersByDefault: true,
  },
  purge: {
    layers: ["base", "utilities"],
    content: ["./resources/views/**/*.blade.php","./resources/views/**/*.php"],
  },
  theme: {
    container: {
      contentWidth: "45rem",
      wideWidth: "60rem",
      gutter: "1rem",
    },
    colors: {
      primary: "var(--primary)",
      secondary: "var(--secondary)",
      white:"var(--white)",
      black:"var(--black)",
      error:"var(--error)",
      grey: {
        50: "var(--grey-50)",
        100: "var(--grey-100)",
        200: "var(--grey-200)",
        300: "var(--grey-300)",
        400: "var(--grey-400)",
        500: "var(--grey-500)",
        600: "var(--grey-600)",
        700: "var(--grey-700)",
        800: "var(--grey-800)",
        900: "var(--grey-900)",
      },
    },
    editorColorPalette: {
      primary: "var(--primary)",
      secondary: "var(--secondary)",
    },
    editorFontSizes: {
      small: "1rem",
      medium: "1.25rem",
      large: "1.5rem",
    },
    extend: {},
  },
  variants: {},
  plugins: [require("./tailwindwp.plugin")],
  corePlugins: {
    container: false,
  },
};
