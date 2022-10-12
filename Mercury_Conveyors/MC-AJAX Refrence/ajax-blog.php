<?php
/**
 * Blog [Load more] Ajax Function
 */
function blog_load_more() {
    
    check_ajax_referer( 'blog-load-more-nonce', 'security' );

    $html			= '';

    $post_per_page	= $_POST['posts_per_page'];
    $paged			= $_POST['paged'];

    $paged		    = $paged+1;

    $args = array(
        'post_type'         => 'post',
        'order' 		    => 'DESC',
        'posts_per_page'	=> $post_per_page,
        'paged'				=> $paged,
    );
	
    $query = new WP_Query( $args );

    if ( $query->have_posts() ) {
        $post_count = $query->post_count;
        $found_posts = $query->found_posts;

        $loop = 1;
        while ( $query->have_posts() ) { $query->the_post();
            $title        = get_the_title();
            $content      = get_the_content();
			$link         = get_the_permalink();
            $image        = get_the_post_thumbnail_url(get_the_ID(), 'featured-img-size');
			$image_id     = get_post_thumbnail_id();
			$image_alt    = get_post_meta($image_id, '_wp_attachment_image_alt', TRUE);
			$blog_content = wp_trim_words( get_the_content(), 55, '' );

            if($loop == $post_count){
                if($found_posts > ($post_count*$paged)){
                    if($loop == $post_per_page){
                        $do_load_more = true;
                    }
                }
            }

            // $do_load_more_html='';
			// if($do_load_more) {
			// 	$do_load_more_html = '
			// 		<div class="blog-post-btn">
			// 			<a class="btn" id="blog_load_more_btn" href="javascript:void(0)" data-paged="'.$paged.'">Load More</a>
			// 		</div>';
			// }

            $html.='
			<div class="main-block fifty-fifty-block">
				<div class="left-block">
					<div class="title-content-link">
						<a href="'.$link.'" class="h3">'.$title.'</a>
						'.$content.'
						<a href="'.$link.'" class="btn-link">'.__( 'Read more', 'mercuryconveyors' ).'</a>
					</div>
                </div>
				<div class="right-block">
					<a href="'.$link.'" class="image-wrapper">
						<img src="'.$image.'" alt="'.$image_alt.'" />
					</a>
				</div>
            </div>'
            .$do_load_more_html;
            $loop++;
        }wp_reset_postdata();
    }

    $data['posts'] 		    = $html;


	if ($do_load_more) {
		$data['load_more_btn']  = '<a class="btn" id="blog_load_more_btn" href="javascript:void(0)" data-paged="'.$paged.'">Load More</a>';
	} else{
		$data['load_more_btn']  = '';
	}
	
    if(!empty($html)){
		$msg = array('response'=>'success', 'data' => $data);
		echo json_encode($msg);
		exit();
	}else{
		$html = '<h4>No more blogs found!</h4>';
		$data['posts']	= $html;

		$msg = array('response'=>'error', 'data' => $data, 'message'=>'Error in response');
		echo json_encode($msg);
		exit();
	}

	wp_die();
}

add_action( 'wp_ajax_blog_load_more', 'blog_load_more' );
add_action( 'wp_ajax_nopriv_blog_load_more', 'blog_load_more' );
