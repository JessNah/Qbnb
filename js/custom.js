// Offset for Site Navigation
$('#siteNav').affix({
	offset: {
		top: 100
	}
})

jQuery(document).ready(function($) {
    $(".clickable-row").click(function() {
        window.document.location = $(this).data("href");
    });
});