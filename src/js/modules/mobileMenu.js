const mobileMenu = ()=> {
    const root_doc = document.querySelector('body');
    const mob_icon_menu = document.querySelector('#mobile-header__icon-menu');
    const mob_drawer_close = document.querySelector('.mobile-header__drawer-overlay');
    const mob_drawer = document.querySelector('#mobile-header__drawer');

    mob_icon_menu.addEventListener("click", function() {
        mob_drawer.classList.toggle("mobile-header__drawer--animation");
        mob_drawer_close.classList.toggle("mobile-header__drawer--fade");
        root_doc.classList.toggle("overflow-hidden");
    });

    mob_drawer_close.addEventListener("click", function() {
        mob_drawer.classList.toggle("mobile-header__drawer--animation");
        mob_drawer_close.classList.toggle("mobile-header__drawer--fade");
        root_doc.classList.toggle("overflow-hidden");
    });
}

export default mobileMenu();