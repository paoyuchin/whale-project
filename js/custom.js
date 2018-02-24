// catch window innerWidth and innerHeight
window.width = innerWidth
window.height = innerHeight

// catch window resize innerWidth and innerHeight
var resizeEnd
addEventListener('resize', () => {
    window.width = innerWidth
    window.height = innerHeight
    
    // just output last widow width
    if(window.width < 768){
    	resizeEnd = setTimeout("init", 250)
    } else {
    	clearTimeout(resizeEnd)
    }
})

function init() {
	// about nav-menu dropdown
	$('#about').click(function(evt) {
		if(window.width > 767) {
			return false
		} else {
			evt.preventDefault()
			var dropdownAbout = $('#dropdownAbout').slideToggle()
			$(this).after(dropdownAbout)
			$('#dropdownEvent').slideUp()
		}		
	})

	// event nav-menu dropdown
	$('#event').click(function(evt) {
		if(window.width > 767) {
			return false
		} else {
			evt.preventDefault()
			var dropdownEvent = $('#dropdownEvent').slideToggle()
			$(this).after(dropdownEvent)
			$('#dropdownAbout').slideUp()
		}
	})

	$('.popup-close').click(function() {
		$('#dropdownAbout').slideUp()
		$('#dropdownEvent').slideUp()
	})
}

init()
