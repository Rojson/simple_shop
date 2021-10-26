$(document).ready(function() {
    
    const hamburger = document.querySelector('.mobile-menu');
    const nav = document.querySelector('.mobile-nav');

    const handleClick = () => {
    hamburger.classList.toggle('mobile-menu--active');
    nav.classList.toggle('mobile-nav--active');
    }

    hamburger.addEventListener('click', handleClick);
    
})