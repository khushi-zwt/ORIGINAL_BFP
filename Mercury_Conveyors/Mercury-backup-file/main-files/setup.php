<?php 
// Admin .css file.
function admin_style() {
    wp_enqueue_style('admin-styles', get_template_directory_uri().'/admin.css');
}
add_action('admin_enqueue_scripts', 'admin_style');

// Enable featured images on posts and pages.

// add_theme_support('post-thumbnails', array(
//   'post',
//   'page',
// ));
function add_post_thumb_support(){
	add_theme_support('post-thumbnails', array(
	  'post',
	  'page',
	  'product',
	  'case-study',
	));
  }
  
  add_action('after_setup_theme', 'add_post_thumb_support');
// Add excerpt to default page type.
function add_excerpts() {
  add_post_type_support('page','excerpt');
}
add_action('init','add_excerpts');

// Custom Menus
function add_menu_support(){
  register_nav_menus( array(
    'menu' => 'Menu',
	'footer' => 'Footer',
  ));
}
add_action( 'after_setup_theme', 'add_menu_support' );

// Remove unused functions.
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'feed_links', 2 );
remove_action( 'wp_head', 'index_rel_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'feed_links_extra', 3 );
remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 );
remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
// Remove comments.
add_action( 'admin_menu', 'my_remove_admin_menus' );
function my_remove_admin_menus() {
    remove_menu_page( 'edit-comments.php' );
}
add_action('init', 'remove_comment_support', 100);
function remove_comment_support() {
    remove_post_type_support( 'post', 'comments' );
    remove_post_type_support( 'page', 'comments' );
}
function mytheme_admin_bar_render() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('comments');
}
add_action( 'wp_before_admin_bar_render', 'mytheme_admin_bar_render' );

// Remove tags from default post type.
add_action('init', 'my_register_post_tags');
function my_register_post_tags() {
    register_taxonomy('post_tag', array('cpt'));
}

// Replace Gravatar with custom profile picture function.
add_filter('get_avatar', 'tsm_acf_profile_avatar', 10, 5);
function tsm_acf_profile_avatar( $avatar, $id_or_email, $size, $default, $alt ) {
    $user = '';

    // Get user by id or email
    if ( is_numeric( $id_or_email ) ) {
        $id   = (int) $id_or_email;
        $user = get_user_by( 'id' , $id );
    } elseif ( is_object( $id_or_email ) ) {
        if ( ! empty( $id_or_email->user_id ) ) {
            $id   = (int) $id_or_email->user_id;
            $user = get_user_by( 'id' , $id );
        }
    } else {
        $user = get_user_by( 'email', $id_or_email );
    }
    if ( ! $user ) {
        return $avatar;
    }
    // Get the user id
    $user_id = $user->ID;
    // Get the file id
    $image_id = get_user_meta($user_id, 'profile_picture', true); // CHANGE TO YOUR FIELD NAME
    // Bail if we don't have a local avatar
    if ( ! $image_id ) {
        return $avatar;
    }
    // Get the file size
    $image_url  = wp_get_attachment_image_src( $image_id, 'thumbnail' ); // Set image size by name
    // Get the file url
    $avatar_url = $image_url[0];
    // Get the img markup
    $avatar = '<img alt="' . $alt . '" src="' . $avatar_url . '" class="avatar avatar-' . $size . '" height="' . $size . '" width="' . $size . '"/>';
    // Return our new avatar
    return $avatar;
}

/* wp icon function start */
function wp_icon( $wp_icon, $classes="", $width="", $height="" ) {
ob_start();
    $context = stream_context_create(
        array(
            "http" => array(
                "header" => "User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36"
            )
        )
    );
    $wp_iconSVG = file_get_contents( $wp_icon , false, $context);
    $dom = new DOMDocument();
    @$dom->loadHTML($wp_iconSVG);
    foreach($dom->getElementsByTagName('svg') as $element) {
        if( !empty( $classes ) ){
            $element->setAttribute('class', $classes );
        }
        if( !empty( $width ) ){
            $element->setAttribute('width', $width );
        }
        if( !empty( $height ) ){
            $element->setAttribute('height', $height );
        }
    }
    $dom->saveHTML();
    $wp_iconSVG = $dom->saveHTML();
    echo $wp_iconSVG;
return ob_get_clean();
}
/* wp icon function end */


/**
 * Social sharing short-code
 */
function social_share( $atts = array(), $content = null ) {
	// set up default parameters
	$share_atts = shortcode_atts([
		'post_id'    => '',
		'show_title' => ''
	], $atts);
  
	if(is_single()){
		$share_atts['post_id'] = get_the_ID();
	}
  
	$share_title           = get_field('social_share_title','option');

	$content               = '';
	$content               .= '<div class="social-icon-wrapper">';

	if(!empty($share_title)) {
		$content .= "<span>";
		$content .= $share_title;
		$content .= "</span>";
	}

	//Repeater for Social Share
	if( have_rows('social_sharing', 'option') ){
		while( have_rows('social_sharing', 'option') ) { the_row();
			
			$social_links            = get_sub_field('social_share', 'option');
			$share_link              = '"'.wp_http_validate_url($social_links['value'] . get_the_permalink($share_atts['post_id'])).'"';

			$content .= "<a onclick='openPopup(". $share_link .")'>
				<i class=icon-" .sanitize_title($social_links['label']). ">";
					$content .="</i>
				</a>";
		}
	}
	$content .="</div>";
	return $content;
  }
  add_shortcode('share_posts', 'social_share');
