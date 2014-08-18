<?php
	require_once( '../../../wp-load.php' );
	$post = get_posts('numberposts=1&orderby=rand');
?>
<?php

if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'):

?>

	<?php 
		$post_thumbnail_id=get_post_thumbnail_id($post[0]->ID);				
		$image_alt = get_post_meta($post_thumbnail_id, '_wp_attachment_image_alt', true);
		$image_src = 'http://muatocroi.com/wp-content/uploads/'.get_post_meta($post_thumbnail_id, '_wp_attached_file', true);
	 ?>
	<div class='container sidebarRelatePostItem'>
	 	<a href="<?php echo get_permalink($post[0]->ID); ?>" title="<?php echo $post[0]->post_title; ?>" rel="bookmark">
		 	<img class="wp-post-image" title="<?php echo $image_alt; ?>" alt=""<?php echo $image_alt; ?>"" src="http://muatocroi.com/wp-content/themes/thirteen/timthumb.php?src=<?php echo $image_src; ?>&w=250&h=100&q=100&f=11">
		 	<h2 class="entry-title caption-sidebar">
				<?php echo $post[0]->post_title; ?>
			</h2>
		</a>
	</div>

<?php
endif;
?>