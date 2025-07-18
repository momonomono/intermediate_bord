import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

const close = document.querySelector("#js-close-button");
const background = document.querySelector("#js-form__bg");
const buttonShow = document.querySelector("#js-button__show-form");

close.addEventListener("click", () => {
    background.classList.add("js-hidden");
});

buttonShow.addEventListener("click", () => {
    background.classList.remove("js-hidden");
});