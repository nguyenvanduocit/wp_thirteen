<?php
// Thanks to http://designisphilosophy.com/ for this nice addition
	$backup = $post; //backup current object
	$current = $post->ID; //current page ID
	global $post;
	$catlist = implode(",",wp_get_post_categories($current));
	$args = array(	'numberposts' => 10,
					'orderby' => 'rand', 
					'exclude' =>$current,
					'category' => $catlist
				);
	$myposts = get_posts($args);
	$check = count($myposts);
?>

<?php if ($check > 1 ) : ?>
	<div class="clear"></div>
	<div class="wp_rp_content">
		<h3 class="related_post_title">Truyện ngắn tương tự:</h3>
		<ul>
			<?php foreach ($myposts as $index => $post) : ?>
				 <li>
				 	<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'twentytwelve' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
	<?php $post = $backup;
		wp_reset_query();
	?>
<?php endif; ?>