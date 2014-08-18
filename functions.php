<?php
function The_Asset_Link()
{
	if(false)
	{
		echo "http://script-static-mtr.appspot.com";
	}
	else
	{
		echo "http://muatocroi.com/wp-content/themes/thirteen/js";
	}
}
function thirteen_theme_setup() 
{
	set_post_thumbnail_size( 9999, 9999 ); // Unlimited
}

add_action( 'after_setup_theme', 'thirteen_theme_setup' );
function wp_excerptlength_related($length) {
    
    return 45;
}

function wp_excerptlength_long($length) {
	return 120;
}

function wpe_excerpt( $length_callback = '', $more_callback = '' ) {
    
    if ( function_exists( $length_callback ) )
        add_filter( 'excerpt_length', $length_callback );
    
    if ( function_exists( $more_callback ) )
        add_filter( 'excerpt_more', $more_callback );
    
    $output = get_the_excerpt();
    //$output = apply_filters( 'wptexturize', $output );
    //$output = apply_filters( 'convert_chars', $output );
    $output = '<p>' . $output . '</p>'; // maybe wpautop( $foo, $br )
    echo $output;
}

function wp_corenavi() {
	global $wp_query, $wp_rewrite;
	$pages = '';
	$max = $wp_query->max_num_pages;
	if (!$current = get_query_var('paged')) $current = 1;
	$a['base'] = ($wp_rewrite->using_permalinks()) ? user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'page/%#%/', 'paged' ) : @add_query_arg('paged','%#%');
	if( !empty($wp_query->query_vars['s']) ) $a['add_args'] = array( 's' => get_query_var( 's' ) );
	$a['total'] = $max;
	$a['current'] = $current;

	$total = 1; //1 - display the text "Page N of N", 0 - not display
	$a['mid_size'] = 5; //how many links to show on the left and right of the current
	$a['end_size'] = 1; //how many links to show in the beginning and end
	$a['prev_text'] = '&laquo;'; //text of the "Previous page" link
	$a['next_text'] = '&raquo;'; //text of the "Next page" link

	if ($max > 1)
	echo '<div class="wp-pagenavi">';
	if ($total == 1 && $max > 1) 
	$pages = '<span class="pages">Trang ' . $current . '/' . $max . ' : </span>'."\r\n";
	echo $pages . paginate_links($a);
	if ($max > 1) 
	echo '</div>';
}

function twentytwelve_entry_meta() {
	// Translators: used between list items, there is a space after the comma.
	$categories_list = get_the_category_list( __( ', ', 'twentytwelve' ) );

	// Translators: used between list items, there is a space after the comma.
	$tag_list = get_the_tag_list( '', __( ', ', 'twentytwelve' ) );

	$date = sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date updated" itemprop="datePublished" datetime="%3$s">%4$s</time></a>',
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
	);

	$author = sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'twentytwelve' ), get_the_author() ) ),
		get_the_author()
	);

	// Translators: 1 is category, 2 is tag, 3 is the date and 4 is the author's name.
	if ( $tag_list ) {
		$utility_text = __( 'This entry was posted in %1$s and tagged %2$s on %3$s<span class="by-author"> by %4$s</span>.', 'twentytwelve' );
	} elseif ( $categories_list ) {
		$utility_text = __( 'This entry was posted in %1$s on %3$s<span class="by-author"> by %4$s</span>.', 'twentytwelve' );
	} else {
		$utility_text = __( 'This entry was posted on %3$s<span class="by-author"> by %4$s</span>.', 'twentytwelve' );
	}

	printf(
		$utility_text,
		$categories_list,
		$tag_list,
		$date,
		$author
	);
}

