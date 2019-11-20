$(document).ready(function () {
    const $slider = $('.slider');
    const winWidth = $(window).width();
    const animSpd = 750;
    const distOfLetGo = winWidth * 0.2;
    let curSlide = 1;
    let animation = false;
    let diff = 0;
    let ifwheel=false;
    let dir='right';
    let passScrollTop=0;
    // Generating slides
    let arrCities = [
      { ch: "九份", en: "JiuFen" },
      { ch: "深澳峽角", en: "ShenAo" },
      { ch: "不厭亭", en: "Buyan" },
    ];
    let numOfCities = arrCities.length;

    let generateSlide = function (cityindex) {
        let frag1 = $(document.createDocumentFragment());
        const numSlide = arrCities.indexOf(arrCities[cityindex])+1 ;//slide從一開始

        const $slide =
            $(`<div data-target="${numSlide}" class="slide slide${numSlide}">
							<div class="slideDarkBg  slideDarkBg--${numSlide}"></div>
							<div class="slideTextWrap slide${numSlide}__text-wrapper"></div>
						</div>`);
        const text =
            $(`<div class="slideText">
                ${arrCities[cityindex].ch}
                </div>
                <div class="slideText">
                ${arrCities[cityindex].en}
                </div>
                <div class="tripper_01">
                </div>`);

        frag1.append(text);


        $slide.find(`.slide${numSlide}__text-wrapper`).append(frag1);
        $slider.append($slide);

    };

    for (let i = 0; i < numOfCities; i++) {
        generateSlide(i);
    }

    function timeout(e) {
        animation = false;
        if (curSlide == 3 && dir=='right') {
            ifwheel=true;
        }
    }
    
    function pagination(direction) {
        animation = true;
        diff = 0;
        $slider.addClass('animation');
        $slider.css({
            'transform': 'translate3d(-' + ((curSlide - direction) * 100) + '%, 0, 0)'
        });

        $slider.find('.slideDarkBg').css({
            'transform': 'translate3d(' + ((curSlide - direction) * 50) + '%, 0, 0)'
        });


        $slider.find('.slideText').css({
            'transform': 'translate3d(0, 0, 0)'
        });
    }

    function navigateRight(e) {
        if (curSlide >= numOfCities) return;
        pagination(0);
        curSlide++;
        setTimeout(timeout, animSpd);
    }

    function navigateLeft() {
        if (curSlide <= 1) return;
        pagination(2);
        curSlide--;
        setTimeout(timeout, animSpd);
    }

    function toDefault() {
        pagination(1);
        passSecond = animSpd;
        setTimeout(timeout, animSpd);
    }

    // Events
    $(document).on('mousedown touchstart', '.slide', function (e) {
        if (animation) return;
        let target = +$(this).attr('data-target');
        let startX = e.pageX || e.originalEvent.touches[0].pageX;
        $slider.removeClass('animation');

        $(document).on('mousemove touchmove', function (e) {
            let x = e.pageX || e.originalEvent.touches[0].pageX;
            diff = startX - x;
            if (target === 1 && diff < 0 || target === numOfCities && diff > 0) return;

            $slider.css({
                'transform': 'translate3d(-' + ((curSlide - 1) * 100 + (diff / 30)) + '%, 0, 0)'
            });

            $slider.find('.slideDarkBg').css({
                'transform': 'translate3d(' + ((curSlide - 1) * 50 + (diff / 60)) + '%, 0, 0)'
            });

            $slider.find('.slideText').css({
                'transform': 'translate3d(' + (diff / 15) + 'px, 0, 0)'
            });
        })
    })

    $(document).on('mouseup touchend', function (e) {//滑鼠放開
        $(document).off('mousemove touchmove');

        if (animation) return;

        if (diff >= distOfLetGo) {
            navigateRight();
        } else if (diff <= -distOfLetGo) {
            navigateLeft();
        } else {
            toDefault();
        }
    });


    $(document).on('click', '.sidenav', function () {
        let target = $(this).attr('data-target');

        if (target === 'right') navigateRight();
        if (target === 'left') navigateLeft();
    });

    $(document).on('keydown', function (e) {
        if (e.which === 39) navigateRight();
        if (e.which === 37) navigateLeft();
    });

    $('.indexBanner').on('mousewheel DOMMouseScroll', function (e) {
        let delta = e.originalEvent.wheelDelta;

        if ($(window).scrollTop() == 0) {
            if (!ifwheel && passScrollTop == 0){
                    e.preventDefault();/*不會滑動 */
                }else{
                    ifwheel=false;
                    passScrollTop = 0;
                }
                     if (animation) return;
                     if (delta > 0 || e.originalEvent.detail < 0) {
                        dir='left';
                       navigateLeft();
                     }
                     if (delta < 0 || e.originalEvent.detail > 0) {
                         dir='right';
                         navigateRight();
                     }
            
            }else{
                passScrollTop = $(window).scrollTop();
            }
    });
});