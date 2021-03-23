// モーダル部分
$(function () { //①
  $('.post-edit').each(function () {
    $(this).on('click', function () {
      var target = $(this).data('target');
      var modal = document.getElementById(target);
      console.log(modal);
      $(modal).fadeIn();
      return false;
    });
  });
  $('.inner-post-edit-image').on('click', function () {
    $('.edit-modal').fadeOut();
  });
  $('.ModalLayer-Mask').on('click', function () {
    $('.inner').removeClass('isShow');
  });
});

//アコーディオンメニュー
$(function () {
  $(".a-click").click(function () {
    if ($(".a-click").hasClass('.active')) {
      $(".user-info").slideToggle(300);
      $(".a-click").removeClass(".active");
      $(".a-click").css("transform", "rotateX(0deg)");
    } else {
      $(".user-info").slideToggle(300);
      $(".a-click").addClass(".active");
      $(".a-click").css("transform", "rotateX(180deg)");
    }
  })
})
