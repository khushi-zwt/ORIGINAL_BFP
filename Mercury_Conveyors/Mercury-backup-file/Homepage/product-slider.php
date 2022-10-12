<?php
$pss_title      = get_field('pss_title');
$product_slider = get_field('product_slider');
?>

<?php if( !empty($product_slider) ) { ?>
<div class="products-section">
	<div class="container">
		<?php if( !empty($pss_title) ) { ?>
			<h2 class="h1 text-center"><?php echo $pss_title; ?></h2>
		<?php } ?>
		<div class="product-slider">
			<?php foreach( $product_slider as $product ) {  setup_postdata($product);
				//product post feature image
				// $featuredimage_url = get_the_post_thumbnail_url( $product->ID ) ;
				$featuredimage_src = get_the_post_thumbnail($product->ID);
				$product_url       = get_the_permalink( $product->ID );
				//product post title
				// $product_title   =  get_the_title($product->ID);
				//Other Product ACF Field
				$product_sub_title      = get_field('product_sub_title' , $product->ID);
				$product_learn_more_cta = get_field('product_learn_more_cta', $product->ID);
				$product_length         = get_field('product_length', $product->ID);
				$product_width          = get_field('product_width' , $product->ID);
				$product_height         = get_field('product_height', $product->ID);
				$product_single_page    = get_field('product_single_page' ,$product->ID);
				$product_details        = get_field('product_details',$product->ID);    //Table Field?>

				<?php if( !empty( $featuredimage_src || $product_title || $product_sub_title || $product_learn_more_cta) ) { ?>
					<div class="product-wrapper">
						<?php if( !empty( $featuredimage_src ) ) { ?>
							<a class="product-img-wrapper text-center" href="<?php echo $product_url ; ?>">
								<?php echo $featuredimage_src; ?>
							</a>
						<?php } ?>
						<div class="product-content">
							<?php if( !empty( $product_sub_title ) ) { ?>
								<h4 class="h4"><?php echo $product_sub_title; ?></h4>
							<?php } ?>
							<?php if( !empty( $product_length || $product_width || $product_height || $product_learn_more_cta ) ) { ?>
								<div class="span-button-block d-flex align-items-center justify-content-between">
									<?php if( !empty( $product_length || $product_width || $product_height ) ) { ?>
										<div class="span-wrapper">
											<span> Length:<?php echo $product_length; ?></span>
											<span> Width: <?php echo $product_width;  ?></span>
											<span> Height:<?php echo $product_height; ?></span>
										</div>
									<?php } ?>
									<?php if( $product_learn_more_cta ) {
										$product_url   = $product_learn_more_cta['url'];
										$product_title = $product_learn_more_cta['title'];
										$product_link  = $product_learn_more_cta['target'] ? $product_learn_more_cta['target'] : '_self'; ?>
										<a class="btn" href="<?php echo esc_url( $product_url ); ?>" target="<?php echo esc_attr($product_link); ?>"><?php echo esc_html( $product_title ); ?></a>
									<?php } ?>
								</div>
							<?php } ?>
							<div class="product-table-button text-center">
								<a href="javascript:void(0);" class="btn-bg"><?php echo __( 'View all products', 'mercuryconveyors') ?></a>
							</div>
						</div>
						<?php if( !empty( $product_details ) ) { ?>
							<div class="product-table-wrapper">
								<div class="table-section">
									<?php 	if( ! empty ( $product_details ) ) {
										echo '<table style="width:100%" class="text-left">';
											if ( ! empty( $product_details['header'] ) ) {
												echo '<thead>';
													echo '<tr>';
														foreach ( $product_details['header'] as $th ) {
															echo '<th>';
																echo $th['c'];
															echo '</th>';
														}
													echo '</tr>';
												echo '</thead>';
											}
											echo '<tbody>';
												foreach ( $product_details['body'] as $tr ) {
													echo '<tr>';
														foreach ( $tr as $td ) {
															echo '<td>';
																echo $td['c'];
															echo '</td>';
														}
													echo '</tr>';
												}
											echo '</tbody>';
										echo '</table>';
									} ?>
								</div>
							</div>
						<?php } ?>
					</div>
				<?php } ?>
			<?php } wp_reset_postdata(); ?>
		</div>
	</div>
	<div class="close-button d-none"><i class="icon-minus"></i><?php echo __( 'Close', 'mercuryconveyors') ?></div>
</div>
<?php } ?>
