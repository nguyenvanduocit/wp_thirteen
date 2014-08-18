<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>
	<div id="primary" class="site-content">
		<div id="content" role="main">
			<article class='WhiteBG post type-post status-publish format-standard hentry'>
				<header class="entry-header">
					<iframe class="wp-post-image" width="100%" height="400" src="//www.youtube.com/embed/xNZA7x2i_EQ?rel=0" frameborder="0" allowfullscreen></iframe>
				</header>
				<div class='entry-content'>
				<p>
				Ngoài trời bão tố, thương lắm đôi vai gầy. Anh vẫn bình yên phải không? Trong chiêm bao em thấy anh sừng sững kiên trung giữa đầu sóng ngọn gió, canh giữ biển đảo quê hương. Những khi anh ở bên em, trong những ngày bão tố này, em sẽ chìm sâu vào giấc ngủ, trong vòng tay anh. Khi có anh ở bên, mưa gió ngoài kia không còn đáng sợ nữa. Đêm nay không có trăng, những vì sao cũng trốn đi đâu mất, chỉ có bầu trời vần vũ mây giông. Có một người chỉ biết nhắm mắt nguyện cầu cho một người ở nơi ấy. Em không hiểu mình đã vượt qua những đêm cô đơn như thế bằng cách nào. Nhưng em biết rằng khi một nửa thế giới chìm sâu trong giấc ngủ thì vẫn có những người phải thức, thức để canh gác cho những giấc ngủ an lành. “Ngày từ đêm trắng sinh ra” phải không anh? Nhiều lúc em ngây ngô tự hỏi, cùng hít thở dưới một bầu trời, cùng ngắm một vầng trăng ấy, mà sao em không thể nhìn thấy anh?<br><i>Số radio thuộc về blogviet.com.vn, Được mùa tóc rối biên tập lại video</i>
				</p>
				</div>
			</article>
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', get_post_format() ); ?>
			<?php endwhile; ?>

			<?php //twentytwelve_content_nav( 'nav-below' ); ?>
			<?php if (function_exists('wp_corenavi')) wp_corenavi(); ?>

		<?php else : ?>

			<article id="post-0" class="post no-results not-found">

			<?php if ( current_user_can( 'edit_posts' ) ) :
				// Show a different message to a logged-in user who can add posts.
			?>
				<header class="entry-header">
					<h1 class="entry-title"><?php _e( 'No posts to display', 'twentytwelve' ); ?></h1>
				</header>

				<div class="entry-content">
					<p><?php printf( __( 'Ready to publish your first post? <a href="%s">Get started here</a>.', 'twentytwelve' ), admin_url( 'post-new.php' ) ); ?></p>
				</div><!-- .entry-content -->

			<?php else :
				// Show the default message to everyone else.
			?>
				<header class="entry-header">
					<h1 class="entry-title"><?php _e( 'Nothing Found', 'twentytwelve' ); ?></h1>
				</header>

				<div class="entry-content">
					<p><?php _e( 'Apologies, but no results were found. Perhaps searching will help find a related post.', 'twentytwelve' ); ?></p>
					<?php get_search_form(); ?>
				</div><!-- .entry-content -->
			<?php endif; // end current_user_can() check ?>

			</article><!-- #post-0 -->

		<?php endif; // end have_posts() check ?>

		</div><!-- #content -->
		<div class="clear"></div>
		<div class="LoadingContainer" loc="index" page="<?php echo get_query_var('paged'); ?>">
			<span id="loadMorePost">Tải thêm</span>
			<span id="loadingMorePost" style="display: none;">
				<img src="http://muatocroi.com/wp-content/themes/thirteen/img/loading.gif" /> Đang tải...
			</span>
		</div>
		<div class="clear"></div>
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<script src="<?php echo The_Asset_Link(); ?>/scrollLoad.js" type="text/javascript"></script>
<!--script src="<?php echo The_Asset_Link(); ?>/facebookWallPost.js" type="text/javascript"></script-->
<?php get_footer(); ?> 