const featuredSlider = ()=> {
    const featuredSliderContainer = document.querySelectorAll('.featured-slider-module__container');
    const featuredSliderContainerMobile = document.querySelectorAll('.featured-slider-module__container-mobile');

    if( featuredSliderContainer || featuredSliderContainerMobile ) {
        featuredSliderContainer.forEach( slider => {
            let featuredSliderLeft = new Swiper(`.${slider.dataset.featuredsliderid} .featured-slider__left`, {
                grabCursor: true,
                spaceBetween: 40,
                centeredSlides: true,
                loop: true,
                loopedSlides: 3
            });
    
            let featuredSliderRight = new Swiper(`.${slider.dataset.featuredsliderid} .featured-slider__right`, {
                grabCursor: true,
    
                touchRatio: 0.2,
                slideToClickedSlide: false,
                loop: true,
                loopedSlides: 3,
    
                navigation: {
                    nextEl: `.${slider.dataset.featuredsliderid} .featured-slider-module__arrow-next`,
                    prevEl: `.${slider.dataset.featuredsliderid} .featured-slider-module__arrow-prev`,
                },
    
                breakpoints: {
                    980: {
                        slidesPerView: 1.5,
                        spaceBetween: 20,
                    },
    
                    1280: {
                        slidesPerView: 2,
                        spaceBetween: 20,
                    },
    
                    1600: {
                        slidesPerView: 2.5,
                        spaceBetween: 24,
                    },
                },
            });
    
            featuredSliderLeft.controller.control = featuredSliderRight;
            featuredSliderRight.controller.control = featuredSliderLeft;
        } );

        featuredSliderContainerMobile.forEach( slider => {
            let sliderMobile = new Swiper(`.${slider.dataset.featuredsliderid} .slider-mobile`, {
                grabCursor: true,
                centeredSlides: true,
                slidesPerView: 1.5,
                slidesPerGroup: 1,
                spaceBetween: 24,
                loop: true,
            });
        } );
    }
}

export default featuredSlider();