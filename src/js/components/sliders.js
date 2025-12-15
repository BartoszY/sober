import { tns } from "tiny-slider";
import Splide from '@splidejs/splide';

/**
 * miniCarouselGallery
 */
const miniCarouselGallery = () => {
  const sliderWrappers = document.querySelectorAll('.f-mini-carousel-gallery__slider');
  if (!sliderWrappers.length) return;

  sliderWrappers.forEach(sliderWrapper => {
    var slider = tns({
      gutter: 20,
      autoWidth: true,
      container: sliderWrapper,
      nav: false,
      controlsText: ['',''],
      mouseDrag: true,
      center: true,
      autoplay: true,
      autoplayButtonOutput: false,
      autoplayTimeout: 1800,
      speed: 600
    });
  });
}


/**
 * verticalGallerySlider
 */
const verticalGallerySlider = () => {
  const sliderWrapper = document.querySelector('.vertical-gallery-slider');
  if (!sliderWrapper) return;

  const titleWrapper = document.querySelector('.f-vertical-gallery__slide-title');

  var slider = new Splide( sliderWrapper, {
    type: 'slide',
    rewind: true,
    pagination: false,
    arrows: true,
    gap: '6px'
  } );

  slider.mount();

  if (!titleWrapper) return;

  slider.on('moved', function(newIndex) {
    const currentSlide = slider.Components.Slides.getAt(newIndex);
    const slideTitle = currentSlide.slide.getAttribute('data-slide-title');
    if (titleWrapper && slideTitle) {
      titleWrapper.textContent = slideTitle;
    }
  });
}

export { miniCarouselGallery, verticalGallerySlider };