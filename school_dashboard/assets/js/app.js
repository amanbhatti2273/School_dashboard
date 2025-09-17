(function(){
	'use strict';

	// Activate current nav link by URL path
	var links = document.querySelectorAll('.sidebar .nav-link');
	var path = window.location.pathname.replace(/\\/g, '/');
	links.forEach(function(link){
		if (link.getAttribute('href') && path.endsWith(link.getAttribute('href'))) {
			links.forEach(function(l){ l.classList.remove('active'); });
			link.classList.add('active');
		}
	});

	// Example: hook up any data-bs-toggle="tooltip" if needed later
	var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
	tooltipTriggerList.map(function (tooltipTriggerEl) {
		return new bootstrap.Tooltip(tooltipTriggerEl);
	});
})();

