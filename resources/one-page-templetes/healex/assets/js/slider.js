
(function($){
    "use strict";


/*----------------------------------------*/
/*  Service Slider (Home One)
/*----------------------------------------*/

if ($('.vlServicetActive').length) {
    const vlServicetActive = new Swiper('.vlServicetActive', {
        slidesPerView: 4,
        spaceBetween: 30,
		    loop:true,
        speed: 4000,
        keyboard: {
            enabled: true,
        },
		    autoplay: {
            delay: 1,
            disableOnInteraction: true,
          },
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
        breakpoints: {
          0: {
            slidesPerView: 1,
          },
          768: {
            slidesPerView: 2,
          },
          992: {
            slidesPerView: 3,
          },
          1200: {
            slidesPerView: 4,
          }
      },
    });
}

/*----------------------------------------*/
/*  Team Slider (Home One)
/*----------------------------------------*/

if ($('.vlTeamActive').length) {
    const vlTeamActive = new Swiper('.vlTeamActive', {
        slidesPerView: 4,
        spaceBetween: 30,
		    loop:true,
        keyboard: {
            enabled: true,
        },
        autoplay: {
          delay: 2500,
          disableOnInteraction: false,
        },
        navigation: {
            nextEl: ".vl-review-button-next",
            prevEl: ".vl-review-button-prev",
        },
        breakpoints: {
          0: {
            slidesPerView: 1,
          },
          768: {
            slidesPerView: 2,
          },
          992: {
            slidesPerView: 4,
          },
          1200: {
            slidesPerView: 5,
          }
      },
    });
}

/*----------------------------------------*/
/*   Team Slider (Home One)
/*----------------------------------------*/

if ($('.vlTeamActive5').length) {
    const vlTeamActive5 = new Swiper('.vlTeamActive5', {
        slidesPerView: 4,
        spaceBetween: 30,
		    loop:true,
        keyboard: {
            enabled: true,
        },
        autoplay: {
          delay: 2500,
          disableOnInteraction: false,
        },
        navigation: {
            nextEl: ".vl-review-button-next",
            prevEl: ".vl-review-button-prev",
        },
        breakpoints: {
          0: {
            slidesPerView: 1,
          },
          768: {
            slidesPerView: 2,
          },
          992: {
            slidesPerView: 4,
          },
          1200: {
            slidesPerView: 4,
          }
      },
    });
}


/*----------------------------------------*/
/*  Team Slider (Home One)
/*----------------------------------------*/

if ($('.vlTeamActive7').length) {
    const vlTeamActive7 = new Swiper('.vlTeamActive7', {
        slidesPerView: 4,
        spaceBetween: 30,
		    loop:true,
        keyboard: {
            enabled: true,
        },
        autoplay: {
          delay: 2500,
          disableOnInteraction: false,
        },
        navigation: {
            nextEl: ".vl-review-button-next",
            prevEl: ".vl-review-button-prev",
        },
        breakpoints: {
          0: {
            slidesPerView: 1,
          },
          768: {
            slidesPerView: 2,
          },
          992: {
            slidesPerView: 3,
          },
          1200: {
            slidesPerView: 4,
          }
      },
    });
}


/*----------------------------------------*/
/*  Testimonial Slider (Home One)
/*----------------------------------------*/

if ($('.vlTestiomonialActive').length) {
    const vlTestiomonialActive = new Swiper('.vlTestiomonialActive', {
        slidesPerView: 1,
        spaceBetween: 30,
        loop:true,
        keyboard: {
            enabled: true,
        },
      autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      },
        navigation: {
            nextEl: ".vl-review-button-next",
            prevEl: ".vl-review-button-prev",
        },
    });
}

/*----------------------------------------*/
/*  Testimonial Slider (Home 8)
/*----------------------------------------*/

if ($('.vlTestiomonialActive8').length) {
    const vlTestiomonialActive8 = new Swiper('.vlTestiomonialActive8', {
        slidesPerView: 1,
        spaceBetween: 30,
        loop:true,
        keyboard: {
            enabled: true,
        },
      autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      },
        navigation: {
            nextEl: ".vl-review-button-next",
            prevEl: ".vl-review-button-prev",
        },
    });
}

/*----------------------------------------*/
/*  Service Slider (Home two)
/*----------------------------------------*/

if ($('.vlServicetActive2').length) {
    const vlServicetActive2 = new Swiper('.vlServicetActive2', {
        slidesPerView: 4,
        spaceBetween: 30,
		    loop:true,
        speed: 3000,
        keyboard: {
            enabled: true,
        },
        autoplay: {
          delay: 2500,
          disableOnInteraction: false,
        },
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
        breakpoints: {
          0: {
            slidesPerView: 1,
          },
          768: {
            slidesPerView: 2,
          },
          992: {
            slidesPerView: 3,
          },
          1200: {
            slidesPerView: 4,
          }
      },
    });
}


