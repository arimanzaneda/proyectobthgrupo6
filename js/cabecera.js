$(document).ready(function(){
  $('.submenu-btn').click(function(e) {
    e.stopPropagation(); 
    $(this).next('.submenu').slideToggle(200);
    $('.submenu').not($(this).next()).slideUp(200);
  });

  $(document).click(function() {
    $('.submenu').slideUp(200);
  });
});
