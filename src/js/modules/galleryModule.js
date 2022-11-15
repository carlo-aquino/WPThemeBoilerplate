import Masonry from 'masonry-layout';

const gallery = ()=> {
    const galleryGrid = document.querySelector('.grid');
    
    if( galleryGrid ) {
        const masonry = new Masonry( galleryGrid, {
            itemSelector: '.grid-item',
            // horizontalOrder: true,
            percentPosition: true,
        }); 
    }
}

export default gallery();