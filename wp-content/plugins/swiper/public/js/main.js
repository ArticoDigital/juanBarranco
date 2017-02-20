$(document).ready(function () {
    var params = {
     loop: true,
     direction: 'horizontal',
     pagination: '.Circles-container',
     nextButton: '.Arrow--next',
     prevButton: '.Arrow--prev',
     paginationClickable: true,
     autoplay : '7000'
    };

    var small = {
        loop: true,
        direction: 'horizontal',
        autoplay : '7000',
        pagination: '.Circles-container',
        nextButton: '.Arrow--next',
        prevButton: '.Arrow--prev',
        paginationClickable: true,
        slidesPerView: 5,
        spaceBetween: 50,
        breakpoints: {
            1024: {
                slidesPerView: 4,
                spaceBetween: 40
            },
            768: {
                slidesPerView: 3,
                spaceBetween: 30
            },
            640: {
                slidesPerView: 2,
                spaceBetween: 20
            },
            320: {
                slidesPerView: 1,
                spaceBetween: 10
            }
        }
    };

    new Swiper ('.SliderIndex', params);
    new Swiper ('.SliderSmall', small);

});