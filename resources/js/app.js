/* Add your app scripts here */
console.log("Genesis:app");

function ajax(action, data = {}) {
  return new URLSearchParams({
    action,
    ...data,
  });
}

[...document.querySelectorAll('form[data-ajax]')].forEach(function(form){

    form.onsubmit = e => {
        e.preventDefault();

        return (async function() {

        const request = await fetch(AJAX.url,{
            method:'POST',
            headers: {
                "X-Csrf-Token": AJAX.csrfToken,
            },
            body: ajax("login", Object.fromEntries(new FormData(e.target))),
        });

        const response = await request.json();

        console.log(response);

        if (response.error) {
            console.log(error);
        }else {
            window.location.href = response.success
        }

    })();

    }


});



/*


fetch(AJAX.url, {
  method: "POST",
  headers: {
    "X-Csrf-Token": AJAX.csrfToken,
  },
  body: ajax("test", { id: 1012 }),
})
  .then((r) => r.json())
  .then((r) => console.log(r));

**/
const prefersColorScheme = {
    init() {
        this.el = document.documentElement
        this.key = 'prefers-color-scheme'

        this.bindListeners()

        this.set(this.get())
    },
    bindListeners() {
        let button = document.getElementById(this.key)
        if (button) {
            button.onclick = () => this.update()
        }
    },
    update() {
        let newScheme = this.get() == 'dark' ? 'light' : 'dark'
        this.set(newScheme)
    },
    get() {
        return localStorage.getItem(this.key)
    },
    set(value) {
        this.el.dataset.prefersColorScheme = value
        localStorage.setItem(this.key, value)
    }
}
prefersColorScheme.init()