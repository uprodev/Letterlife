jQuery(document).ready(function ($) {
	
	//$(".top-line").sticky({
   // topSpacing:0
  //});

  //slider
  var swiperRead = new Swiper(".read-slider", {
    slidesPerView: 1.15,
    spaceBetween: 25,
    breakpoints: {
      500: {
        slidesPerView: 2,
        spaceBetween: 25,
      },
      992: {
        slidesPerView: 3,
        spaceBetween: 55,
      },

    },
    navigation: {
      nextEl: ".read-next",
      prevEl: ".read-prev",
    },
    pagination: {
      el: ".read-pagination",
      clickable: true,
    },
  });

  //slider
  var swiperTestimonials = new Swiper(".testimonials-slider", {
    slidesPerView: 1,
    spaceBetween: 25,
    breakpoints: {
      500: {
        slidesPerView: 2,
        spaceBetween: 25,
      },
      992: {
        slidesPerView: 3,
        spaceBetween: 32,
      },

    },
    navigation: {
      nextEl: ".testimonials-next",
      prevEl: ".testimonials-prev",
    },
    pagination: {
      el: ".testimonials-pagination",
      clickable: true,
    },
  });


  //open mob menu
  $(document).on('click', '.open-menu a', function (e){
    e.preventDefault();

    $(this).toggleClass('is-active');

    if($(this).hasClass('is-active')){
      $.fancybox.open( $('#menu-responsive'), {
        touch:false,
        autoFocus:false,
      });
      setTimeout(function() {

        $('html').addClass('is-menu');
        $('header').addClass('is-active');
      }, 100);
    }else{
      $.fancybox.close();
      $('html').removeClass('is-menu');
      $('header').removeClass('is-active');
    }

  });

  //faq
  $(function() {
    $(".accordion > .accordion-item.is-active").children(".accordion-panel").slideDown();
    $(document).on('click', '.accordion > .accordion-item .accordion-thumb', function (e){
      $(this).parent('.accordion-item').siblings(".accordion-item").removeClass("is-active").children(".accordion-panel").slideUp();
      $(this).parent('.accordion-item').toggleClass("is-active").children(".accordion-panel").slideToggle("ease-out");
    })
  });


  //old content
  $(document).on('click', '.container-toggle', function (e) {
    e.preventDefault();
    $(this).toggleClass('is-active');
  });

  //copy in buffer
  $(document).on('click', '.soc-post li:first-child a', function (e){
    e.preventDefault();
    let copyText = $(this).attr('href');
    document.addEventListener('copy', function(e) {
      e.clipboardData.setData('text/plain', copyText);
      e.preventDefault();
    }, true);

    document.execCommand('copy');
    //console.log('copied text : ', copyText);

    $(this).closest('body').prepend(`<p class='info-show'>${php_vars_script.copied_text}</p>`);
    setTimeout(function() {
      $('.info-show').hide()
    }, 1000);

  });

  //cutt text
  $('.breadcrumb li:last-child').Cuttr( {
    //options here
    truncate: 'characters',
    length: 30
  });

//new 16.01.24


  if(window.innerWidth > 767){
    $(".aside-right .mail-wrap-block").sticky({
      topSpacing:50
    });
  }


});