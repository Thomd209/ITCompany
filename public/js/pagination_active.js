const links = document.querySelectorAll('.content__pagination-item');
for (let i = 0; i < links.length; i++) {
    links[i].addEventListener('click', (e) => {
        if (this === e.target) {
            this.style.backgroundColor = 'red';
        }
    });
}
    
