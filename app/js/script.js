//Preloader
$(window).load(function() {
	$("#intro-loader").delay(1000).fadeOut();
	$(".mask").delay(1000).fadeOut("slow");
});

$(document).ready(function() {

  initializeMap(lat,lng);
  
	//Elements Appear from top
	$('.item_top').each(function() {
		$(this).appear(function() {
			$(this).delay(200).animate({
				opacity : 1,
				top : "0px"
			}, 1000);
		});
	});

	//Elements Appear from bottom
	$('.item_bottom').each(function() {
		$(this).appear(function() {
			$(this).delay(200).animate({
				opacity : 1,
				bottom : "0px"
			}, 1000);
		});
	});
	//Elements Appear from left
	$('.item_left').each(function() {
		$(this).appear(function() {
			$(this).delay(200).animate({
				opacity : 1,
				left : "0px"
			}, 1000);
		});
	});
	
	//Elements Appear from right
	$('.item_right').each(function() {
		$(this).appear(function() {
			$(this).delay(200).animate({
				opacity : 1,
				right : "0px"
			}, 1000);
		});
	});
	
	//Elements Appear in fadeIn effect
	$('.item_fade_in').each(function() {
		$(this).appear(function() {
			$(this).delay(250).animate({
				opacity : 1,
				right : "0px"
			}, 1500);
		});
	});

	$("#nav").sticky({
		topSpacing : 0
	});

  /*rotate('rotate1');*/


	//Navigation Dropdown
	$('.nav a.collapse-menu').click(function() {
		$(".navbar-collapse").collapse("hide");
	});

	$('body').on('touchstart.dropdown', '.dropdown-menu', function(e) {
		e.stopPropagation();
	});

 
	//Back To Top
	$(window).scroll(function() {
		if ($(window).scrollTop() > 400) {
			$("#back-top").fadeIn(200);
		} else {
			$("#back-top").fadeOut(200);
		}
	});
	$('#back-top').click(function() {
		$('html, body').stop().animate({
			scrollTop : 0
		}, 1500, 'easeInOutExpo');

      return false;
	});

});

/*Navigation Scrolling
	$(function() {
		$('.nav li a').bind('click', function(event) {
			var $anchor = $(this);

			$('html, body').stop().animate({
				scrollTop : $($anchor.attr('href')).offset().top - 70
			}, 2000, 'easeInOutExpo');

			event.preventDefault();
		});
	});
	*/
   
//FullScreen Slider
$(function(){
$('#fullscreen-slider').maximage({
cycleOptions: {
fx: 'fade',
speed: 1200,
timeout: 500,
pause: 1
},
onFirstImageLoaded: function(){
jQuery('#cycle-loader').hide();
jQuery('#fullscreen-slider').fadeIn('slow');
},
// cssBackgroundSize might be causing choppiness in retina display safari
cssBackgroundSize: false
});
});

//Parallax
$(window).bind('load', function() {
	parallaxInit();
});

function parallaxInit() {
	$('#one-parallax').parallax("50%", 0.2);
	$('#two-parallax').parallax("50%", 0.2);
	$('#three-parallax').parallax("50%", 0.2);
	/*add as necessary*/
	$('.parallax-layer').parallax({
				mouseport: jQuery("#port")
			});
}	
			
	
	var onMobile = false;
	if (/Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent)) {
		onMobile = true;
	}

