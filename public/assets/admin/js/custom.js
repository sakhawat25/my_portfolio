/*
 * For showing titles in a loop
 */
const title = document.getElementById("title");

const titles = title.getAttribute("data-typed-items");

const titlesArray = titles.split(",");

var typed = new Typed("#title", {
    strings: titlesArray,
    loop: true,
    typeSpeed: 100,
    backSpeed: 50,
    backDelay: 2000,
});

/*
 * For titles input on profile page
 */
const inputElements = document.querySelectorAll(".tagify");

inputElements.forEach((input) => new Tagify(input, {
    transformTag: function(tagData) {
        tagData.style = "--tag-bg:#4fd1c5;--tag-text-color:#fff;--tag-hover:#38b2ac;--tag-remove-btn-color:#fff;"
    }
}));

// const tagify = new Tagify(titlesInput);
