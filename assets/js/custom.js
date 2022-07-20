var menu_child = document.querySelectorAll( '#menu-header-menu .sub-menu' );
var menu_child_child = document.querySelectorAll( '#menu-header-menu .sub-menu .sub-menu' );

var mobile_menu_child = document.querySelectorAll( '#menu-header-menu-1 .sub-menu' );
var mobile_menu_child_child = document.querySelectorAll( '#menu-header-menu-1 .sub-menu .sub-menu' );

for( i=0; i<menu_child.length; i++ ) {
    menu_child[i].parentElement.classList.add( 'add-icon' );
}

for( j=0; j<menu_child_child.length; j++ ) {
    menu_child_child[j].parentElement.classList.add( 'add-icon-02' );
}

for( k=0; k<mobile_menu_child.length; k++ ) {
    mobile_menu_child[k].parentElement.classList.add( 'add-icon-03' );
}

for( l=0; l<mobile_menu_child_child.length; l++ ) {
    mobile_menu_child_child[l].parentElement.classList.add( 'add-icon-03' );
}


var mob_icon_menu = document.querySelector('#mobile-header__icon-menu');
var mob_drawer_close = document.querySelector('.mobile-header__drawer-overlay');
var mob_drawer = document.querySelector('#mobile-header__drawer');

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


const tabs = document.querySelectorAll( '[data-tab-target]' );
const tabContents = document.querySelectorAll( '[data-tab-content]' );

tabs.forEach( tab => {
    tab.addEventListener('click', () => {
        const target = document.querySelector( tab.dataset.tabTarget );

        tabContents.forEach( tabContent => {
            tabContent.classList.remove('active');
        });

        tabs.forEach( tab => {
            tab.classList.remove('active');
        });

        target.classList.add('active');
        tab.classList.add('active');
    });
} );





