var onMobile = false;
if (/Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent)) {
   onMobile = true;
}

//load parallaxes
 $(document).ready(function(){
     LoadParallax();
    $('body').scrollspy({ target: '#MyNavbar' });
      $('html, body').animate({
     scrollTop: 0
 }, 1);
 });

//Handle window's resizing to reload parallaxes' divs
if(!onMobile)
{
   $( window ).resize(function() {
      var url= location.href;
      url = url.split("#",1)
      location = url;
   });
}

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
//Main App JS - TB

   // à voir pour la sécu...
   var api_url = "api/laravel/public/v1/";
   var username = "apiuser1";
   var password = "gogogo";
   var api_key = btoa(username + ":" + password);


   //login api
   $.ajax({
      url: api_url+"categorie/1",
      type: 'get',
      //username: username,
      //password: password,
      headers: {
         "Authorization": "Basic " + api_key
      },
      success: function()
      {
         // on est authentifié
         // affichage liste des promos
         $.getJSON(api_url+"categorie", function(data) {
               var result = data;
               if(!result.error){ 
                  $.ajax({
                     url: "tpl/lapinou.tpl",
                     type: 'GET',
                     dataType: 'text',
                     success: function(data){
                        var tpl = data;

                        $.each(result.categories, function(key, categorie) {
                           //console.log(key, categorie);
                           var dataRender = {'id':categorie.id,'title':categorie.title}
                           $("#promoList").append(Mustache.render(tpl, dataRender));
                           // construction de la liste du form d'inscription
                           $("#categorie").append('<option value="'+categorie.id+'">'+categorie.title+'</option>'); 
                        });
                     }
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
                           $.ajax({
                              url: "tpl/modal.tpl",
                              type: 'GET',
                              dataType: 'text',
                              success: function(data){
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
                              }
                           });
                        }
                     });

                  $("#promoModal").on('click', '.button-close', function(e){
                     $("#promoModal").html(" ");
                  });

                  });
               }
         });


         //formulaire d'inscription
         inscFormInit(api_url);

         
      }
   });

   // Inscription Form Request
   var inscrform = $('#inscrform');
   var submit = $('#inscrform_submit');
   var infoDiv = $('#infoDiv');

   inscrform.validate();  

   // form submit event
    $(document).on('submit', '#inscrform', function(e) {
      e.preventDefault(); // prevent default form submit
      // sending ajax request through jQuery
      //console.log(inscrform);
      $.ajax({
         url: api_url+'guest', 
         type: 'POST', 
         data: inscrform.serialize()+"&isPaid=0",
         success: function(data) {
            inscrform.fadeOut(300);
            if(!data.error){
               //var currentTable = data.guest.table;
               //$.getJSON(api_url+"table/"+currentTable.id+"/guest", function(data) {
               //   var remains_chairs = currentTable.max_chairs - data.guests.length ;
               //   if(remains_chairs<=0)
               //   {
               //      $.ajax(api_url+"table/"+currentTable.id, {type: 'PUT',data: {'is_full':1}, success: function(data){
               //         //console.log(data);
               //      }
               //      });
               //   }
               //});

               infoDiv.html("Vous avez bien été inscrit, merci de régler les frais d'inscription le plus vite possible."); // fade in response data     
               infoDiv.fadeIn(100);
               setTimeout(function() {
                  infoDiv.fadeOut(300);
                  inscFormInit(api_url);
                  $('#firstname, #email, #lastname, #table, #categorie').val('');
                  inscrform.fadeIn(1800);
               }, 4000 );  
            }
            else
            {
               infoDiv.html("Erreur lors de l'inscription !!"); // fade in response data     
               infoDiv.fadeIn(100);
               setTimeout(function() {
                  infoDiv.fadeOut(300);
                  inscFormInit(api_url);
                  inscrform.fadeIn(1800);
               }, 4000 );
            }

         },
         error: function(e) {
            console.log(e)
         }
      });
   });


   // Contact Form Request
   var form = $('#contactform');
   var submit = $('#contactForm_submit'); 
   var alertx = $('.form-respond'); 

   form.validate();  

   // form submit event
    $(document).on('submit', '#contactform', function(e) {
      e.preventDefault(); // prevent default form submit
      // sending ajax request through jQuery
      //console.log(form.serializeArray());
      var formData = {};
      form.serializeArray().map(function(x){formData[x.name] = x.value;}); 
      $.ajax({
         url: 'api/formContact.php', 
         type: 'POST', 
         dataType: 'json',
         data: JSON.stringify(formData), 
         contentType: 'application/json; charset=utf-8',
         beforeSend: function() {
            alertx.fadeOut();
            submit.html('Sending....'); // change submit button text
         },
         success: function(data) {
            form.fadeOut(300);
            if(data.success){
               alertx.html(data.message); // fade in response data     
               alertx.fadeIn(100);
               setTimeout(function() {
                  alertx.html(data.message).fadeOut(300);
                  $('#name, #email, #message, #subject').val('');
                  form.fadeIn(1800);
               }, 4000 );  
            }
            else
            {
               alertx.html(data.errors); // fade in response data     
               alertx.fadeIn(100);
               setTimeout(function() {
                  alertx.html(data.errors).fadeOut(300);
                  form.fadeIn(1800);
               }, 4000 );
            }

         },
         error: function(e) {
            console.log(e)
         }
      });
   });


   function inscFormInit(api_url){
      $('#table').html('');

      $.ajax({
         url: api_url+"table", 
         type: 'GET', 
         cache: false,
         success: function(data) {
            var result = data;
            if(!result.error){ 

               $.ajaxSetup({
                  async: false
               });
               
               $.each(result.tables, function(key, table) {
                  // construction de la liste du form d'inscription
                  //if(!table.is_full){
                  if(table.is_full == 0){
                        $("#table").append('<option value="'+table.id+'">'+table.title+' (Il reste '+table.available_chairs+' place(s) à cette table)</option>'); 
                  }
               });

               $.ajaxSetup({
                  async: true
               });
            }
         }
      });
   }
});


