module.exports = {
  future: {
    removeDeprecatedGapUtilities: true,
    purgeLayersByDefault: true,
  },
  purge: {
    layers: ["base", "utilities"],
    content: ["./templates/**/*.php"],
  },
  theme: {
    container: {
      center: true,
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
};
