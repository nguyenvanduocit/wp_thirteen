<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
	</div><!-- #main .wrapper -->
	<footer id="colophon" role="contentinfo">
		<div class="site-info">
			<?php do_action( 'twentytwelve_credits' ); ?>
			Liên hệ : 0167 297 1234 | Nhóm biên tập : BienTap@muatocroi.com | <a href="https://plus.google.com/115803202842274814141" rel="publisher">Google+</a>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->
<!-- FOOTER -->
<script src="<?php echo The_Asset_Link(); ?>/jquery.hcsticky.js"></script>
<?php wp_footer(); ?>
<!-- ENDFOOTER -->
<!-- BEGIN Tynt Script -->
<script type="text/javascript">
if(document.location.protocol=='http:'){
 var Tynt=Tynt||[];Tynt.push('c_ZOj6S6Wr4lKXadbi-bnq');Tynt.i={"ap":"Trích : ","aw":"50","ad":false,"ss":"p","pt":"i"};
 (function(){var s=document.createElement('script');s.async="async";s.type="text/javascript";s.src='http://tcr.tynt.com/ti.js';var h=document.getElementsByTagName('script')[0];h.parentNode.insertBefore(s,h);})();
}
</script>
<!-- END Tynt Script -->

	<script type="text/javascript">
	  (function() {
	    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
	    po.src = 'https://apis.google.com/js/plusone.js';
	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
	  })();
	</script>

	<script>
	  (function() {
	    var cx = '015472520574016395096:efoamfq7ogu';
	    var gcse = document.createElement('script');
	    gcse.type = 'text/javascript';
	    gcse.async = true;
	    gcse.src = (document.location.protocol == 'https' ? 'https:' : 'http:') +
	        '//www.google.com/cse/cse.js?cx=' + cx;
	    var s = document.getElementsByTagName('script')[0];
	    s.parentNode.insertBefore(gcse, s);
	  })();

	  jQuery(window).load(function() {
	  	jQuery('#floatsidebar').hcSticky("reinit");
	  });
	</script>
</body>
</html>