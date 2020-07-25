 /*
   * Booking progress line JS
   */
  $('.mg-booking-form > ul > li:nth-child(1)').click(function () {
    if ($('.mg-booking-form > ul > li:nth-child(1)').hasClass('mg-step-done')) {
      $('.mg-booking-form > ul > li:nth-child(1)').removeClass('mg-step-done');
    }
    if ($('.mg-booking-form > ul > li:nth-child(2)').hasClass('mg-step-done')) {
      $('.mg-booking-form > ul > li:nth-child(2)').removeClass('mg-step-done');
    }
    if ($('.mg-booking-form > ul > li:nth-child(3)').hasClass('mg-step-done')) {
      $('.mg-booking-form > ul > li:nth-child(3)').removeClass('mg-step-done');
    }

    if ($('.mg-booking-form > ul > li:nth-child(4)').hasClass('mg-step-done')) {
      $('.mg-booking-form > ul > li:nth-child(4)').removeClass('mg-step-done');
    }
  });

  $('.mg-booking-form > ul > li:nth-child(2)').click(function () {
    $('.mg-booking-form > ul > li:nth-child(1)').addClass('mg-step-done');

    if ($('.mg-booking-form > ul > li:nth-child(2)').hasClass('mg-step-done')) {
      $('.mg-booking-form > ul > li:nth-child(2)').removeClass('mg-step-done');
    }
    if ($('.mg-booking-form > ul > li:nth-child(3)').hasClass('mg-step-done')) {
      $('.mg-booking-form > ul > li:nth-child(3)').removeClass('mg-step-done');
    }

    if ($('.mg-booking-form > ul > li:nth-child(4)').hasClass('mg-step-done')) {
      $('.mg-booking-form > ul > li:nth-child(4)').removeClass('mg-step-done');
    }
  });

  $('.mg-booking-form > ul > li:nth-child(3)').click(function () {
    $('.mg-booking-form > ul > li:nth-child(1)').addClass('mg-step-done');
    $('.mg-booking-form > ul > li:nth-child(2)').addClass('mg-step-done');
    
    if ($('.mg-booking-form > ul > li:nth-child(3)').hasClass('mg-step-done')) {
      $('.mg-booking-form > ul > li:nth-child(3)').removeClass('mg-step-done');
    }

    if ($('.mg-booking-form > ul > li:nth-child(4)').hasClass('mg-step-done')) {
      $('.mg-booking-form > ul > li:nth-child(4)').removeClass('mg-step-done');
    }
  });

  $('.mg-booking-form > ul > li:nth-child(4)').click(function () {
    $('.mg-booking-form > ul > li:nth-child(1)').addClass('mg-step-done');
    $('.mg-booking-form > ul > li:nth-child(2)').addClass('mg-step-done');
    $('.mg-booking-form > ul > li:nth-child(3)').addClass('mg-step-done');
    
    if ($('.mg-booking-form > ul > li:nth-child(4)').hasClass('mg-step-done')) {
      $('.mg-booking-form > ul > li:nth-child(4)').removeClass('mg-step-done');
    }
  });
  
  // $('.btn-next-tab').click(function (e) {

  //   e.preventDefault();

  //   // console.log($($(this).attr('href')));
  //   $(this).tab('show');

  //   $('html, body').animate({
  //     scrollTop: $(".mg-booking-form").offset().top - 100
  //   }, 300);

  //   $('a[href="'+$(this).attr('href')+'"]').parents('li').trigger('click');
  //   $('.mg-booking-form > ul > li.active').removeClass('active');
  //   $('a[href="'+$(this).attr('href')+'"]').parents('li').addClass('active');
  // });

  $('.btn-prev-tab').click(function (e) {

    e.preventDefault();

    // console.log($($(this).attr('href')));
    $(this).tab('show');

    $('html, body').animate({
      scrollTop: $(".mg-booking-form").offset().top - 100
    }, 300);

    $('a[href="'+$(this).attr('href')+'"]').parents('li').trigger('click');
    $('.mg-booking-form > ul > li.active').removeClass('active');
    $('a[href="'+$(this).attr('href')+'"]').parents('li').addClass('active');
  });

  /*
   * Search box toggle at Header
   */
  $('.mg-search-box-trigger').click(function () {
    var sbox = $(this).next();

    // $(this).toggleClass('mg-sb-active');
    $(this).find('i').toggleClass('fa-times');
    sbox.toggleClass('mg-sb-active');

    return false;
  });

 