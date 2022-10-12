<?php
$home_banner_option           = get_field('home_banner_option');    //Radio button for option selection of (Image or Video)
$home_banner_video            = get_field('home_banner_video');     //Video option declared (youtube,vimeo,mp4)
$home_banner_background_image = get_field('home_banner_background_image');
$home_mp4_video               = get_field('home_mp4_video');
$home_youtube_video           = get_field('home_youtube_video');
$home_vimeo_video             = get_field('home_vimeo_video');
$home_banner_m_image          = get_field('home_banner_m_image');
$home_product_title           = get_field('home_product_title');
$products_post                = get_field('products_post');
?>

<!-- banner section -->
<div class="main-banner">
	<div class="background-video">
		<?php if($home_banner_option  == 'video' ) {
		if($home_banner_video == 'mp4') {
			if( $home_mp4_video ) { ?>
				<video autoplay loop muted class="wrapper__video">
					<source src="<?php echo $home_mp4_video['url'] ; ?>" type="video/mp4">
				</video>
		<?php }
		} elseif($home_banner_video == 'vimeo'){
			if($home_vimeo_video) { ?>
				<div class="wrapper__video">
					<iframe src="<?php echo $home_vimeo_video; ?>" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>
				</div>
		<?php }
		} elseif($home_banner_video == 'youtube'){
			if($home_youtube_video) { ?>
				<div class="wrapper__video">
					<iframe src="<?php echo $home_youtube_video; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
		<?php }
		} } else {
			if($home_banner_option  == 'image'){
				if($home_banner_background_image) { ?>
					<div class="wrapper__video">
						<img src="<?php echo esc_url($home_banner_background_image['url']); ?>" alt="<?php echo esc_attr($home_banner_background_image['alt']); ?>" />
					</div>
			<?php }
			}
		}?>
	</div>
	<!-- m image -->
	<?php if(!empty($home_banner_m_image) ) { ?>
		<div class="top-banner-image">
			<img src="<?php echo esc_url($home_banner_m_image['url']); ?>" alt="<?php echo esc_attr($home_banner_m_image['alt']); ?>" />
		</div>
	<?php } ?>
	<!-- product slider block -->
	<?php if( !empty($products_post) ) { ?>
		<div class="right-side-slider">
			<div class="title-icon"><i class="icon-plus"></i><?php echo __( 'Products', 'mercuryconveyors') ?></div>
		</div>
		<div class="right-side-open">
			<div class="title-icon1 d-flex align-items-end">
				<div class="close-btn-wrapper"><i class="icon-minus"></i><span><?php echo __( 'Close', 'mercuryconveyors') ?></span></div>
			</div>
			<?php if( !empty($home_product_title) ) { ?>
				<h3 class="h3"><?php echo $home_product_title ;?></h3>
			<?php } ?>
			<div class="right_part_sidebar mCustomScrollbar">
				<div class="right-slider-wrapper d-flex align-items-start">
					<div class="inner-side-block"> 
						<div class="product-wrapper-block">
							<div class="blocks-wrapper">
								<?php foreach( $products_post as $banner_products ) {  setup_postdata($banner_products);
										//product post feature image
										$banner_featured_image_src = get_the_post_thumbnail($banner_products->ID);
										$product_url               = get_the_permalink( $banner_products->ID );
										//Other Product ACF Field
										$product_sub_title      = get_field('product_sub_title'  , $banner_products->ID);
										$product_single_page    = get_field('product_single_page' , $banner_products->ID);
									?>
									<?php if( !empty( $banner_featured_image_src || $product_sub_title || $product_single_page ) ) { ?>
										<a class="product-block" href="<?php echo $product_url ;?>" >
											<?php if( !empty($banner_featured_image_src) ) { ?>
												<div class="product-block-image">
													<?php echo $banner_featured_image_src; ?>
												</div>
											<?php } ?>
											<?php if( !empty($product_sub_title) ) { ?>
												<h4 class="h4"><?php echo $product_sub_title; ?></h4>
											<?php } ?>
											<?php if( !empty($product_single_page) ) { ?>
												<span class="btn-link"><?php echo $product_single_page; ?></span>
											<?php } ?>
										</a>
									<?php } ?>
								<?php } wp_reset_postdata();?>
							</div>
							</div>
						</div>
					</div>
				</div>
			</div>
	<?php } ?>
</div>
