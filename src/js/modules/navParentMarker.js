const navMarker = ()=> {
    const menu_child = document.querySelectorAll( '#menu-header-menu .sub-menu' );
    const menu_child_child = document.querySelectorAll( '#menu-header-menu .sub-menu .sub-menu' );

    const mobile_menu_child = document.querySelectorAll( '#menu-header-menu-1 .sub-menu' );
    const mobile_menu_child_child = document.querySelectorAll( '#menu-header-menu-1 .sub-menu .sub-menu' );

    for( let i=0; i<menu_child.length; i++ ) {
        menu_child[i].parentElement.classList.add( 'add-icon' );
    }

    for( let j=0; j<menu_child_child.length; j++ ) {
        menu_child_child[j].parentElement.classList.add( 'add-icon-02' );
    }

    for( let k=0; k<mobile_menu_child.length; k++ ) {
        mobile_menu_child[k].parentElement.classList.add( 'add-icon-03' );
    }

    for( let l=0; l<mobile_menu_child_child.length; l++ ) {
        mobile_menu_child_child[l].parentElement.classList.add( 'add-icon-03' );
    }
}

export default navMarker();