module.exports = function ({ addComponents, theme }) {
  const wpUtilities = {};

  /**
   * Editor color palette
   */
  for (let [key, color] of Object.entries(theme("editorColorPalette", {}))) {
    wpUtilities[`.has-${key}-color`] = { color };
    wpUtilities[`.has-${key}-background-color`] = {
      backgroundColor: color,
    };
  }

  /**
   * Editor font sizes
   */
  for (let [key, fontSize] of Object.entries(theme("editorFontSizes", {}))) {
    wpUtilities[`.has-${key}-font-size`] = { fontSize };
  }

  addComponents(wpUtilities, {
    respectPrefix: false,
    respectImportant: false,
  });
};
