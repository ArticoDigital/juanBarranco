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

    new Swiper ('.SliderIndex', params);
});