// JS Libraries
import AOS from 'aos';
import { Fancybox } from '@fancyapps/ui';
import Masonry from 'masonry-layout';

AOS.init({
    offset: 200,
    duration: 1000,
    once: true,
    disable: 'mobile',
});

window.onload = ()=> {
    const galleryGrid = document.querySelector('.grid');

    if( galleryGrid ) {
        const masonry = new Masonry( galleryGrid, {
            itemSelector: '.grid-item',
            // horizontalOrder: true,
            percentPosition: true,
        }); 
    }
    
};


// Theme modules
import navMarker from './modules/navParentMarker';
import mobileMenu from './modules/mobileMenu';
import tabModule from './modules/tabModule';
