<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>
	<?php get_template_part( 'controlBar', 'single' ); ?>
	<div id="primary" class="site-content">
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', get_post_format() ); ?>

				<nav class="nav-single">
					<h3 class="assistive-text"><?php _e( 'Post navigation', 'twentytwelve' ); ?></h3>
					<span class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '<<', 'Previous post link', 'twentytwelve' ) . '</span> %title' ); ?></span>
					<span class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '>>', 'Next post link', 'twentytwelve' ) . '</span>' ); ?></span>
				</nav><!-- .nav-single -->
				<?php get_template_part( 'related', 'single' );?>
				<div class="clear"></div>
				<div class="LoadingContainer" loc="single" cat="<?php echo implode(",",wp_get_post_categories(get_the_ID())); ?>" page="-1">
					<span id="loadMorePost">Tải thêm.</span>
					<span id="loadingMorePost" style="display: none;"><img src="http://muatocroi.com/wp-content/themes/thirteen/img/loading.gif" />Đang tải...</span>
				</div>
				<div class="clear"></div>
				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() )
						comments_template( '', true );
				?>

			<?php endwhile; // end of the loop. ?>
		</div><!-- #content -->
	</div><!-- #primary -->
<?php get_sidebar(); ?>
	<script async  src="<?php echo The_Asset_Link(); ?>/scrollLoad_single.js" type="text/javascript"></script>
	<link rel='stylesheet' id='twentytwelve-style-css'  href='http://muatocroi.com/wp-content/themes/thirteen/controlBar.css' type='text/css' media='all' />
<?php get_footer(); ?>