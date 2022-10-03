const navMarker = ()=> {
    const menu_child = document.querySelectorAll( '#menu-header-menu .sub-menu' );
    const menu_child_child = document.querySelectorAll( '#menu-header-menu .sub-menu .sub-menu' );

    const mobile_menu_child = document.querySelectorAll( '#menu-header-menu-1 .sub-menu' );
    const mobile_menu_child_child = document.querySelectorAll( '#menu-header-menu-1 .sub-menu .sub-menu' );

    menu_child.forEach( menu => {
        menu.parentElement.classList.add( 'add-icon' );
    } );

    menu_child_child.forEach( menu => {
        menu.parentElement.classList.add( 'add-icon-02' );
    } );

    mobile_menu_child.forEach( menu => {
        menu.parentElement.classList.add( 'add-icon-03' );
    } );

    mobile_menu_child_child.forEach( menu => {
        menu.parentElement.classList.add( 'add-icon-03' );
    } );
}

export default navMarker();