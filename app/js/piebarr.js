function hasClass(ele, cls) {
	return ele.className.match(new RegExp('(\\s|^)' + cls + '(\\s|$)'));
}

function addClass(ele, cls) {
	if (!this.hasClass(ele, cls))
		ele.className += " " + cls;
}

function removeClass(ele, cls) {
	if (hasClass(ele, cls)) {
		var reg = new RegExp('(\\s|^)' + cls + '(\\s|$)');
		ele.className = ele.className.replace(reg, ' ');
	}
}

/*function rotate(id) {         
	$("#l-inhalt").css("visibility", "visible");
	document.getElementById("l-inhalt").setAttribute("class", "show");


	if (document.querySelector(".btn-skills.active") !== null)
		removeClass(document.querySelector(".btn-skills.active"), "active");
  
    
	if (id === "rotate1") {
		addClass(document.querySelector(".skills-pink"), "active");
		var data = skillData.skill1;
	}
	if (id === "rotate2") {
		addClass(document.querySelector(".skills-blue"), "active");
		var data = skillData.skill2;
	}
	if (id === "rotate3") {
		addClass(document.querySelector(".skills-green"), "active");
		var data = skillData.skill3;
	}

	updateBars(data);
}

function updateBars(data) {  
  clearBars();
  for ( var i = 0; i < data.length; i = i + 1 ) {
  var j=i+1;
  eval("document.getElementById('skill-bar"+j+"').style.height = data[i].value;");
  eval("document.getElementById('skill-bar"+j+"').style.backgroundColor = data[i].color;");
  eval("document.getElementById('skill-bar"+j+"').style.borderRight = data[i].border;");
	document.querySelector("#skill-bar"+j+" > .skill-caption").innerHTML = data[i].title;
  }
  document.getElementById("l-inhalt").setAttribute("class", "show");
}

function clearBars() {  
  for ( var i = 0; i < 5; i = i + 1 ) {
  var j=i+1;
  eval("document.getElementById('skill-bar"+j+"').style.height = '';");
  eval("document.getElementById('skill-bar"+j+"').style.backgroundColor = 'transparent';");
  eval("document.getElementById('skill-bar"+j+"').style.borderRight = 'none';");
	document.querySelector("#skill-bar"+j+" > .skill-caption").innerHTML = '';
  }
}
*/