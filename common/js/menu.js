// catch window innerWidth and innerHeight
window.width = innerWidth;
window.height = innerHeight;

// catch window resize innerWidth and innerHeight
var resizeEnd;
addEventListener('resize', () => {
    window.width = innerWidth;
    window.height = innerHeight;
    
    // just output last widow width
    if(window.width < 768){
    	resizeEnd = setTimeout("menuDropDown", 250);
    } else {
    	clearTimeout(resizeEnd);
    }
})

function menuDropDown() {
	// about nav-menu dropdown
	$('#about').click(function(evt) {
		evt.preventDefault();
		if(window.width > 767) {
			return false;
		} else {
			evt.preventDefault();
			var dropdownAbout = $('#dropdownAbout').slideToggle();
			$(this).after(dropdownAbout);
		}		
	})

	$('.popup-close').click(function() {
		$('#dropdownAbout').slideUp();
	})
}

menuDropDown();

var menuClose = document.querySelector(".menu-close");
var menuRwd = document.querySelector(".menu-rwd");
var menuToggle = document.querySelector(".menu-toggle");

menuClose.addEventListener("click", function(evt) {
	evt.preventDefault();
	menuRwd.style.visibility = "hidden";
	menuRwd.style.opacity = 0;
})

menuToggle.addEventListener("click", function(evt) {
	evt.preventDefault();
	menuRwd.style.visibility = "visible";
	menuRwd.style.opacity = 1;
})





// catch web location to change menu color 
// function menuColorChange() {
//     let web = window.location.pathname;
//     currentHref = web.replace("/","").toString();
//     id = "#" + currentHref.replace(".html","").toString();
    // console.log(id)
    // console.log(currentHref)

    // dropdown menu condition and rwd dropdown menu condition
//     if(id == "#boardcast" || id == "#activity" || id == "#navBoardcast" || id == "#navActivity") {
//         document.querySelector("#event").style.backgroundColor = "rgba(0,0,0,0.6)";
//     } else if(id == "#aboutUs" || id == "#milstone" || id == "#navAboutUs" || id == "#navMileStone") {
//         document.querySelector("#about").style.backgroundColor = "rgba(0,0,0,0.6)";
//     } else {
//         document.querySelector("id").style.backgroundColor = "rgba(0,0,0,0.6)";
//     }   
// }

// menuColorChange();