/*----------------------------------------*/
/*  Service Slider (Home three)
/*----------------------------------------*/
if ($('.vlServiceActive3').length) {
    const vlServiceActive3 = new Swiper('.vlServiceActive3', {
        slidesPerView: 1,
        spaceBetween: 30,
		    // loop:true,
        // keyboard: {
        //     enabled: true,
        // },
        // autoplay: {
        //   delay: 2500,
        //   disableOnInteraction: false,
        // },
        navigation: {
            nextEl: ".vl-review-button-next",
            prevEl: ".vl-review-button-prev",
        },
        breakpoints: {
          0: {
            slidesPerView: 1,
          },
          768: {
            slidesPerView: 2,
          },
          992: {
            slidesPerView: 2,
          },
          1200: {
            slidesPerView: 3,
          }
      },
    });
}


/*----------------------------------------*/
/*  Service Slider (Home five)
/*----------------------------------------*/

if ($('.vlServicetActive5').length) {
    const vlServicetActive5 = new Swiper('.vlServicetActive5', {
        slidesPerView: 4,
        spaceBetween: 30,
		    loop:true,
        speed: 3000,
        keyboard: {
            enabled: true,
        },
        autoplay: {
          delay: 2500,
          disableOnInteraction: false,
        },
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
        breakpoints: {
          0: {
            slidesPerView: 1,
          },
          768: {
            slidesPerView: 2,
          },
          992: {
            slidesPerView: 3,
          },
          1200: {
            slidesPerView: 4,
          }
      },
    });
}

/*----------------------------------------*/
/*  Service Slider (Home 7)
/*----------------------------------------*/

