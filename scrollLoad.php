<?php
if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'):
?>
	<?php
		require_once( '../../../wp-load.php' );
		$cat = "";
		$page = "";
		$loc = mysql_escape_string ($_GET['loc']);
		$showPage = "";
		$query = "";
		if($loc == "single")
		{
			$cat = mysql_escape_string ($_GET['cat']);
			$query = "cat=".$cat."&orderby=rand";
			$showPage = "<div class=\"pageno\">Cùng chuyên mục</div>";
		}
		elseif( ($loc == "index") )
		{
			$page = mysql_escape_string ($_GET['page']);
			$query = 'paged='.$page;
			$showPage = "<div class=\"pageno\">Trang : ".$page."</div>";
		}
		elseif($loc == "category")
		{
			$page = mysql_escape_string ($_GET['page']);
			$cat = mysql_escape_string ($_GET['cat']);
			$query = 'paged='.$page.'&cat='.$cat;
			$showPage = "<div class=\"pageno\">Trang : ".$page."</div>";
		}
		query_posts($query);
	?>
	<?php
	if (have_posts()):
	?>
	<div class="page" id="page-<?php echo $page; ?>">
	<?php echo $showPage; ?>
		<?php while (have_posts()): the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class("WhiteBG"); ?>>
				<header class="entry-header">
					<?php
					$post_thumbnail_id=get_post_thumbnail_id($post->ID);
					if($post_thumbnail_id != null)
					{
						$image_src = 'http://muatocroi.com/wp-content/uploads/'.get_post_meta($post_thumbnail_id, '_wp_attached_file', true);
					}
					else
					{
						$image_src = 'http://muatocroi.com/wp-content/themes/thirteen/img/noimage_lager.jpg';	
					}
					 ?>
					 <div class='container'>
						<img class="wp-post-image" title="Minh họa truyện ngắn <?php the_title(); ?>" alt="<?php the_title(); ?>" src="http://muatocroi.com/wp-content/themes/thirteen/timthumb.php?src=<?php echo $image_src; ?>&amp;w=620&amp;h=250&amp;q=100&amp;s=1">
						<h2 class="entry-title caption">
							<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'twentytwelve' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
						</h2>
					</div>
				</header><!-- .entry-header -->

				<div class="entry-content">
					<?php wpe_excerpt('wp_excerptlength_long'); ?>
				</div><!-- .entry-content -->
			</article><!-- #post -->
		<?php endwhile; ?>
	</div> <!-- End block -->
	<?php else: ?>
	<?php endif; ?>
	<?php wp_reset_query();?>
<?php
endif;
?>