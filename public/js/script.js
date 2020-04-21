const header = document.querySelector('.header');
const menu_btn = document.querySelector('.header__burger');
const menu_list = document.querySelector('.header__list');
menu_btn.addEventListener('click', () => {
    menu_list.classList.toggle('header__menu-list_open');
});