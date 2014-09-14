
//load parallaxes
 $(document).ready(function(){
     LoadParallax();
    $('body').scrollspy({ target: '#MyNavbar' });
      $('html, body').animate({
     scrollTop: 0
 }, 1);
 });

//Handle window's resizing to reload parallaxes' divs
$( window ).resize(function() {
   var url= location.href;
   url = url.split("#",1)
   location = url;
});

//Navbar Scroll
$('#nav0').click(function () {
   scrollToElement('#tag0');
});
$('#nav1').click(function () {
   scrollToElement('#tag1');
});
$('#nav2').click(function () {
   scrollToElement('#tag2');
});
$('#nav3').click(function () {
   scrollToElement('#tag3');
});


  
$('.nav a.collapse-menu').click(function() {
   if($(window).width() < 768) { 
   $(".navbar-collapse").collapse("hide");
   $(".navbar-collapse").css("display","none");
   }
});

$(' i.fa').click(function() {
   if($(window).width() < 768) { 
   $(".navbar-collapse").css("display","block");
   $(".navbar-collapse").collapse("show");
   }
});

$('[data-spy="scroll"]').each(function () {
   var $spy = $(this).scrollspy('refresh')
});



// MODAL LAPINOU
$('.button-modal').click(function(){

   $('#myModal').css("display", "block");

});
$('.button-close').click(function(){

   $('#myModal').css("display", "none");

});