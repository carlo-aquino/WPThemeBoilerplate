const themeSlider = ()=> {
    const sliderWrapper = document.querySelectorAll('.slider-module__wrapper');

    if( sliderWrapper ) {
        sliderWrapper.forEach( slider => {
            const slider_id = slider.dataset.sliderid;
            const slider_centered = slider.dataset.slidercentered === 'true' ? true : false;
            const slider_initial = parseInt(slider.dataset.sliderinitial);
            const slider_loop = slider.dataset.sliderloop === 'true' ? true : false;
            const slider_group = parseInt(slider.dataset.sliderpergroup);
            const slider_view = slider.dataset.sliderperview === 0 ? 'auto' : parseFloat(slider.dataset.sliderperview);
            const slider_space = parseInt(slider.dataset.sliderspace);
            const slider_autoplay = slider.dataset.sliderautoplay === 'true' ? true : false;
            const slider_delay = parseInt(slider.dataset.sliderdelay);
            
            if( slider.dataset.slidertype === 'slider-type-one' ) {
                let swiper01 = new Swiper(`.${slider_id}.slider-type-one`, {
                    centeredSlides: slider_centered,
                    grabCursor: true,
                    initialSlide: slider_initial ? slider_initial : 0,
                    loop: slider_loop,
                    slidesPerGroup: slider_group ? slider_group : 1,
                    spaceBetween: slider_space,

                    autoplay: {
                        enabled: slider_autoplay,
                        delay: slider_delay,
                        disableOnInteraction: false,
                    },

                    breakpoints: {
                        320: {
                            slidesPerView: slider_view > 1 ? 1.5 : slider_view,
                            spaceBetween: slider_space > 16 ? 8 : slider_space,
                        },

                        640: {
                            slidesPerView: slider_view > 2 ? (slider_view - 1) : slider_view,
                        },

                        768: {
                            slidesPerView: slider_view > 2 ? (slider_view - 0.5) : slider_view,
                            spaceBetween: slider_space > 16 ? (slider_space - 8) : slider_space,
                        },

                        1024: {
                            slidesPerView: slider_view ? slider_view : 'auto',
                            spaceBetween: slider_space,
                        },
                    },
        
                    pagination: {
                        el: `.${slider_id} .swiper-pagination`,
                        clickable: true,
                    },
        
                    scrollbar: {
                        el: `.${slider_id} .swiper-scrollbar`,
                        hide: false,
                        draggable: true,
                    },
        
                    navigation: {
                        nextEl: `.${slider_id} .slider-module__arrow-next`,
                        prevEl: `.${slider_id} .slider-module__arrow-prev`,
                    },
                });
            }

            if( slider.dataset.slidertype === 'slider-type-two' ) {
                const coverflow_rotate = parseInt(slider.dataset.coverflowrotate);
                const coverflow_stretch = parseInt(slider.dataset.coverflowstretch);
                const coverflow_depth = parseInt(slider.dataset.coverflowdepth);
                const coverflow_modifier = parseInt(slider.dataset.coverflowmodifier);
                const coverflow_shadow = slider.dataset.coverflowshadow === 'true' ? true : false;;

                let swiper02 = new Swiper(`.${slider_id}.slider-type-two`, {
                    centeredSlides: slider_centered,
                    effect: 'coverflow',
                    grabCursor: true,
                    initialSlide: slider_initial ? slider_initial : 0,
                    loop: slider_loop,
                    loopedSlides: 5,
                    slidesPerGroup: slider_group ? slider_group : 1,
        
                    coverflowEffect: {
                        rotate: coverflow_rotate,
                        stretch: coverflow_stretch,
                        depth: coverflow_depth ? coverflow_depth : 150,
                        modifier: coverflow_modifier ? coverflow_modifier : 1,
                        slideShadows: coverflow_shadow,
                    },

                    autoplay: {
                        enabled: slider_autoplay,
                        delay: slider_delay,
                        disableOnInteraction: false,
                    },

                    breakpoints: {
                        320: {
                            slidesPerView: slider_view > 1 ? 1.5 : slider_view,
                        },

                        640: {
                            slidesPerView: slider_view > 2 ? (slider_view - 1) : slider_view,
                        },

                        768: {
                            slidesPerView: slider_view > 2.5 ? (slider_view - 0.5) : slider_view,
                        },

                        1024: {
                            slidesPerView: slider_view ? slider_view : 'auto',
                        },
                    },
        
                    pagination: {
                        el: `.${slider_id} .swiper-pagination`,
                        clickable: true,
                    },
        
                    scrollbar: {
                        el: `.${slider_id} .swiper-scrollbar`,
                        hide: false,
                        draggable: true,
                    },
        
                    navigation: {
                        nextEl: `.${slider_id} .slider-module__arrow-next`,
                        prevEl: `.${slider_id} .slider-module__arrow-prev`,
                    },
                });
            }

            if( slider.dataset.slidertype === 'slider-type-three' ) {
                let galleryThumbs = new Swiper(`.${slider_id}.slider-type-three__gallery-thumbs`, {
                    centeredSlides: slider_centered,
                    grabCursor: true,
                    loop: slider_loop,
                    loopedSlides: 3,
                    spaceBetween: slider_space ? slider_space : 16,
                    watchSlidesProgress: true,

                    autoplay: {
                        enabled: slider_autoplay,
                        delay: slider_delay,
                        disableOnInteraction: false,
                    },

                    breakpoints: {
                        320: {
                            slidesPerView: slider_view > 2 ? 2 : slider_view,
                        },

                        640: {
                            slidesPerView: slider_view > 2 ? (slider_view - 1) : slider_view,
                        },

                        768: {
                            slidesPerView: slider_view ? slider_view : 'auto',
                        },
                    },
                });
            
                let galleryTop = new Swiper(`.${slider_id}.slider-type-three__gallery-top`, {
                    grabCursor: true,
                    spaceBetween: slider_space ? slider_space : 16,
                    loop: slider_loop,
                    loopedSlides: 3,

                    autoplay: {
                        enabled: slider_autoplay,
                        delay: slider_delay,
                        disableOnInteraction: false,
                    },

                    navigation: {
                        nextEl: `.${slider_id} .slider-module__arrow-next`,
                        prevEl: `.${slider_id} .slider-module__arrow-prev`,
                    },
            
                    thumbs: {
                        swiper: galleryThumbs,
                    },
                });
            }
        } );
    }
}

export default themeSlider();