if (onMobile == false) {
// Number Counter
(function() {
	var Core = {
		initialized : false,
		initialize : function() {
			if (this.initialized)
				return;
			this.initialized = true;
			this.build();
		},
		build : function() {
			this.animations();
		},
		animations : function() {
			// Count To
			$(".number-counters [data-to]").each(function() {
				var $this = $(this);
				$this.appear(function() {
					$this.countTo({});
				}, {
					accX : 0,
					accY : -150
				});
			});
		},
	};
	Core.initialize();
})();
}
//Initilize Google Map
 function initializeMap(lat,lng) {
     var mapOptions = {
       center: new google.maps.LatLng(lat, lng),
       zoom: 16,
       zoomControl: true,
       scaleControl: true,
       scrollwheel: true,
       mapTypeId: google.maps.MapTypeId.ROADMAP
     };
     var map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
     var marker = new google.maps.Marker({
     position: mapOptions['center'],
     map: map,
     });
       
     return map;
 }    
 
 
 
	function LoadParallax(){
	
		if($(window).width() < 1024) {   
		// Affichage petite résolution / phone
			$("#inscription").html('\
			<div   style="	height: 100%; \
							width:100% !important; \
							background: url(images/parallax-inscription/tree.png) no-repeat center fixed; \
							-webkit-background-size: cover; \
							-moz-background-size: cover; \
							-o-background-size: cover; \
							background-size: cover;" >\
			</div>');
			$("#liste").html('\
			<div   style="	height: 100%; \
							width:100% !important; \
							background: url(images/parallax-liste/bal.png) no-repeat center fixed ; \
							-webkit-background-size: cover; \
							-moz-background-size: cover; \
							-o-background-size: cover; \
							background-size: cover;" >\
			</div>');
			$("#contact").html('\
			<div   style="	height: 100%; \
							width:100% !important; \
							background: url(images/parallax-contact/witch.png) no-repeat center fixed; \
							-webkit-background-size: cover; \
							-moz-background-size: cover; \
							-o-background-size: cover; \
							background-size: cover;" >\
			</div>');
			$('.modal-dialog').addClass("small-modal");
		}
		else {
		//Taille normale / Effet Parallax
		$("#inscription").html('\
		<div 		class="para" \
					style=" 	background: url(images/parallax-inscription/sky.png) fixed no-repeat; \
								width:100% !important; \
								background-position: 0px 0px !important; "  >\
		</div> \
		<div class="parallax" style=" background: url(images/parallax-inscription/hills.png) ;" data-velocity="-.05"></div>\
		<div class="parallax" style=" background: url(images/parallax-inscription/castle.png) ; " data-velocity="-.06"></div>\
		<div class="parallax" style=" background: url(images/parallax-inscription/arbre.png)  ; " data-velocity="-.2" ></div>\
		<div class="parallax"></div>');
		
		$("#liste").html('\
		<div 		class="para" \
					style=" background: url(images/parallax-liste/fond.png) fixed no-repeat; \
							width:100% !important; \
							background-position: 0px 0px !important;"  >\
		</div> \
		<div class="parallax" style=" background: url(images/parallax-liste/4.png);width:100% !important;" data-velocity="-.05" ></div>\
		<div class="parallax" style=" background: url(images/parallax-liste/3.png);width:100% !important;" data-velocity="-.1" ></div>\
		<div class="parallax" style=" background: url(images/parallax-liste/2.png);width:100% !important;" data-velocity="-.13" ></div> \
		<div class="parallax" style=" background: url(images/parallax-liste/1.png);width:100% !important;" data-velocity="-.2" ></div>\
		<div class="parallax" style=" background: url(images/parallax-liste/table.png);width:100% !important;" data-velocity="-.4"  ></div>\
		<div class="parallax"></div>');	
		
		
		$("#contact").html('\
		<div 		class="para" \
					style=" background: url(images/parallax-contact/foret.png) fixed no-repeat; \
							width:100% !important; \
							background-position: 0px 0px ;"  >\
		</div> \
		<div class="parallax" style=" background: url(images/parallax-contact/sorciere.png); width:100% !important;" data-velocity="-.2" >\
		</div> ');

		$('.parallax').scrolly({bgParallax: true});
			
		}
		$('html, body').animate({
        scrollTop: 0
    }, 1);
	}
	
	// Navbar Scrolling
	function scrollToElement(selector, time, verticalOffset) {
    time = typeof(time) != 'undefined' ? time : 2000;
    verticalOffset = typeof(verticalOffset) != 'undefined' ? verticalOffset : 0;
    element = $(selector);
    offset = element.offset();
    offsetTop = offset.top + verticalOffset ;
	
	

	if (offsetTop != 0){
    $('html, body').animate({
        scrollTop: offsetTop 
    }, 2000);
	}
	$('html, body').animate({
        scrollTop: offsetTop + 175
    }, 700);
}
	
	
	