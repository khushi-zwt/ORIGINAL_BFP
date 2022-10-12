<?php
$main_top_title         = get_field('main_top_title');
$case_study_description = get_field('case_study_description');
$case_study_post        = get_field('case_study_post');
$case_study_description = get_field('case_study_description');
?>

<?php if( !empty($case_study_post) ) { ?>
	<div class="case-studies-section">
		<div class="container">
			<?php if( !empty( $main_top_title ) ) { ?> 
				<h2 class="h1 text-center"><?php echo $main_top_title; ?></h2>
			<?php } ?>
			<?php if( !empty( $case_study_description ) ) { ?>
				<p><?php echo $case_study_description ; ?></p>
			<?php } ?>
			<?php if( !empty( $case_study_post ) ) { ?>
				<div class="case-studies-slider">
					<?php foreach( $case_study_post as $case_study ) {  setup_postdata($case_study);
						$featured_image_url = get_the_post_thumbnail_url( $case_study->ID ) ;
						$featured_image_src = get_the_post_thumbnail($case_study->ID);
						$case_study_title   = $case_study->post_title ;
						$case_study_content = wp_trim_words( $case_study->post_content, 50, '' ); ?>
						<?php if( !empty( $case_study_title || $case_study_content ) ) { ?>
						<div class="block">
							<div class="card-wrapper">
							<?php if( !empty($featured_image_url || $featured_image_src ) ) { ?>
									<div class="post-image">
										<a class="study-image-parent"  href="<?php echo $featured_image_url; ?>">
											<?php echo $featured_image_src; ?>
										</a>
									</div>
							<?php } ?>
								<div class="case-study-content">
									<div class="content-left">
									<?php if( !empty( $case_study_title ) ) { ?>
										<a href="#" class="h4"><?php echo $case_study_title; ?></a>
									<?php } ?>
									<?php if( !empty(  $case_study_content ) ) { ?>
										<p><?php echo $case_study_content; ?></p>
									<?php } ?>
									</div>
									<div class="content-right">
										<a href="<?php the_permalink( $case_study->ID ) ; ?>" class="btn-view"><i class="icon-plus"></i><?php echo __( 'View', 'mercuryconveyors' ) ?></a>
									</div>
								</div>
							</div>
						</div>
					<?php } } wp_reset_postdata(); ?>
				</div>
			<?php } ?>
		</div>
	</div>
<?php } ?>
