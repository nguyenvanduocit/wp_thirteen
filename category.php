<?php
/**
 * The template for displaying Category pages.
 *
 * Used to display archive-type pages for posts in a category.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

	<section id="primary" class="site-content">
		<div id="content" role="main">

		<?php if ( have_posts() ) : ?>
			<header class="archive-header">
				<h1 class="archive-title"><?php printf( __( '%s', 'twentytwelve' ), '<span>' . single_cat_title( '', false ) . '</span>' ); ?></h1>

			<?php if ( category_description() ) : // Show an optional category description ?>
				<div class="archive-meta"><?php echo category_description(); ?></div>
			<?php endif; ?>
			</header><!-- .archive-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/* Include the post format-specific template for the content. If you want to
				 * this in a child theme then include a file called called content-___.php
				 * (where ___ is the post format) and that will be used instead.
				 */
				get_template_part( 'content', get_post_format() );

			endwhile;

			//twentytwelve_content_nav( 'nav-below' );
			if (function_exists('wp_corenavi')) wp_corenavi();
			?>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>

		</div><!-- #content -->
		<div class="clear"></div>
		<div class="LoadingContainer" loc="category" cat="<?php echo get_query_var('cat'); ?>" page="<?php echo get_query_var('paged'); ?>">
			<span id="loadMorePost">Tải thêm truyện ngắn, còn cả đống</span>
			<span id="loadingMorePost" style="display: none;">
				<img src="http://muatocroi.com/wp-content/themes/thirteen/img/loading.gif" /> Đang tải...
			</span>
		</div>
		<div class="clear"></div>
	</section><!-- #primary -->

<?php get_sidebar(); ?>
<script src="<?php echo The_Asset_Link(); ?>/scrollLoad.js" type="text/javascript"></script>
<?php get_footer(); ?>