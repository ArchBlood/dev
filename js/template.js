jQuery(document).ready(function ($) {
	var open = false;

	$('.toggle').click(function (event) {
		event.stopPropagation();
		var toggle = open ? closeSidebar : openSidebar;
		toggle();
	});

    var openSidebar = function () {
		$('.sidebar').addClass('expanded');
		open = true;
	}
	var closeSidebar = function () {
		$('.sidebar').removeClass('expanded');
		open = false;
	}

    $('.sidebar .content .menu ul li a').click(function (event) {
		event.stopPropagation();
		var toggle = closeSidebar;
		toggle();
	});

	$(document).click(function (event) {
		if (!$(event.target).closest('.expanded').length) {
			closeSidebar();
		}
	});
});

/* Apple fix */

function setDocHeight() {
    document.documentElement.style.setProperty('--vh', `${window.innerHeight/100}px`);
};

window.addEventListener('resize', function () {
    setDocHeight();
});
window.addEventListener('orientationchange', function () {
    setDocHeight();
});

setDocHeight();

/* To top */

$(document).ready(function() {
    // Show or hide the sticky footer button
    $(window).scroll(function() {
        if ($(this).scrollTop() > 200) {
            $('.go-top').fadeIn(200);
        } else {
            $('.go-top').fadeOut(200);
        }
    });
    
    // Animate the scroll to top
    $('.go-top').click(function(event) {
        event.preventDefault();
        
        $('html, body').animate({scrollTop: 0}, 300);
    })
});

/* Delete */

jQuery(document).ready(function ($) {
	var open = false;

	$('.user-toggle').click(function (event) {
		event.stopPropagation();
		var toggle = open ? closeUsermenu : openUsermenu;
		toggle();
	});

    var openUsermenu = function () {
		$('.user-menu').addClass('expanded');
		open = true;
	}
	var closeUsermenu = function () {
		$('.user-menu').removeClass('expanded');
		open = false;
	}

    $('.user-menu ul li a').click(function (event) {
		event.stopPropagation();
		var toggle = closeUsermenu;
		toggle();
	});

	$('.sidebar .toggle').click(function (event) {
		event.stopPropagation();
		var toggle = closeUsermenu;
		toggle();
	});

	$(document).click(function (event) {
		if (!$(event.target).closest('.expanded').length) {
			closeUsermenu();
		}
	});
});