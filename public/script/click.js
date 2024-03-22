const headers = document.querySelectorAll('.clickHeader');

headers.forEach(header => {
    header.addEventListener('click', () => {
        const parent = header.closest('.clickParent');
        const items = parent.querySelectorAll('.clickItem');

        items.forEach(item => {
            item.classList.toggle('clickItemActive');
        });
    });
});
