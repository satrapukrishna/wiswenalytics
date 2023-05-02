$(document).ready(function () {
    $('.MainPageSlider').bxSlider({
        auto: false,
        tickerHover: true,
        pager: true
    });


    $('.AttdnDashSlider').bxSlider({
        slideWidth: 150,
        adaptiveHeight: true,
        minSlides: 1,
        maxSlides: 20,
        moveSlides: 1,
        infiniteLoop: false,
        hideControlOnEnd: true,
        touchEnabled: false,
        pager: true
    });

    $('.SantWshrmDashSlider').bxSlider({
        slideWidth: 250,
        minSlides: 6,
        maxSlides: 20,
        moveSlides: 1,
        pager: true
    });

    $('.SnglWshrmDashSlider').bxSlider({
        slideWidth: 400,
        minSlides: 1,
        maxSlides: 20,
        moveSlides: 1,
        infiniteLoop: false,
        hideControlOnEnd: true,
        touchEnabled: false,
        pager: true
    });

    $('.LdrshpTmDashSlider').bxSlider({
        slideWidth: 150,
        adaptiveHeight: true,
        minSlides: 1,
        maxSlides: 20,
        moveSlides: 1,
        infiniteLoop: false,
        hideControlOnEnd: true,
        touchEnabled: false,
        pager: true
    });

    $('.CtyDashSlider').bxSlider({
        slideWidth: 150,
        adaptiveHeight: true,
        minSlides: 1,
        maxSlides: 20,
        moveSlides: 1,
        infiniteLoop: false,
        hideControlOnEnd: true,
        touchEnabled: false,
        pager: true
    });

    $('.FlpIssueSlider').bxSlider({
        slideWidth: 150,
        adaptiveHeight: true,
        minSlides: 1,
        maxSlides: 20,
        moveSlides: 1,
        touchEnabled: false,
        pager: false
    });

    $('.RsrsWtrDashSlider').bxSlider({
        minSlides: 1,
        maxSlides: 20,
        moveSlides: 1,
        slideWidth: 400,
        pager: true
    });

});