/////////
function dimox_breadcrumbs() {  
  
    /* === OPTIONS === */  
    $text['home']     = 'Trang chủ'; // text for the 'Home' link  
    $text['category'] = 'Truyện ngắn hay nhất về "%s"'; // text for a category page  
    $text['search']   = 'Search Results for "%s" Query'; // text for a search results page  
    $text['tag']      = 'Posts Tagged "%s"'; // text for a tag page  
    $text['author']   = 'Articles Posted by %s'; // text for an author page  
    $text['404']      = 'Error 404'; // text for the 404 page  
  
    $showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show  
    $showOnHome  = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show  
    $delimiter   = ''; // delimiter between crumbs  
    $before      = '<li class="current">'; // tag before the current crumb  
    $after       = '</li>'; // tag after the current crumb  
    /* === END OF OPTIONS === */  
  
    global $post;  
    $homeLink = get_bloginfo('url') . '/';  
    $linkBefore = '<li typeof="v:Breadcrumb">';  
    $linkAfter = '</li>';  
    $linkAttr = ' rel="v:url" property="v:title"';  
    $link = $linkBefore . '<a' . $linkAttr . ' href="%1$s">%2$s</a>' . $linkAfter;  
  
    if (is_home() || is_front_page()) {  
  
        if ($showOnHome == 1) echo '<div class="breadcrumb"><ul id="breadcrumbs-one"><a href="' . $homeLink . '">' . $text['home'] . '</a></ul></div>';  
  
    } else {  
  
        echo '<div class="breadcrumb" xmlns:v="http://rdf.data-vocabulary.org/#"><ul id="breadcrumbs-one">' . sprintf($link, $homeLink, $text['home']) . $delimiter;  
  
        if ( is_category() ) {  
            $thisCat = get_category(get_query_var('cat'), false);  
            if ($thisCat->parent != 0) {  
                $cats = get_category_parents($thisCat->parent, TRUE, $delimiter);  
                $cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);  
                $cats = str_replace('</a>', '</a>' . $linkAfter, $cats);  
                echo $cats;  
            }  
            echo $before . sprintf($text['category'], single_cat_title('', false)) . $after;  
  
        } elseif ( is_search() ) {  
            echo $before . sprintf($text['search'], get_search_query()) . $after;  
  
        } elseif ( is_day() ) {  
            echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;  
            echo sprintf($link, get_month_link(get_the_time('Y'),get_the_time('m')), get_the_time('F')) . $delimiter;  
            echo $before . get_the_time('d') . $after;  
  
        } elseif ( is_month() ) {  
            echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;  
            echo $before . get_the_time('F') . $after;  
  
        } elseif ( is_year() ) {  
            echo $before . get_the_time('Y') . $after;  
  
        } elseif ( is_single() && !is_attachment() ) {  
            if ( get_post_type() != 'post' ) {  
                $post_type = get_post_type_object(get_post_type());  
                $slug = $post_type->rewrite;  
                printf($link, $homeLink . '/' . $slug['slug'] . '/', $post_type->labels->singular_name);  
                if ($showCurrent == 1) echo $before.get_the_title().$after;
            } else {  
                $cat = get_the_category(); $cat = $cat[0];  
                $cats = get_category_parents($cat, TRUE, $delimiter);  
                if ($showCurrent == 0) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);  
                $cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);  
                $cats = str_replace('</a>', '</a>' . $linkAfter, $cats);  
                echo $cats;  
                if ($showCurrent == 1) echo $before.get_the_title().$after;
            }  
  
        } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {  
            $post_type = get_post_type_object(get_post_type());  
            echo $before . $post_type->labels->singular_name . $after;  
  
        } elseif ( is_attachment() ) {  
            $parent = get_post($post->post_parent);  
            $cat = get_the_category($parent->ID); $cat = $cat[0];  
            $cats = get_category_parents($cat, TRUE, $delimiter);  
            $cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);  
            $cats = str_replace('</a>', '</a>' . $linkAfter, $cats);  
            echo $cats;  
            printf($link, get_permalink($parent), $parent->post_title);  
            if ($showCurrent == 1) echo $delimiter . $before . get_the_title() . $after;  
  
        } elseif ( is_page() && !$post->post_parent ) {  
            if ($showCurrent == 1) echo $before . get_the_title() . $after;  
  
        } elseif ( is_page() && $post->post_parent ) {  
            $parent_id  = $post->post_parent;  
            $breadcrumbs = array();  
            while ($parent_id) {  
                $page = get_page($parent_id);  
                $breadcrumbs[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));  
                $parent_id  = $page->post_parent;  
            }  
            $breadcrumbs = array_reverse($breadcrumbs);  
            for ($i = 0; $i < count($breadcrumbs); $i++) {  
                echo $breadcrumbs[$i];  
                if ($i != count($breadcrumbs)-1) echo $delimiter;  
            }  
            if ($showCurrent == 1) echo $delimiter . $before . get_the_title() . $after;  
  
        } elseif ( is_tag() ) {  
            echo $before . sprintf($text['tag'], single_tag_title('', false)) . $after;  
  
        } elseif ( is_author() ) {  
            global $author;  
            $userdata = get_userdata($author);  
            echo $before . sprintf($text['author'], $userdata->display_name) . $after;  
  
        } elseif ( is_404() ) {  
            echo $before . $text['404'] . $after;  
        }  
  
        if ( get_query_var('paged') ) {  
            if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';  
            echo __('Page') . ' ' . get_query_var('paged');  
            if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';  
        }  
  
        echo '</ul></div>';  
  
    }  
}
// end dimox_breadcrumbs()
function StyleByCat()
{
    
    $styleTemplate = '<style type="text/css" media="screen">%s</style>';
    $output = "";
    $baseURl = get_stylesheet_directory_uri();
    $categories = get_the_category();

    switch ($categories[0]->category_nicename)
    {
        case "gia-dinh":
            echo(sprintf($styleTemplate,'body {background: url('.$baseURl.'/img/BGbuddha.jpg) repeat fixed !important;}'));
            break;
    }

    echo $output;

}
function __my_registration_redirect()
{
    return home_url( '/about/loi-cam-on/dang-ky-thanh-cong/' );
}
add_filter( 'registration_redirect', '__my_registration_redirect' );

