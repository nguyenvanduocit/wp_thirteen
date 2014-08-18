jQuery( document ).ready( function( $ ) {
	//infinitescroll
	var $beforeMark = $('.LoadingContainer');
	var page = parseInt($beforeMark.attr("page"));
	var inAction = false;
	var reachedEnd = false;
	
	var loc = $beforeMark.attr("loc");
	var cat = $beforeMark.attr("cat");
	
	if(!isNumber(page))
	{
		page = -1;
	}
	else
	{
		page++;
	}

	$('#loadMorePost').click(function(){
		loadMorePost();
		return false;
	});

	function loadMorePost(){
	   if(inAction == false){
	       inAction = true;
	       	$.ajax({
				url: 'http://muatocroi.com/wp-content/themes/thirteen/scrollLoad.php?page='+(page+1) + '&cat='+cat+'&loc='+loc,
				beforeSend: function() {
					$('#loadMorePost').slideUp(400);
					$('#loadingMorePost').slideDown(400);
				},
				success: function(response) {
					$(response).hide().insertBefore($beforeMark).fadeIn(1000);
					if(page >=0)
					{
						page++;
					}
					inAction = false; 
					$('#loadingMorePost').slideUp(400);
					$('#loadMorePost').slideDown(400);
			  	},
			  	error:function()
			  	{
			  		$('#loadingMorePost').slideUp(400);
			  		$('#loadMorePost').slideDown(400);
			  	}

			});
		}
	}
} );
function isNumber(n) {
	return !isNaN(parseFloat(n)) && isFinite(n);
}