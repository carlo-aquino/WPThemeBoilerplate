// JS Libraries
import AOS from 'aos';
import { Fancybox } from '@fancyapps/ui';
import Colcade from 'colcade';

AOS.init({
    offset: 200,
    duration: 1000,
    once: true,
    disable: 'mobile',
});

let masonryGrid = document.querySelector('.gallery-module .grid');

if( masonryGrid ) {
    const colc = new Colcade( '.grid', {
        columns: '.grid-col',
        items: '.grid-item'
    });
}

// Theme modules
import navMarker from './modules/navParentMarker';
import mobileMenu from './modules/mobileMenu';
import tabModule from './modules/tabModule';