function add_register_field() { ?>
    <p>
        <label><?php _e('Có thành phố nào tên là Hồ Chí Minh ở Việt Nam hay không ? ( trả lời "co" hoặc "khong" )') ?><br />
        <input type="text" name="user_proof" id="user_proof" class="input" size="25" tabindex="20" /></label>
    </p>
<?php }
 add_action( 'register_form', 'add_register_field' );

function add_register_field_validate( $sanitized_user_login, $user_email, $errors) {
    if (!isset($_POST[ 'user_proof' ]) || empty($_POST[ 'user_proof' ])) {
        return $errors->add( 'proofempty', '<strong>ERROR</strong>: Bạn không trả lời câu hỏi này thì không thể đăng ký được.'  );
    } elseif ( strtolower( $_POST[ 'user_proof' ] ) != 'co' ) {
        return $errors->add( 'prooffail', '<strong>ERROR</strong>: Bạn không trả lời đúng câu hỏi này thì không thể đăng ký được.'  );
    }
}
add_action( 'register_post', 'add_register_field_validate', 10, 3 );

function headerByTime()
{
    $h = date('G');
    $image = "header0.jpg";
    if ($h >= 0 && $h <= 3) {
        $image = "header1.jpg";
    } else if ($h >= 4 && $h <= 7) {
        $image = "header2.jpg";
    } else if ($h >= 8 && $h <= 11) {
        $image = "header3.jpg";
    } else if ($h >= 12 && $h <= 15) {
        $image = "header4.jpg";
    } else if ($h >= 16 && $h <= 19) {
        $image = "header5.jpg";
    } else if ($h >= 20 && $h <= 23) {
        $image = "header6.jpg";
    }
    return "http://image-static-mtr.appspot.com/header/{$image}";
}

function admin_message_dashboard_widgets() {
    global $wp_meta_boxes;

    wp_add_dashboard_widget('admin_message_widget', 'Admin message', 'admin_dashboard_message');
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
    // Get the regular dashboard widgets array 
    // (which has our new widget already but at the end)
    $normal_dashboard = $wp_meta_boxes['dashboard']['normal']['core'];
    // Backup and delete our new dashboard widget from the end of the array
    $example_widget_backup = array( 'admin_message_widget' => $normal_dashboard['admin_message_widget'] );
    unset( $normal_dashboard['admin_message_widget'] );

    // Merge the two arrays together so our widget is at the beginning
    $sorted_dashboard = array_merge( $example_widget_backup, $normal_dashboard );
    // Save the sorted array back into the original metaboxes 
    $wp_meta_boxes['dashboard']['normal']['core'] = $sorted_dashboard;
}

