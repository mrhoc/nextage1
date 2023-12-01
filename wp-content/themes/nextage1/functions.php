<?php
add_action('after_setup_theme', 'blankslate_setup');
function blankslate_setup()
{
	load_theme_textdomain('blankslate', get_template_directory() . '/languages');
	add_theme_support('title-tag');
	add_theme_support('post-thumbnails');
	add_theme_support('responsive-embeds');
	add_theme_support('automatic-feed-links');
	add_theme_support('html5', array('search-form', 'navigation-widgets'));
	add_theme_support('woocommerce');
	global $content_width;
	if (!isset($content_width)) {
		$content_width = 1920;
	}
	register_nav_menus(array('main-menu' => esc_html__('Main Menu', 'blankslate')));
}

add_action('wp_enqueue_scripts', 'blankslate_enqueue');
function blankslate_enqueue()
{
	wp_enqueue_style('blankslate-style', get_stylesheet_uri());
	wp_enqueue_script('jquery');
}

add_action('wp_footer', 'blankslate_footer');
function blankslate_footer()
{
	?>
	<script>
        jQuery(document).ready(function ($) {
            var deviceAgent = navigator.userAgent.toLowerCase();
            if (deviceAgent.match(/(iphone|ipod|ipad)/)) {
                $("html").addClass("ios");
                $("html").addClass("mobile");
            }
            if (deviceAgent.match(/(Android)/)) {
                $("html").addClass("android");
                $("html").addClass("mobile");
            }
            if (navigator.userAgent.search("MSIE") >= 0) {
                $("html").addClass("ie");
            } else if (navigator.userAgent.search("Chrome") >= 0) {
                $("html").addClass("chrome");
            } else if (navigator.userAgent.search("Firefox") >= 0) {
                $("html").addClass("firefox");
            } else if (navigator.userAgent.search("Safari") >= 0 && navigator.userAgent.search("Chrome") < 0) {
                $("html").addClass("safari");
            } else if (navigator.userAgent.search("Opera") >= 0) {
                $("html").addClass("opera");
            }
        });
	</script>
	<?php
}

add_filter('document_title_separator', 'blankslate_document_title_separator');
function blankslate_document_title_separator($sep)
{
	$sep = esc_html('|');
	return $sep;
}

add_filter('the_title', 'blankslate_title');
function blankslate_title($title)
{
	if ($title == '') {
		return esc_html('...');
	} else {
		return wp_kses_post($title);
	}
}


if (!function_exists('blankslate_wp_body_open')) {
	function blankslate_wp_body_open()
	{
		do_action('wp_body_open');
	}
}

add_filter('big_image_size_threshold', '__return_false');
add_filter('intermediate_image_sizes_advanced', 'blankslate_image_insert_override');
function blankslate_image_insert_override($sizes)
{
	unset($sizes['medium_large']);
	unset($sizes['1536x1536']);
	unset($sizes['2048x2048']);
	return $sizes;
}

add_action('widgets_init', 'blankslate_widgets_init');
function blankslate_widgets_init()
{
	register_sidebar(array(
		'name' => esc_html__('Sidebar Widget Area', 'blankslate'),
		'id' => 'primary-widget-area',
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));
}


function custom_post_type_pagination() {
	global $wp_query;

	$total_pages = $wp_query->max_num_pages;
	$current_page = max(1, get_query_var('paged'));

	if ($total_pages > 1) {
		echo '<ul class="pagination">';

		// Link trang trước
		if ($current_page > 1) {
			echo '<li><a href="' . get_pagenum_link($current_page - 1) . '"> < </a></li>';
		}

		// Liên kết các trang
		for ($i = 1; $i <= $total_pages; $i++) {
			if ($i == $current_page) {
				echo '<li class="PagerOtherPageCells active"><a class="ModulePager" href="' . get_pagenum_link($i) . '">' . $i . '</a></li>';
			} else {
				echo '<li class="PagerOtherPageCells"><a class="ModulePager" href="' . get_pagenum_link($i) . '">' . $i . '</a></li>';
			}
		}

		// Liên kết trang tiếp theo
		if ($current_page < $total_pages) {
			echo '<li class="PagerOtherPageCells"><a href="' . get_pagenum_link($current_page + 1) . '"> > </a></li>';
		}

		echo '</ul>';
	}
}

// Hàm ngăn chặn WordPress tự động thêm dấu gạch chéo cuối cùng vào URL
function remove_trailing_slash($string) {
	if (is_feed()) {
		return $string;
	} else {
		return untrailingslashit($string);
	}
}

// Áp dụng hàm cho các hook
add_filter('user_trailingslashit', 'remove_trailing_slash');
add_filter('redirect_canonical', 'remove_trailing_slash');
