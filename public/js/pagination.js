const links = document.querySelectorAll('.content__pagination-link');
for (let i = 0; i < links.length; i++) {
    if (links[i].href === document.URL) {
        links[i].classList.add('active');
    }
}
    
