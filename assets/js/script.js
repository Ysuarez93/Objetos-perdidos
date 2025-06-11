const dropdownBtn = document.querySelector('.dropdown-btn');
const dropdownContent = document.querySelector('.dropdown-content');

dropdownBtn.addEventListener('click', () => {
    dropdownContent.style.display =
        dropdownContent.style.display === 'block' ? 'none' : 'block';
});

const submenuBtns = document.querySelectorAll('.submenu-btn');

submenuBtns.forEach((btn) => {
    btn.addEventListener('click', () => {
        const submenuContent = btn.nextElementSibling;
        submenuContent.style.display =
            submenuContent.style.display === 'block' ? 'none' : 'block';
    });
});