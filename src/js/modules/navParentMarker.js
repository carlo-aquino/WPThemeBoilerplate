const navMarker = ()=> {
    const top_level_link = document.querySelectorAll( 'nav ul.menu li.menu-item-has-children > a' );

    const menu_child = document.querySelectorAll( '#menu-header-menu .sub-menu' );
    const menu_child_child = document.querySelectorAll( '#menu-header-menu .sub-menu .sub-menu' );

    const mobile_menu_child = document.querySelectorAll( '#menu-header-menu-1 .sub-menu' );
    const mobile_menu_child_child = document.querySelectorAll( '#menu-header-menu-1 .sub-menu .sub-menu' );

    if( top_level_link ) {
        top_level_link.forEach( link => {
            link.addEventListener('click', (link)=> {
                link.preventDefault();
            });
        } );
    }

    if( menu_child ) {
        menu_child.forEach( menu => {
            menu.parentElement.classList.add( 'add-icon' );
        } );
    }

    if( menu_child_child ) {
        menu_child_child.forEach( menu => {
            menu.parentElement.classList.add( 'add-icon-02' );
        } );
    }

    if( mobile_menu_child ) {
        mobile_menu_child.forEach( menu => {
            menu.parentElement.classList.add( 'add-icon-03' );
        } );
    }

    if( mobile_menu_child_child ) {
        mobile_menu_child_child.forEach( menu => {
            menu.parentElement.classList.add( 'add-icon-03' );
        } );
    }

    //sticky header
    window.addEventListener('scroll', ()=> {
        const header = document.querySelectorAll('.header');
        
        header.forEach( item => {
            if( item && item.dataset.sticky === 'yes' && item.dataset.transparent === 'yes' ) {
                item.classList.toggle('sticky-transparent', window.scrollY > 0);
            }
        });
    });
}

export default navMarker();