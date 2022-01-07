(function($) {
  "use strict";

  // mobile menu
  $("#mobile-menu").meanmenu({
    meanMenuContainer: ".mobile-menu",
    meanScreenWidth: "992"
  });

  // off canvas menu
  $(".menu-tigger").on("click", function() {
    $(".offcanvas-menu,.offcanvas-overly").addClass("active");
    return false;
  });
  $(".menu-close,.offcanvas-overly").on("click", function() {
    $(".offcanvas-menu,.offcanvas-overly").removeClass("active");
  });

  // slider
  function mainSlider() {
    var BasicSlider = $(
      ".slider-active,.slider-two-active,.slider-four-active"
    );
    BasicSlider.on("init", function(e, slick) {
      var $firstAnimatingElements = $(".single-slider:first-child").find(
        "[data-animation]"
      );
      doAnimations($firstAnimatingElements);
    });
    BasicSlider.on("beforeChange", function(e, slick, currentSlide, nextSlide) {
      var $animatingElements = $(
        '.single-slider[data-slick-index="' + nextSlide + '"]'
      ).find("[data-animation]");
      doAnimations($animatingElements);
    });
    BasicSlider.slick({
      autoplay: false,
      autoplaySpeed: 5000,
      dots: true,
      fade: true,
      prevArrow:
        '<button type="button" class="slick-prev"><span class="lnr lnr-chevron-left"></span></button>',
      nextArrow:
        '<button type="button" class="slick-next"><span class="lnr lnr-chevron-right"></span></button>',
      arrows: true,
      dots: true,
      responsive: [
        {
          breakpoint: 767,
          settings: {
            dots: false,
            arrows: false
          }
        },
        {
          breakpoint: 992,
          settings: {
            arrows: false
          }
        }
      ]
    });

    function doAnimations(elements) {
      var animationEndEvents =
        "webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend";
      elements.each(function() {
        var $this = $(this);
        var $animationDelay = $this.data("delay");
        var $animationType = "animated " + $this.data("animation");
        $this.css({
          "animation-delay": $animationDelay,
          "-webkit-animation-delay": $animationDelay
        });
        $this.addClass($animationType).one(animationEndEvents, function() {
          $this.removeClass($animationType);
        });
      });
    }
  }
  mainSlider();

  // slider five
  $(".slider-five-active").slick({
    dots: false,
    infinite: true,
    autoplay: false,
    autoplaySpeed: 5000,
    speed: 400,
    dots: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    prevArrow:
      '<button type="button" class="slick-prev"><span class="lnr lnr-chevron-left"></span></button>',
    nextArrow:
      '<button type="button" class="slick-next"><span class="lnr lnr-chevron-right"></span></button>',
    arrows: false,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          infinite: true,
          dots: false
        }
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          infinite: true,
          dots: false
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          infinite: true,
          dots: false
        }
      }
      // You can unslick at a given breakpoint now by adding:
      // settings: "unslick"
      // instead of a settings object
    ]
  });

  // slider five
  $(".slider-three-active").slick({
    dots: false,
    infinite: true,
    autoplay: false,
    autoplaySpeed: 5000,
    centerPadding: "360px",
    centerMode: true,
    speed: 400,
    dots: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    prevArrow:
      '<button type="button" class="slick-prev"><span class="lnr lnr-chevron-left"></span></button>',
    nextArrow:
      '<button type="button" class="slick-next"><span class="lnr lnr-chevron-right"></span></button>',
    arrows: true,
    responsive: [
      {
        breakpoint: 1500,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          infinite: true,
          centerPadding: "150px",
          dots: false
        }
      },
      {
        breakpoint: 1200,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          infinite: true,
          centerPadding: "0px",
          dots: false,
          arrows: false
        }
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          infinite: true,
          centerPadding: "0px",
          dots: false,
          arrows: false
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          centerPadding: "0px",
          infinite: true,
          dots: false,
          arrows: false
        }
      }
      // You can unslick at a given breakpoint now by adding:
      // settings: "unslick"
      // instead of a settings object
    ]
  });
  // slider six
  $(".slider-six-active").slick({
    infinite: true,
    autoplay: true,
    autoplaySpeed: 5000,
    speed: 400,
    dots: true,
    arrows: false,
    slidesToShow: 1,
    slidesToScroll: 1,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          infinite: true,
          dots: false
        }
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          infinite: true,
          dots: false
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          infinite: true,
          dots: false
        }
      }
      // You can unslick at a given breakpoint now by adding:
      // settings: "unslick"
      // instead of a settings object
    ]
  });
  // news active
  $(".news-active").slick({
    dots: false,
    infinite: true,
    autoplay: true,
    autoplaySpeed: 5000,
    speed: 400,
    slidesToShow: 1,
    slidesToScroll: 1,
    prevArrow:
      '<button type="button" class="slick-prev"><span class="lnr lnr-chevron-left"></span></button>',
    nextArrow:
      '<button type="button" class="slick-next"><span class="lnr lnr-chevron-right"></span></button>',
    arrows: true,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          infinite: true,
          dots: false
        }
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
      // You can unslick at a given breakpoint now by adding:
      // settings: "unslick"
      // instead of a settings object
    ]
  });

  // instagram post
  $(".insta-active").owlCarousel({
    loop: true,
    margin: 10,
    nav: false,
    dots: false,
    responsive: {
      0: {
        items: 1
      },
      400: {
        items: 2
      },
      767: {
        items: 3
      },
      1000: {
        items: 4
      }
    }
  });

})(jQuery);
