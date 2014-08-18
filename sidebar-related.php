<?php
// Thanks to http://designisphilosophy.com/ for this nice addition
	global $post;
	$backup = $post; //backup current object
	$current = $post->ID; //current page ID
	$arguments = array(
			'numberposts' => 15,
			'category' => '47,76,95,59,94',
			'orderby'=>'rand'
			);
	$myposts = get_posts($arguments);
	$count = count($myposts);

	$ajaxLoad = false;
	if ($count > 1 ) : ?>
	<aside class="widget widget_text">
		<h3 class="widget-title">Truyện ngắn tương tự</h3>
			<ul class="nomarginList">
			<?php for ($i=0; $i< 5; $i++): $post = $myposts[$i];?>
				<?php 
					$post_thumbnail_id=get_post_thumbnail_id($post->ID);
					if($post_thumbnail_id != null)
					{
						$image_src = 'http://muatocroi.com/wp-content/uploads/'.get_post_meta($post_thumbnail_id, '_wp_attached_file', true);
					}
					else
					{
						$image_src = 'http://muatocroi.com/wp-content/themes/thirteen/img/noimage1.jpg';	
					}
				 ?>
				 <li class="recentcomments">
				 	<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'twentytwelve' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark">
					 	<img class="wp-post-image" title="<?php echo $post->post_title; ?>" alt="ảnh <?php echo $post->post_title; ?>" src="http://muatocroi.com/wp-content/themes/thirteen/timthumb.php?src=<?php echo $image_src; ?>&amp;w=281&amp;h=100&amp;q=100"><br/>
					 	<span class="entry-title">
							<?php echo $post->post_title; ?>
						</span>
					</a>
				</li>
			<?php endfor; ?>
			<?php for ($i=5; $i< $count; $i++): $post = $myposts[$i];?>
				<li class="recentcomments"><span class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'twentytwelve' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php echo $post->post_title; ?></a></span></li>
			<?php endfor; ?>
			</ul>
	</aside>
	<?php $post = $backup;
		wp_reset_query();
		wp_reset_postdata();
	?>
<?php endif; ?>
<?php
	if ( $ajaxLoad )
	{
		echo '<script src="http://muatocroi.com/wp-content/themes/thirteen/js/sidebarRalteLoader.js" type="text/javascript"></script>';
	}
	else
	{

	}