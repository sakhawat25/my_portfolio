$(document).ready(function () {
    /*
     * For showing titles in a loop
     */
    const $title = $("#title");
    const titles = $title.data("typed-items");
    const titlesArray = titles.split(",");

    var typed = new Typed("#title", {
        strings: titlesArray,
        loop: true,
        typeSpeed: 100,
        backSpeed: 50,
        backDelay: 2000,
    });
});
