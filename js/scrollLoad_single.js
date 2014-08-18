/**
 * navigation.js
 *
 * Handles toggling the navigation menu for small screens.
 */

jQuery( document ).ready( function( $ ) {
	var _gaq = _gaq || [];
	//infinite click
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
		_gaq.push(['_trackEvent', "loadMorePost", "click at single"]);
		loadMorePost();
		return false;
	});
	//End infinite click

	//font size
	var theElement = $(".post").css("font-size");
	var textSize = parseFloat(theElement, 10);
	var unitOfMeasurement = theElement.slice(-2);
	var id = $('.control-panel').attr("postid");
	$('#cp-zoomin').click(function(){
		textSize++;
		$(".post").css("font-size", textSize + unitOfMeasurement);
		_gaq.push(['_trackEvent', "controlbar", "cp-zoomin"]);
	});
	$('#cp-zoomout').click(function(){
		textSize--;
		$(".post").css("font-size", textSize + unitOfMeasurement);
		_gaq.push(['_trackEvent', "controlbar", "cp-zoomout"]);
	});
	//end font size
	$('#cp-fullscreen').click(function(){
		if ( $("#secondary").css("display") == "none")
		{
			$("#secondary").css("display", "inline");
			$(".site-content").css("width", "65.104166667%");
		}
		else
		{
			$("#secondary").css("display", "none");
			$(".site-content").css("width", "100%");
		}
		_gaq.push(['_trackEvent', "controlbar", "cp-fullscreen"]);
	});
	$(".control-link").click(function() {
		//window.open('http://muatocroi.com/addition/recordFile/index.php', 'Thu Ã¢m bÃ i viáº¿t', config='height=400,width=500, toolbar=no, menubar=no')
		alert("Hệ thống đang được xây dựng, bạn vui lòng thử lại sau");
		_gaq.push(['_trackEvent', "controlbar", "cp-link"]);
	});
	/*Float menu
	var nav = $('.bar-show');
	var isFixed = false;
	var $w = $(window);
	
	var navHomeY = nav.offset().top;
	$(window).bind("scroll",function(event) {
        var scrollTop = $w.scrollTop();
        var shouldBeFixed = scrollTop > navHomeY;
        if (shouldBeFixed && !isFixed) {
            nav.css({
                position: 'fixed',
                top: 0,
                left: 0
            });
            isFixed = true;
        }
        else if (!shouldBeFixed && isFixed)
        {
            nav.css({
                position: 'static'
            });
            isFixed = false;
        }
    });
	//end float menu */

	function loadMorePost(){
	   if(inAction == false){
	       inAction = true;
	       	$.ajax({
				url: 'http://muatocroi.com/wp-content/themes/thirteen/scrollLoad.php?page='+page + '&cat='+cat+'&loc='+loc,
				beforeSend: function() {
					$('#loadMorePost').slideUp(400);
					$('#loadingMorePost').slideDown(400);
				},
				success: function(response) {
					$(response).hide().insertBefore($beforeMark).fadeIn(1000);
					if(page >= 0 )
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
});
function isNumber(n) {
	return !isNaN(parseFloat(n)) && isFinite(n);
}

function Display_Load()
{
	$("#loading").fadeIn(900,0);
}