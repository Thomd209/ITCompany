const menu_btn = document.querySelector('.header__menu-btn');
const menu_list = document.querySelector('.header__menu-list');
menu_btn.addEventListener('click', () => {
    this.classList.toggle('active');
    for (let i = 0; i < 3; i++) {
        if (i === 1) {
            this.children[i].style.transition = 'opacity .5s';
        } else{
            this.children[i].style.transition = 'transform .5s';
        }
    }

    menu_list.classList.toggle('header__menu-list_open');
    menu_list.style.transition = '.5s';
});