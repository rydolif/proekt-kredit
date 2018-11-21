$(function() {


//-----------------------------Привязка------------------------------
  // var navLi = $('.nav li');

  // $('.sticky').waypoint( function() {
  //   var hash = $(this).attr('id');

  //   navLi.removeClass('active');

  //   $.each( navLi, function() {
  //     if( $(this).children('a').attr('href').slice(1) == hash ){
  //       $(this).addClass('active');
  //     }
  //   });

  // });

//------------------------------slider-----------------------------
  var swiper = new Swiper('.swiper-container', {
    slidesPerView: 4,
    spaceBetween: 50,
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    breakpoints: {
      1200: {
        slidesPerView: 3,
        spaceBetween: 30
      },
      767: {
        slidesPerView: 2,
        spaceBetween: 30
      },
      576: {
        slidesPerView: 1,
        spaceBetween: 30
      }
    }
  });

//------------------------------гамбургер-----------------------------
  $('.hamburger').click(function() {
    $(this).toggleClass('hamburger--active');
    $('nav').toggleClass('nav--active');
    $('header').toggleClass('header--menu');
  });

//-------------------------------попандер---------------------------------------
  $('.modal').popup({transition: 'all 0.3s'});

//------------------------------------form-------------------------------------------
  $('input[type="tel"]').mask('+0 (000) 000-00-00');

  jQuery.validator.addMethod("phoneno", function(phone_number, element) {
     return this.optional(element) || phone_number.match(/\+[0-9]{1}\s\([0-9]{3}\)\s[0-9]{3}-[0-9]{2}-[0-9]{2}/);
  }, "Введите Ваш телефон");

  $(".form").each(function(index, el) {
    $(el).addClass('form-' + index);

    $('.form-' + index).validate({
      rules: {
        phone: {
          required: true,
          phoneno: true
        },
        name: 'required',
      },
      messages: {
        name: "Введите Ваше имя",
        phone: "Введите Ваш телефон",
        email: "Введите Email",
      },
      submitHandler: function(form) {
        var t = {
          name: jQuery('.form-' + index).find("input[name=name]").val(),
          phone: jQuery('.form-' + index).find("input[name=phone]").val(),
          email: jQuery('.form-' + index).find("input[name=email]").val(),
          date: jQuery('.form-' + index).find("input[name=date]").val(),
          inn: jQuery('.form-' + index).find("input[name=inn]").val(),
          citizenship: jQuery('.form-' + index).find("input[name=citizenship]").val(),
          addres: jQuery('.form-' + index).find("input[name=addres]").val(),
          addresfact: jQuery('.form-' + index).find("input[name=addresfact]").val(),
          passport: jQuery('.form-' + index).find("input[name=passport]").val(),
          education: jQuery('.form-' + index).find("input[name=education]").val(),
          specialty: jQuery('.form-' + index).find("input[name=specialty]").val(),
          desired: jQuery('.form-' + index).find("input[name=desired]").val(),
          salary: jQuery('.form-' + index).find("input[name=salary]").val(),
          employment: jQuery('.form-' + index).find("input[name=employment]").val(),
          children: jQuery('.form-' + index).find("input[name=children]").val(),
          changedthename: jQuery('.form-' + index).find("input[name=changedthename]").val(),
          comment: jQuery('.form-' + index).find("textarea[name=comment]").val(),
          subject: jQuery('.form-' + index).find("input[name=subject]").val()
        };
        ajaxSend('.form-' + index, t);
      }
    });

  });

  function ajaxSend(formName, data) {
    jQuery.ajax({
      type: "POST",
      url: "sendmail.php",
      data: data,
      success: function() {
        $(".modal").popup("hide");
        $("#thanks").popup("show");
        setTimeout(function() {
          $(formName).trigger('reset');
        }, 2000);
      }
    });
  }

//----------------------------------------fixed----------------------------------
  $(window).scroll(function(){
      if($(this).scrollTop()>20){
          $('.header__nav').addClass('header__nav--active');
      }
      else if ($(this).scrollTop()<20){
          $('.header__nav').removeClass('header__nav--active');
      }
  });

//-------------------------скорость якоря---------------------------------------
  $(".nav").on("click","a", function (event) {
      event.preventDefault();
      var id  = $(this).attr('href'),
          top = $(id).offset().top;
      $('body,html').animate({scrollTop: top - 50}, 'slow', 'swing');
    //--------------------закриття меню при кліку на ссилку якоря--------------------
     $('.hamburger').removeClass('hamburger--active');
     $('.nav').removeClass('nav--active');
  });

});

//----------------------------------------preloader----------------------------------

  // $(window).on('load', function(){
  //   $('.preloader').delay(1000).fadeOut('slow');
  // });


// $(window).on("load",function(){
//    $("a[href*='#']").mPageScroll2id();
// });

$(".nav a").mPageScroll2id({
        // offset: ".nav",
        scrollSpeed: 900,
        scrollEasing: "easeInOutExpo",
        scrollingEasing: "easeInOutCirc", // Устанавливает easing, который будет проигрываться если вызвать её уже во время изинга(кликнуть по ссылке во время прокрутки)
        // clickedClass: "active-item", // Устанавливает класс для ссылки, при клике на неё
        targetClass: "color-block", // Устанавливает класс для блока, при его появлении во время скролла
        highlightClass: "active-item",  // Устанавливает класс для ссылки, при скролле до привязанного к нему блоку
        keepHighlightUntilNext: true  // Один эллемент всегда будет выделен
      });