function admin_dashboard_message() {
    global $userdata;
    get_currentuserinfo();
    if( ($userdata->user_login == "dangoanha2") || ( $userdata->user_login == "admin" ) ) 
    {
        echo '<p>Xin chào <strong>'.$userdata->display_name.'</strong></p><p>Dưới đây là bản phân công chủ đề của '.$userdata->display_name.', hãy luôn vui vẻ nhé.</p><p><iframe src="https://docs.google.com/spreadsheet/pub?key=0AqpBty1VMdtjdF9ldjRYQ0RrLWctLWNRTEFtOFcta0E&output=html&widget=true" width="100%" height="165"></iframe><iframe id="f775319f8" name="f18628c36c" scrolling="no" title="Facebook Social Plugin" class="fb_ltr" src="https://www.facebook.com/plugins/comments.php?api_key=113869198637480&channel_url=https%3A%2F%2Fs-static.ak.facebook.com%2Fconnect%2Fxd_arbiter.php%3Fversion%3D28%23cb%3Df1ace6459%26domain%3Ddevelopers.facebook.com%26origin%3Dhttps%253A%252F%252Fdevelopers.facebook.com%252Ffc0a6000c%26relation%3Dparent.parent&colorscheme=light&href=https%3A%2F%2Fdocs.google.com%2Fdocument%2Fd%2F12E9r6Ltexgb1NJFdiP9yPfy1GqEz1NAweALh0h3cmkk&locale=en_US&numposts=5&sdk=joey&skin=light&width=550" style="border: none; overflow: hidden; height: 400px; width: 100%;"></iframe></p>';
    }
}

