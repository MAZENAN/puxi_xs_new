var docHeight;
var docWidth;
var swiper;
$(function () {
    docHeight = $(document).height() + 30;
    docWidth = $(document).width();
    swiper = new Swiper('.swiper-container-v', {
        pagination: '.swiper-pagination-v',
        direction: 'vertical',
        paginationClickable: true,
        spaceBetween: 0,
        mousewheelControl: true,
        slidesPerView: "auto",
        onInit: function(swiper){ //Swiper2.x的初始化是onFirstInit
           swiperAnimateCache(swiper); //隐藏动画元素
           swiperAnimate(swiper); //初始化完成开始动画
          },
           onSlideChangeEnd: function(swiper){
           swiperAnimate(swiper); //每个slide切换结束时也运行当前slide动画
          }
    });

    var swiper = new Swiper('.swiper-container-h', {
        pagination: '.swiper-pagination-h',
        slidesPerView: 'auto',
        centeredSlides: true,
        pnginationClickable: true,
        spaceBetween: 5,
        autoplay: 2000,
        //loop: true,
        //loopedSlides: 8,
        freeMode: true,
    });
    
})
//$(window).resize(function () {
//    docHeight = $(document).height() + 30;
//    docWidth = $(document).width();
//    swiper.onResize();
//    $(".myImg").height(docHeight);
//})

