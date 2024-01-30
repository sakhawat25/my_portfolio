/*
 * For showing titles in a loop
 */
const title = document.getElementById('title');

const titles = title.getAttribute('data-typed-items')

const titlesArray = titles.split(',')

var typed = new Typed('#title', {
    strings: titlesArray,
    loop: true,
    typeSpeed: 100,
    backSpeed: 50,
    backDelay: 2000
  });
