/* Add your app scripts here */
console.log("Genesis:app");

function ajax(action, data = {}) {
  return new URLSearchParams({
    action,
    ...data,
  });
}

fetch(AJAX.url, {
  method: "POST",
  headers: {
    "X-Csrf-Token": AJAX.csrfToken,
  },
  body: ajax("test", { id: 1012 }),
})
  .then((r) => r.json())
  .then((r) => console.log(r));

document.documentElement.addEventListener("click", function () {
  let scheme = this.dataset.prefersColorScheme;
  this.dataset.prefersColorScheme = scheme == "dark" ? "light" : "dark";
});
