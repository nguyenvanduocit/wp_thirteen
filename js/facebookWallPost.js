jQuery( document ).ready( function( $ ) {
    $.ajax({
        dataType:"json",
        url: document.location.protocol + '//ajax.googleapis.com/ajax/services/feed/load?v=1.0&num=1&callback=?&q=' + encodeURIComponent('https://www.facebook.com/feeds/page.php?format=rss20&id=141920402552158'),
        success: function(response) {
            if(response.responseData && response.responseData.feed && response.responseData.feed.entries && (response.responseData.feed.entries.length > 0) )
            {
                $('#fb-post').attr('data-href',response.responseData.feed.entries[0].link);
            }
        },
        error:function()
        {
            $('#loading_content_Facebook').fadeOut(900,0).remove();
        }

    });
});