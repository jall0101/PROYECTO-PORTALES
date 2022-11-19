const bar = document.getElementById('bar');
const close =  document.getElementById('close');
const nav = document.getElementById('navbar');
const overlay = document.querySelector('[data-overlay]');

const closeFunc = function () {
    nav.classList.remove('active');
    overlay.classList.remove('active');
}

bar.addEventListener('click', function () {
    nav.classList.add('active');
    overlay.classList.add('active');
});

close.addEventListener('click', closeFunc);
overlay.addEventListener('click', closeFunc);

let tabs = document.querySelectorAll('.b-menu'),
    contents = document.querySelectorAll('.f-menu');

tabs.forEach((tab, index) => {
    tab.addEventListener('click', () => {
        contents.forEach((content) => {
            content.classList.remove('is-active');
        });
        tabs.forEach((tab) => {
            tab.classList.remove('is-active');
        });
        contents[index].classList.add('is-active');
        tabs[index].classList.add('is-active');
    });
});