function modify_footer_admin () {  
  echo 'Email hỗ trợ : <a href="mailto:nguyenvanduocit@gmail.com">nguyenvanduocit@gmail.com</a> | Điện thoại : 0167 297 1234';  
}  
function post_contextual_help( $contextual_help, $screen_id, $screen ) {
    $currentScreen = $screen;
    switch( $screen_id ) {
        case 'post' :
            $currentScreen->remove_help_tabs();

            $currentScreen->add_help_tab( array(
            'id'        => 'my-help-tab-title',
            'title'     => __( 'Trùng lặp' ),
            'content'   => __( '<p>Để tránh trùng lặp bài viết, trước khi đăng bài, bạn cần truy cập vào trang <a href="https://www.google.com.vn/search?q=site%3Amuatocroi.com+keywork" target="_blank">này</a>, thay từ "keyword" bằng tiêu đề của bài viết mà bạn định đăng, kết quả tìm kiếm sẽ cho bạn biết có bài viết nào trùng tiêu đề hay không, nếu có bài trùng tiêu đề, thì bạn cần kiểm tra kỹ xem nội dung của hai bài viết có trùng hay không, nếu nội dung không trùng, bạn hãy đổi tiêu đề của bài viết mà bạn sắp đăng, cho khác với tiêu đề đã có rồi nhé..</p>' )
            ) );

            $currentScreen->add_help_tab( array(
            'id'        => 'my-help-tab-content',
            'title'     => __( 'Nội dung' ),
            'content'   => __( '<p><b>Sao chép nội dung</b> : Khi bạn chép và dán nội dung từ website khác, hoặc từ phần mềm soạn thảo văn bản qua blog này, bạn cần bấm cùng lúc ba phím "ctrl + shift + v".<br/>'.
                                '<b>Ngắn dòng, đoạn</b> : Ngắt dòng bằng phím Shift + enter, ngắt đoạn bằng phím enter.<br/>'.
                                '<b>Màu sắc, font chữ</b> : Dùng font, kích thước, và màu sắc chữ mặc định, nếu lỡ có định dạng khác, thì ấn vào biểu tượng cục gôm để xóa hết định dạng, quay về định dạng mặc định.<br> chỉ dùng in đậm, in nghiên ở những nơi thực sự cần thiết,<br> KHÔNG ĐƯỢC VIẾT IN HOA TOÀN BỘ CÂU. '.'</p>' )
            ) );

            $currentScreen->add_help_tab( array(
            'id'        => 'my-help-tab-image',
            'title'     => __( 'Hình ảnh' ),
            'content'   => __( '<p><b>Chất lượng ảnh</b> : Phải chọn ảnh có chất lượng tốt, có chiều rộng từ 600px trở lên, ảnh không vỡ hạt, không có logo của website khác.<br/>'.
                                '<b>Nội dung ảnh</b> : Cần gần với nội dung của đoạn mà bạn chèn ảnh vào..<br/>'.                           
                                '<b>Cửa sổ upload ảnh</b> :<ul><li>Title : Tiêu đề xác với nội dung ảnh, kèm theo chữ "ảnh" ở phía trước.</li><li>Alt text : là title của ảnh mà không có chữ "ảnh".</li><li>Link to : Chọn là None.</li></ul></p>' )
            ) );

            $currentScreen->add_help_tab( array(
            'id'        => 'my-help-tab-SEO',
            'title'     => __("All in one SEO Pack"),
            'content'   => __( '<p>Phần này dung để giúp người khác dễ tìm ra bài viết của mình trên google, bạn hãy đặt mình vào vị trí của người đang tìm kiếm truyện để điền các giá trị vào trang này.<br>'.
                                '<b>Title</b> : Giống như phần tiêu đề phía trên của bài viết, nhưng có thể chèn vào 1 từ khóa quan trọng nhất của bài viết.<br/>'.
                                '<b>Description</b> : Phần này mô tả ngắn gọn về bài viết, phải kèm theo một từ khóa mà bạn đã đặt ở tiêu đề. Độ dài của phần này không quá 120 ký tự.<br/>'.
                                '<b>Keywords</b> : Phần này giúp google phân loại, và dựa vào đó để tìm ra bài viết của mình, bạn phải đặt mình vào suy nghĩ của người đang tìm kiếm truyện ngắn, xem họ sẽ nghĩ những từ khóa nào, và bạn sẽ điền từ khóa đó vào đây, phải điền vào từ khóa mà bạn đã đặt ở phần title. và phải có liên quan chặt chẽ tới nội dung chính của bài viết.'.'</p>' )
            ) );

            $currentScreen->add_help_tab( array(
            'id'        => 'my-help-tab-featuredimage',
            'title'     => __("Featured image"),
            'content'   => __( '<p>Phần ảnh này sẽ hiển thị ở trang chủ, phía trên bài viết, cũng như sẽ là ảnh hiển thị khi bài viết được share ở facebook.</p>' )
            ) );
            break;
        case 'mi_plugin_page' :
            //Just to modify text of first tab
            $contextual_help .= '<p>';
            $contextual_help = __( 'Your text here.' );
            $contextual_help .= '</p>';
            break;
    }
    $sidebar = '<p><strong>' . __( 'Thông tin trợ giúp:', 'colorbeats_textdomain' ) . '</strong></p>' .
        '<p><a href="mailto:nguyenvanduocit@gmail.com">Gửi mail</a></p>' .
        '<p><a href="http://fb.me/chucbengungon">facebook</a></p>' .
        '<p>(+84) 167 297 1234</p>';

    $screen->set_help_sidebar($sidebar);
    return $contextual_help;
}

function my_login_logo() { ?>
    <style type="text/css">
        body.login div#login h1 a {
            background-image: url(<?php echo home_url( '/wp-content/themes/thirteen/img/login_logo.png' ) ?>);
            background-size: 100%;
            padding-bottom: 0px;
            height: 316px;
            width: auto
        }
        #login {padding: 2% 0 0; margin-bottom: 0}
    </style>
<?php }

if(is_admin())
{
    add_action('wp_dashboard_setup', 'admin_message_dashboard_widgets');
    add_filter('admin_footer_text', 'modify_footer_admin');  
    add_action( 'contextual_help', "post_contextual_help", 10, 3 );
    add_action( 'login_enqueue_scripts', 'my_login_logo' );

}

if(!is_admin())
{

    wp_enqueue_script("jquery");
}