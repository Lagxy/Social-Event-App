function loadPage(page) {
    fetch(`html/${page}.html`)
        .then((res) => res.text())
        .then((html) => {
            document.getElementById("app").innerHTML = html;
            updateHeaderTitle(page);
        })
        .catch(() => {
            document.getElementById("app").innerHTML = "<p>Page not found</p>";
            updateHeaderTitle("not found");
        });
}

function updateHeaderTitle(page) {
    const h1 = document.querySelector("#top-panel h1");
    if (h1) {
        h1.textContent = page.charAt(0).toUpperCase() + page.slice(1);
    }
}

// Optional: Load default content on page load
window.onload = () => loadPage("home");
