const mobileMenu = ()=> {
    const mob_icon_menu = document.querySelector('#mobile-header__icon-menu');
    const mob_drawer_close = document.querySelector('.mobile-header__drawer-overlay');
    const mob_drawer = document.querySelector('#mobile-header__drawer');

    mob_drawer.addEventListener('touchmove', function(e) {
        e.preventDefault();
    }, {passive: false});

    mob_icon_menu.addEventListener("click", function() {
        mob_drawer.classList.toggle("mobile-header__drawer--animation");
        mob_drawer_close.classList.toggle("mobile-header__drawer--fade");
    });

    mob_drawer_close.addEventListener("click", function() {
        mob_drawer.classList.toggle("mobile-header__drawer--animation");
        mob_drawer_close.classList.toggle("mobile-header__drawer--fade");
    });
}

export default mobileMenu();