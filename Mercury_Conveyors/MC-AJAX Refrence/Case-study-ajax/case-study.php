<?php
/**
 * Case Study [Load more] Ajax Function
 */
function cs_load_more() {
    check_ajax_referer( 'cs-load-more-nonce', 'security' );
	// echo "hiiii";
	// die();
    $html			= '';

    $post_per_page	= $_POST['posts_per_page'];
    $paged			= $_POST['paged'];

    $paged		    = $paged+1;

    $args = array(
        'post_type'         => 'case-study',
		'orderby'           => 'date',
        'order' 		    => 'DESC',
        'posts_per_page'	=> $post_per_page,
        'paged'				=> $paged,
    );

	// print_r( $args );
	//exit();
	
    $query = new WP_Query( $args );

    if ( $query->have_posts() ) {
        $post_count = $query->post_count;
        $found_posts = $query->found_posts;

        $loop = 1;
        while ( $query->have_posts() ) { $query->the_post();
			$link               = get_the_permalink($case_study->ID);
			$featured_image_src = get_the_post_thumbnail($case_study->ID);
			$case_study_title   = get_the_title($case_study->ID) ;
			$case_study_content = wp_trim_words( get_the_content(), 20, '' );

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

            $html.='<div class="block">
						<div class="card-wrapper">
							<div class="post-image">
								<a class="study-image-parent"  href="'.$link .'">
									'. $featured_image_src.'
								</a>
							</div>
							<div class="case-study-content">
								<div class="content-left">
									<a href="'.$link.'" class="h4">'.$case_study_title.'</a>
									'. $case_study_content.'
								</div>
								<div class="content-right">
									<a href="'.$link.'" class="btn-view"><i class="icon-plus"></i>'. __( 'View', 'mercuryconveyors' ).'</a>
								</div>
							</div>
						</div>
					</div>';
            $loop++;
        }wp_reset_postdata();
    }

    $data['posts'] 		    = $html;


	if ($do_load_more) {
		$data['load_more_btn']  = '<a class="btn" id="cs_load_more_btn" href="javascript:void(0)" data-paged="'.$paged.'">Load More</a>';
	} else{
		$data['load_more_btn']  = '';
	}
	
    if(!empty($html)){
		$msg = array('response'=>'success', 'data' => $data);
		echo json_encode($msg);
		exit();
	}else{
		$html = '<h4>No more Case Studies found!</h4>';
		$data['posts']	= $html;

		$msg = array('response'=>'error', 'data' => $data, 'message'=>'Error in response');
		echo json_encode($msg);
		exit();
	}

	wp_die();
}

add_action( 'wp_ajax_cs_load_more', 'cs_load_more' );
add_action( 'wp_ajax_nopriv_cs_load_more', 'cs_load_more' );
