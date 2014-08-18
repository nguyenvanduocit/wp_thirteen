/**
 * navigation.js
 *
 * Handles toggling the navigation menu for small screens.
 */
var isCommentFormOpen = false;

jQuery( document ).ready( function( $ ) {
	
	width_percent = $('#comments').width();
	var href = $('link[rel=canonical]').attr("href");
    fbxml = '<fb:comments href="'+href+'" width="' + width_percent  + 'px"></fb:comments>';
	$('#fbcomment').append(fbxml);

	$("#reply-title").click(function() {
		openCloseCommentForm();
	});

	$(".reply").click(function() {
		openCloseCommentForm();
	});

	function openCloseCommentForm()
	{
		if ( isCommentFormOpen )
			{
				$("#commentform").slideUp("slow");
				isCommentFormOpen = false;
			}else
			{
				$("#commentform").slideDown("slow");
				isCommentFormOpen = true;
			}	
	}
} );
