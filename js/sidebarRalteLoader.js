jQuery( document ).ready( function( $ ) {

	var $preData = null;
	var $container = $('#sidebarRelatePostContainer');
	var blockHeight = 107;

	setInterval(function(){loadNewBlock()}, 10000);

	function loadNewBlock()
	{
		$.ajax({
			cache: false,
			url: 'http://muatocroi.com/wp-content/themes/thirteen/sidebarRelatePostLoad.php',
			success: function(response) {
				if ( $preData!=null)
				{
					console.log("----------");
					console.log("Thêm block");
					removeFirstBlock();
					$preData.animate(
						{
				            height: blockHeight,
				        }, 
				        {
				            duration: 1000
				        }
				    );
				}
				$preData = $(response);
				$preData.css("height","0").appendTo($container);
		  	}

		});
	}

	function removeFirstBlock()
	{
		$('#sidebarRelatePostContainer').children("div:first").animate(
			{
	            height: 0
	        }, 
	        {
	            duration: 1000,
	            complete: function()
            	{
	            	$(this).remove();
	            	if ($(this) !=null)
	            	{
	            		console.log($(this));
	            	}
	            }
	        });
	}
});