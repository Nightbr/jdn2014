function Load(){
		if($(window).width() < 800) {   
		// Affichage petite résolution / phone
			$("#body").html('\
			<div   style="	height: '+ ($(window).width() * (1300/800)) +'px;\
							width:100% !important; \
							margin-top:120px;\
							background: url(img/small.png) no-repeat top center ; \
							-webkit-background-size: cover; \
							-moz-background-size: cover; \
							-o-background-size: cover; \
							background-size: cover;\
							" >\
			</div>');
			
			document.getElementById("countdown").style.fontSize="13px";
			document.getElementById("countdown").style.width="200px";
			$("p").css("width","15px");
			}
			else {
				$("#body").html('\
					<div  style=" width: 100%; height: 100%; background-image: url(img/fond-rideaux.png); background-size: cover;">\
						<img class="foreground" src="img/scene.png"/>\
						<img class="title" src="img/jdn-title.png"/>\
						<img class="ridgauche" src="img/rideau-gauche.png"/>\
						<img class="riddroite" src="img/rideau-droite.png"/>\
					</div>');
					document.getElementById("countdown").style.fontSize="30px";
					document.getElementById("p").style.width="30px";
					$("p").css("width","30px");
			}
		}
		
		
/*
* Basic Count Down to Date and Time
* Author: @mrwigster / trulycode.com
*/
(function (e) {
	e.fn.countdown = function (t, n) {
	function i() {
		eventDate = Date.parse(r.date) / 1e3;
		currentDate = Math.floor(e.now() / 1e3);
		if (eventDate <= currentDate) {
			n.call(this);
			clearInterval(interval)
		}
		seconds = eventDate - currentDate;
		days = Math.floor(seconds / 86400);
		seconds -= days * 60 * 60 * 24;
		hours = Math.floor(seconds / 3600);
		seconds -= hours * 60 * 60;
		minutes = Math.floor(seconds / 60);
		seconds -= minutes * 60;
		days == 1 ? thisEl.find(".timeRefDays").text(":") : thisEl.find(".timeRefDays").text(":");
		hours == 1 ? thisEl.find(".timeRefHours").text(":") : thisEl.find(".timeRefHours").text(":");
		minutes == 1 ? thisEl.find(".timeRefMinutes").text(":") : thisEl.find(".timeRefMinutes").text(":");
		
		if (r["format"] == "on") {
			days = String(days).length >= 2 ? days : "0" + days;
			hours = String(hours).length >= 2 ? hours : "0" + hours;
			minutes = String(minutes).length >= 2 ? minutes : "0" + minutes;
			seconds = String(seconds).length >= 2 ? seconds : "0" + seconds
		}
		if (!isNaN(eventDate)) {
			thisEl.find(".days").text(days);
			thisEl.find(".hours").text(hours);
			thisEl.find(".minutes").text(minutes);
			thisEl.find(".seconds").text(seconds)
		} else {
			alert("Invalid date. Example: 30 Tuesday 2013 15:50:00");
			clearInterval(interval)
		}
	}
	thisEl = e(this);
	var r = {
		date: null,
		format: null
	};
	t && e.extend(r, t);
	i();
	interval = setInterval(i, 1e3)
	}
	})(jQuery);
	$(document).ready(function () {
	function e() {
		var e = new Date;
		e.setDate(e.getDate() + 60);
		dd = e.getDate();
		mm = e.getMonth() + 1;
		y = e.getFullYear();
		futureFormattedDate = mm + "/" + dd + "/" + y;
		return futureFormattedDate
	}
	$("#countdown").countdown({
		date: "15 October 2014 00:00:00", // Change this to your desired date to countdown to
		format: "on"
	});
});