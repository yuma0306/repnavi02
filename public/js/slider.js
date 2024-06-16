document.addEventListener('DOMContentLoaded', function() {
    const main = new Splide('.js-main-splide', {
        pagination: false,
        type: 'loop',
        drag: true,
        pagination: false,
        arrows: false,
    });
    const thumbnails = new Splide('.js-pager-splide', {
        rewind      : true,
        pagination  : false,
        cover       : true,
        isNavigation: true,
        arrows    : false,
    });
    main.sync( thumbnails );
    main.mount();
    thumbnails.mount();
});
