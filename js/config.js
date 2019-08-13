$(document).ready(function(){
  $('ul li:has(ul)').click(function(e){
    e.preventDefault();

    if ($(this).hasClass('active')) {
      $(this).removeClass('active');
      $('ul li ul li').slideUp();
    } else {
      $('ul li ul li').slideUp();
      $('ul li').removeClass('active');
      $(this).addClass('active');
      $('ul li ul li').slideDown();
    }
  });

  $("ul li ul li a").click(function(e){
   window.location.href = $(this).attr("href");
   });
});
