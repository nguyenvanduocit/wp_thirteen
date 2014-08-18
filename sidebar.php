<?php
/**
 * The sidebar containing the main widget area.
 *
 * If no active widgets in sidebar, let's hide it completely.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>

	<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
		<div id="secondary" class="widget-area" role="complementary">
			<div id="floatsidebar">
				<aside class="widget widget_text">
					<gcse:search></gcse:search>
				</aside>
				<aside class="widget widget_text">
					<!--a href="https://chrome.google.com/webstore/detail/t%C3%B3c-r%E1%BB%91i-express/gjcdncepeoieojjfhpalkhhmcfmodeii" title="Tóc Rối Express" target="_blank"><img width="100%" src="http://image-static-mtr.appspot.com/tocroiexpress.jpg" alt="Tóc Rối Express"/></a-->
				<?php if (is_user_logged_in() ): ?>
					<a href="http://muatocroi.com/wp-admin/post-new.php" title="Gửi bài viết cộng tác" target="_blank"><img width="100%" src="http://image-static-mtr.appspot.com/dangbai.jpg" alt="Gửi bài viết cộng tác"/></a>
				<?php else: ?>
					<a href="http://muatocroi.com/cong-tac-vien/" title="Mời cộng tác viên" target="_blank"><img width="100%" src="http://image-static-mtr.appspot.com/moiCongtac.jpg" alt="Mời cộng tác viên"/></a>
				<?php endif; ?>
				</aside>
				<?php if(is_single()): ?>
				<aside class="widget widget_text">
					<form class="mailletterForm" action="http://senviet.us3.list-manage.com/subscribe/post?u=970f4571c2ca02635d836cf60&amp;id=a7f1b530c6" method="post" target="_blank"><p>Để Mùa Tóc Rối thông báo cho bạn khi có truyện hay được đăng, hãy nhập email của bạn vào đây, ấn "Đăng ký", sau đó vào email để xác nhận nhé.</p><input placeholder="Nhập email của bạn" type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL"><input type="submit" value="Đăng ký" name="subscribe" id="mc-embedded-subscribe" class="button"></form>
				</aside>
				<?php endif;?>
				<?php if(is_single())
				{
					get_template_part('sidebar-single');
					dynamic_sidebar( 'sidebar-1' );
				}
				else
				{
					get_template_part('sidebar-related');
					dynamic_sidebar( 'sidebar-1' );
				}
				get_template_part('sidebar-quote');
				?>
				<aside class="widget widget_text">
					<h3 class="widget-title">Chuyên trang của Mùa Tóc Rối</h3>
					<ul class="nomarginList">
						<li class="nomarginLi recentcomments"><a rel="external" title="Danh ngôn" href="http://danhngon.muatocroi.com">Danh ngôn</a> : Website về danh ngôn</li>
						<li class="nomarginLi recentcomments"><a rel="external" title="Tóc Rối trên youtube" href="https://www.youtube.com/user/muatocroichannel">Tóc Rối trên youtube</a> : Kênh video</li>
						<li class="nomarginLi recentcomments"><a rel="external" title="Lập trình Sen Việt" href="http://laptrinh.senviet.org">Lập trình Sen Việt</a> : Chuyên trang lập trình</li>
						<li class="nomarginLi recentcomments"><a rel="external" title="Nhiếp Ảnh Sen Việt" href="http://nhiepanh.senviet.org">Nhiếp Ảnh Sen Việt</a> : Hội nhiếp ảnh</li>
					</ul>
				</aside>
				<aside class="widget widget_text">
					<h3 class="widget-title">Các website bạn bè</h3>
					<ul class="nomarginList">
						<li class="nomarginLi recentcomments"><a rel="external" title="Vì đạo thiên" href="http://vidaothieng.com">Vì Đạo Thiên</a><span class="websiteDes"> : công ty Pháp Quang</span></li>
						<li class="nomarginLi recentcomments"><a rel="external" title="Hoàng Yến Anh" href="http://bloghoangyenanh.com/">Hoàng Yến Anh</a><span class="websiteDes"> : Blog của Hoàng Yến Anh</span></li>
						<li class="nomarginLi recentcomments"><a rel="external" title="Gối Yêu | Góc nhỏ của những vui buồn, tình yêu và đam mê" href="http://goiyeu.net">Gối Yêu</a><span class="websiteDes"> : Website truyện về tình yêu</span></li>
						<li class="nomarginLi recentcomments"><a rel="external" title="Góc suy ngẫm" href="http://gocsuyngam.com">Góc suy ngẫm</a><span class="websiteDes"> : Website truyện ngắn</span></li>
						<li class="nomarginLi recentcomments"><a rel="external" title="Bình Minh Mưa" href="http://www.bmmua.com">Bình Minh Mưa</a><span class="websiteDes"> : Website truyện và thơ</span></li>
						<li class="nomarginLi recentcomments"><a rel="external" title="Góc trái tim" href="http://www.goctraitim.vn/">Góc trái tim</a><span class="websiteDes"> : Câu nói, lời chúc ý nghĩa</span></li>
						<li class="nomarginLi recentcomments"><a rel="external" href="http://nguyetkim.com/" title="Blog của Nguyệt Kim">Nguyệt Kim</a><span class="websiteDes"> : Tác giả Nguyệt Kim</span></li>
						<li class="nomarginLi recentcomments"><a rel="external" href="http://chiptran.com/" title="Blog của Chip tran">Chip Trần</a><span class="websiteDes"> : Tác giả Chíp Trần</span></li>
					</ul>
				</aside>
				<div class="clear"></div>
			</div>
		</div><!-- #secondary -->
	<?php endif; ?>