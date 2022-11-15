// JS Libraries
import AOS from 'aos';
import { Fancybox } from '@fancyapps/ui';

// Theme modules
import featuredSlider from './modules/featuredSliderModule';
import gallery from './modules/galleryModule';
import mobileMenu from './modules/mobileMenu';
import navMarker from './modules/navParentMarker';
import themeSlider from './modules/sliderModule';
import tabModule from './modules/tabModule';

AOS.init({
    offset: 200,
    duration: 1000,
    once: true,
    disable: 'mobile',
});