if ($('.vlserviceactive7').length) {
    const vlserviceactive7 = new Swiper('.vlserviceactive7', {
        slidesPerView: 5,
        spaceBetween: 30,
        keyboard: {
            enabled: true,
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        loop:true,
        speed: 3000,
        keyboard: {
            enabled: true,
        },
        autoplay: {
          delay: 2500,
          disableOnInteraction: false,
        },
        breakpoints: {
            0: {
              slidesPerView: 1,
            },
            768: {
              slidesPerView: 2,
            },
            992: {
              slidesPerView: 3,
            },
            1200: {
              slidesPerView: 5,
            }
          },
    });
}


/*----------------------------------------*/
/* Team Slider (Home One)
/*----------------------------------------*/

if ($('.vlServiceActive8').length) {
    const vlServiceActive8 = new Swiper('.vlServiceActive8', {
        slidesPerView: 3,
        spaceBetween: 30,
		    loop:true,
        keyboard: {
            enabled: true,
        },
        autoplay: {
          delay: 2500,
          disableOnInteraction: false,
        },
        navigation: {
            nextEl: ".vl-review-button-next",
            prevEl: ".vl-review-button-prev",
        },
        breakpoints: {
          0: {
            slidesPerView: 1,
          },
          768: {
            slidesPerView: 2,
          },
          992: {
            slidesPerView: 2,
          },
          1200: {
            slidesPerView: 3,
          }
      },
    });
}



/*----------------------------------------*/
/*  testimonial Slider (Home 9)
/*----------------------------------------*/

if ($('.vlTestimonialActive9').length) {
    const vlTestimonialActive9 = new Swiper('.vlTestimonialActive9', {
        slidesPerView: 3,
        spaceBetween: 30,
		    loop:true,
        keyboard: {
            enabled: true,
        },
        autoplay: {
          delay: 2500,
          disableOnInteraction: false,
        },
        navigation: {
            nextEl: ".vl-review-button-next",
            prevEl: ".vl-review-button-prev",
        },
        breakpoints: {
          0: {
            slidesPerView: 1,
          },
          768: {
            slidesPerView: 2,
          },
          992: {
            slidesPerView: 3,
          },
          1200: {
            slidesPerView:3,
          }
      },
    });
}


/*----------------------------------------*/
/*  Team Slider (Home three)
/*----------------------------------------*/

if ($('.vlTeamActive9').length) {
    const vlTeamActive9 = new Swiper('.vlTeamActive9', {
        slidesPerView: 1,
        spaceBetween: 30,
		    loop:true,
        keyboard: {
            enabled: true,
        },
        autoplay: {
          delay: 2500,
          disableOnInteraction: false,
        },
        navigation: {
            nextEl: ".vl-review-button-next",
            prevEl: ".vl-review-button-prev",
        },
        breakpoints: {
          0: {
            slidesPerView: 1,
          },
          768: {
            slidesPerView: 2,
          },
          992: {
            slidesPerView: 3,
          },
          1200: {
            slidesPerView: 4,
          }
      },
    });
}

/*----------------------------------------*/
/*  Team Slider (Home eight)
/*----------------------------------------*/
if ($('.vlTeamActive8').length) {
    const vlTeamActive8 = new Swiper('.vlTeamActive8', {
        slidesPerView: 4,
        spaceBetween: 30,
        keyboard: {
            enabled: true,
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        loop:true,
        speed: 3000,
        keyboard: {
            enabled: true,
        },
        autoplay: {
          delay: 2500,
          disableOnInteraction: false,
        },
        navigation: {
            nextEl: ".tp-swiper-team-button-next",
            prevEl: ".tp-swiper-team-button-prev",
        },
        breakpoints: {
            0: {
              slidesPerView: 1,
            },
            768: {
              slidesPerView: 2,
            },
            992: {
              slidesPerView: 3,
            },
            1200: {
              slidesPerView: 4,
            }
          },
    });
}


/*----------------------------------------*/
/*  case Slider (Home 5)
/*----------------------------------------*/
if ($('.vlCaseactive7').length) {
    const vlCaseactive7 = new Swiper('.vlCaseactive7', {
        slidesPerView: 5,
        spaceBetween: 30,
        keyboard: {
            enabled: true,
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        loop:true,
        speed: 3000,
        keyboard: {
            enabled: true,
        },
        autoplay: {
          delay: 2500,
          disableOnInteraction: false,
        },
        navigation: {
            nextEl: ".tp-swiper-team-button-next",
            prevEl: ".tp-swiper-team-button-prev",
        },
        breakpoints: {
            0: {
              slidesPerView: 1,
            },
            768: {
              slidesPerView: 2,
            },
            992: {
              slidesPerView: 3,
            },
            1200: {
              slidesPerView: 5,
            }
          },
    });
}


 var swiper = new Swiper(".mySwiper99", {
      slidesPerView: 3,
      spaceBetween: 30,
      keyboard: {
          enabled: true,
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      loop:true,
        speed: 3000,
        keyboard: {
            enabled: true,
        },
        autoplay: {
          delay: 2500,
          disableOnInteraction: false,
        },
      breakpoints: {
            0: {
              slidesPerView: 1,
            },
            768: {
              slidesPerView: 1,
            },
            992: {
              slidesPerView: 2,
            },
            1200: {
              slidesPerView: 3,
            }
          },
    });

/*----------------------------------------*/
/*  Brand Slider (Home One)
/*----------------------------------------*/

if ($('.vlBrandActive').length) {
    const vlBrandActive = new Swiper('.vlBrandActive', {
        slidesPerView: 4,
        spaceBetween: 30,
		    loop:true,
        speed: 4000,
        keyboard: {
            enabled: true,
        },
		    autoplay: {
            delay: 1,
            disableOnInteraction: true,
          },
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
        breakpoints: {
          0: {
            slidesPerView: 1,
          },
          768: {
            slidesPerView: 2,
          },
          992: {
            slidesPerView: 3,
          },
          1200: {
            slidesPerView: 4,
          }
      },
    });
}


 var swiper = new Swiper(".mySwiper", {
     direction: "vertical",
      loop: true,
      spaceBetween: 10,
      slidesPerView: 4,
      freeMode: true,
      watchSlidesProgress: true,
    });
    var swiper2 = new Swiper(".mySwiper2", {
      loop: true,
      spaceBetween: 10,
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      thumbs: {
        swiper: swiper,
      },
    });



    // testimonial 3 
    var slider = new Swiper ('.tp-testimonial-content-active', {
      slidesPerView: 1,
      centeredSlides: true,
      loop: true,
      loopedSlides: 3,
      navigation: {
            nextEl: ".vl-review-button-next",
            prevEl: ".vl-review-button-prev",
        },
    });
    var thumbs = new Swiper ('.tp-testimonial-thumb-active', {
      slidesPerView: 3,
      spaceBetween: 10,
      centeredSlides: false,
      centeredSlides: true,
      loop: true,
      slideToClickedSlide: true,
    });
    
    slider.controller.control = thumbs;
    thumbs.controller.control = slider;


    // testimomial 7

    var swiper = new Swiper(".mySwiper7", {
      slidesPerView: 2,
      spaceBetween: 30,
      keyboard: {
          enabled: true,
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      loop:true,
        speed: 3000,
        keyboard: {
            enabled: true,
        },
        autoplay: {
          delay: 2500,
          disableOnInteraction: false,
        },
      breakpoints: {
            0: {
              slidesPerView: 1,
            },
            768: {
              slidesPerView: 1,
            },
            992: {
              slidesPerView: 2,
            },
            1200: {
              slidesPerView: 2,
            }
          },
    });

})(jQuery);




