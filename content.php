<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
	<article <?php if ( is_single() ){echo 'itemscope itemtype="http://schema.org/Article"'; post_class();} else { post_class("WhiteBG"); } ?> id="post-<?php the_ID(); ?>">
		<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
		<div class="featured-post">
			<?php _e( 'Featured post', 'twentytwelve' ); ?>
		</div>
		<?php endif; ?>
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
			<?php if ( is_single() ) : ?>
			<h1  class="entry-title" itemprop="name"><?php the_title(); ?></h1>
			<?php else : ?>
			 <div class='container'>
				<img class="wp-post-image" title="Minh họa truyện ngắn <?php the_title(); ?>" alt="<?php the_title(); ?>" src="http://muatocroi.com/wp-content/themes/thirteen/timthumb.php?src=<?php echo $image_src; ?>&amp;w=620&amp;h=300&amp;q=100&amp;s=1">
				<h2 class="entry-title caption">
					<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'twentytwelve' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
				</h2>
			</div>
			<?php endif; // is_single() ?>
		</header><!-- .entry-header -->

		<?php if ( is_search() ) : // Only display Excerpts for Search ?>
		<div class="entry-summary">
			<?php wpe_excerpt('wp_excerptlength_long'); ?>
		</div><!-- .entry-summary -->
		<?php else : ?>
		<div class="entry-content" <?php if ( is_single() ) echo 'itemprop="articleBody"'; ?> >
			
			<?php if ( is_single() ) : ?>
				<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentytwelve' ) ); ?>
			<?php else : ?>
				<?php wpe_excerpt('wp_excerptlength_long'); ?>
			<?php endif; // is_single() ?>

			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'twentytwelve' ), 'after' => '</div>' ) ); ?>
			<?php if ( is_single() ) : ?>
				<hr />
				<iframe class="wp-post-image" width="100%" height="400" src="//www.youtube.com/embed/xNZA7x2i_EQ?rel=0" frameborder="0" allowfullscreen></iframe>
				<hr />
				<form action="http://senviet.us3.list-manage.com/subscribe/post?u=970f4571c2ca02635d836cf60&amp;id=a7f1b530c6" method="post" target="_blank">
					<p>Để Mùa Tóc Rối thông báo cho bạn khi có truyện hay được đăng, hãy nhập email của bạn vào đây, ấn "Đăng ký", sau đó vào email để xác nhận nhé.</p>
					<div class="inputfield">
						<input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" placeholder="Nhập Email của bạn vào đây">
						<input type="submit" value="Đăng ký" name="subscribe" id="mc-embedded-subscribe" class="button">
					</div>
				</form>
				<hr />
			<?php endif; ?>
		</div><!-- .entry-content -->
		<?php endif; ?>
	<?php if ( is_singular() && is_multi_author() ) : // If a user has filled out their description and this is a multi-author blog, show a bio on their entries. ?>		
		<footer class="entry-meta">
			<?php twentytwelve_entry_meta(); ?>
			<?php edit_post_link( __( 'Edit', 'twentytwelve' ), '<span class="edit-link">', '</span>' ); ?>
				<div class="author-info">
					<a class="hidden" href="https://plus.google.com/110320079768595023434?rel=author">Nguyễn Văn Được</a>
					<div class="author-avatar">
						<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'twentytwelve_author_bio_avatar_size', 68 ) ); ?>
					</div><!-- .author-avatar -->
					<div class="author-description">
						<h2><?php printf( __( 'Đăng bởi %s', 'twentytwelve' ), get_the_author() ); ?></h2>
						<p><?php the_author_meta( 'description' ); ?></p>
						<div class="author-link">
							<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
								<?php printf( __( 'Xem toàn bộ truyện của %s <span class="meta-nav">&rarr;</span>', 'twentytwelve' ), get_the_author() ); ?>
							</a>
						</div><!-- .author-link	-->
					</div><!-- .author-description -->
				</div><!-- .author-info -->
				<!--Danh Gia-->
				<span class="hidden">
				    <div itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">
				        <span itemprop="ratingValue">5</span>
				        <span itemprop="ratingCount"><?php echo str_word_count(get_the_title()); ?></span>
				    </div>
				</span>
				<!-- End Danh gia -->
		</footer><!-- .entry-meta -->
	<?php endif; ?>
	</article><!-- #post -->