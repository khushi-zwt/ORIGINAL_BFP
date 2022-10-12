<?php get_header(); ?>
<?php 
$gallery_slider = get_field('gallery_slider');
$share_on_social_media  = get_field('share_on_social_media');
$share_post             = get_field('share_post','option');?>

<div class="single-post-detail-page">
	<?php 
		if (has_post_thumbnail()) {
			$image = wp_get_attachment_url(get_post_thumbnail_id($case_study->ID), "thumbnail");
			$image_alt = get_post_meta(get_post_thumbnail_id($case_study->ID), "_wp_attachment_image_alt", "true");
		} else {
			$image = "/wp-content/themes/mercuryconveyors/images/placeholder.png";
			$image_alt = "The placeholder featured image.";
		}
	?>
	<div class="single-post-banner">
		<img src="<?php echo $image; ?>" alt="<?php echo $image_alt; ?>" class="example-featured-image">
	</div>
	<div class="cs-container">
		<div class="cs-post-details-page">
			<div class="primary-text single-content">
				<h1 class="h3"><?php the_title(); ?></h1>
				<?php the_excerpt(); ?>
				<?php if( $gallery_slider ){ ?>
					<div class="gallery-block">
						<div class="gallery-slider">
							<?php foreach( $gallery_slider as $gallery ){ ?>
								<div class="gallery-wrapper">
									<img src="<?php echo esc_url($gallery['url']); ?>" alt="<?php echo esc_attr($gallery['alt']); ?>" />
								</div>
							<?php } ?>
						</div>
					</div>
				<?php } ?>
				<?php the_content(); ?>
				<?php
					$next = get_next_post();
					if(get_next_post()) {
				?>
				<!-- <a href="<?php echo get_the_permalink($next); ?>" title="Next post"><u>Next post</u></a> -->
				<?php } ?>
			</div>
		</div>
		<div class="social-icon-and-button text-center">
			<?php if($share_post) {
				echo do_shortcode( '[share_posts]' );
			} ?>
			<div class="previous-page">
				<a href="javascript:void(0);" onclick="history.back();" class="btn-link"><?php echo __( 'Case Studies', 'mercuryconveyors' ); ?></a>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>
