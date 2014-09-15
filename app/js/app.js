
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


$(function() {

   // à voir pour la sécu...
   var api_url = "http://localhost/jdn2014/app/api/laravel/public/v1/";
   var username = "apiuser1";
   var password = "gogogo";


   //login api
   $.ajax({
      url: api_url+"categorie/1",
      type: 'get',
      username: username,
      password: password,
      success: function()
      {
         // on est authentifié
         // affichage liste des promos
         $.getJSON(api_url+"categorie", function(data) {
               var result = data;
               if(!result.error){ 
                  $.get("tpl/lapinou.tpl", function(data){
                     var tpl = data;

                     $.each(result.categories, function(key, categorie) {
                        //console.log(key, categorie);
                        var dataRender = {'id':categorie.id,'title':categorie.title}
                        $("#promoList").append(Mustache.render(tpl, dataRender));
                     });
                  });

                  // gestion du modal
                  $("#promoList").on('click', '.button-modal', function(e){
                     var id = $(this).data('id');
                     var title = $(this).data('title');
                     //console.log(id);

                     $.getJSON(api_url+"categorie/"+id+"/guest", function(data) {
                        //console.log(data);
                        var result = data;
                        if(!result.error){ 
                           $.get("tpl/modal.tpl", function(data){
                              var tpl = data;
                              var dataRender = new Array();
                              dataRender['title'] = title;
                              dataRender['count'] = result.guests.length;
                              dataRender['guests'] = new Array();

                              $.each(result.guests, function(key, guest) {
                                 //console.log(key, guest);
                                 dataRender['guests'].push({'firstname':guest.firstname,'lastname':guest.lastname});
                                 
                              });
                              //console.log(dataRender);
                              $("#promoModal").html(Mustache.render(tpl, dataRender));
                           });
                        }
                     });

                  $("#promoModal").on('click', '.button-close', function(e){
                     $("#promoModal").html(" ");
                  });

                  });
               }
         });
      }
   });


});
