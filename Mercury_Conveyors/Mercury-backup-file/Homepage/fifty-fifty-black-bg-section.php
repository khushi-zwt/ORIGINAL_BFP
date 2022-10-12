<?php
$welded = get_field('welded');
?>
<?php if( $welded  ) { ?>
	<div class="fifty-fifty-section">
		<div class="container">
			<?php foreach( $welded  as $welded ) {
				$welded_title        =  $welded['welded_title'];
				$welded_description  =  $welded['welded_description'];
				$welded_image        =  $welded['welded_image'];
				$welded_cta_button   =  $welded['welded_cta_button'];
				$image_position      =  $welded['image_position']; ?>
				
				<?php if(!empty( $welded_title || $welded_description ||  $welded_cta_button || $welded_image)) { ?>
					<div class="row<?php echo $image_position; ?>">
						<?php if(!empty( $welded_title || $welded_description || $welded_cta_button )) { ?>
							<div class="cell-md-6">
								<div class="left-side-text bottom-block">
									<?php if(!empty( $welded_title )) { ?>
										<h3><?php echo $welded_title ;?></h3>
									<?php } ?>
									<?php if(!empty( $welded_description )) { ?>
										<p><?php  echo $welded_description  ;?></p>
									<?php } ?>
									<?php if( $welded_cta_button ) {
										$welded_cta__url   = $welded_cta_button['url'];
										// $welded_cta_title  = $welded_cta_button['title'];
										$welded_cta_link  = $welded_cta_button['target'] ? $welded_cta_button['target'] : '_self'; ?>
											<a class="btn-link" href="<?php echo esc_url( $welded_cta__url ); ?>" target="<?php echo esc_attr( $welded_cta_link ); ?>"></a>
									<?php } ?>
								</div>
							</div>
						<?php } ?>
						<?php if(!empty( $welded_image )) { ?>
							<div class="cell-md-6">
								<div class="image-wrapper">
									<img src="<?php echo esc_url($welded_image['url']); ?>" alt="<?php echo esc_attr($welded_image['alt']); ?>" />
								</div>
							</div>
						<?php } ?>
					</div>
				<?php }  ?>
			<?php } ?>
		</div>
	</div>
<?php } ?>
