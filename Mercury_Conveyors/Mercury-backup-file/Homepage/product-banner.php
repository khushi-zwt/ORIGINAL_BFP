<?php
$product_banner_m_image =  get_field('product_banner_m_image');
$product_post_type      =  get_field('product_post_type');    //Relationship Field
?>

<!-- product banner / Telescopic Conveyor -->
<?php if(!empty( $product_banner_m_image || $product_post_type )) { ?>
<div class="telescopic-conveyor">
	<?php if( !empty( $product_banner_m_image )) { ?>
		<div class="product-banner-bg">
			<img src="<?php echo esc_url($product_banner_m_image['url']); ?>" alt="<?php echo esc_attr($product_banner_m_image['alt']); ?>" />  
		</div>
	<?php } ?>
	<?php if( !empty($product_post_type) ) { ?>
		<div class="telescopic-conveyor-wrapper text-center">
			<?php foreach( $product_post_type as $product_post ) {  setup_postdata($product_post);
				//product post feature image
				// $product_image_url = get_the_post_thumbnail_url( $product_post->ID ) ;
				$product_image_src = get_the_post_thumbnail($product_post->ID);
				$product_url       = get_the_permalink( $banner_products->ID );
				//product post title
				$product_title     = get_the_title($product_post->ID);
				$product_sub_title = get_field('product_sub_title' , $product_post->ID);
				$product_details   = get_field('product_details',$product_post->ID);    //Table Field   ?>
				
			<?php if( !empty( $product_title || $product_sub_title || $product_details ) ) { ?>
				<div class="telescopic-conveyor-content">
					<div class="container">
						<?php if( !empty( $product_title || $product_sub_title )) { ?>
							<div class="head-div">
								<?php if( $product_title ) { ?>
									<h2 class="h1"><?php echo $product_title; ?></h2>
								<?php } ?>
								<?php if( $product_sub_title ) { ?>
									<h4 class="h4"><?php echo $product_sub_title; ?></h4>
								<?php } ?>
							</div>
						<?php } ?>
						<?php if( $product_image_src ) { ?>
							<a class="product-img-wrapper text-center" href="<?php echo $product_url; ?>">
								<?php echo  $product_image_src; ?>
							</a>
						<?php } ?>
						<div class="product-btn text-center">
							<a href="javascript:void(0);" class="btn-bg"><?php echo __( 'View all products', 'mercuryconveyors') ?></a>
						</div>
					</div>
					<?php if( !empty( $product_details ) ) { ?>
						<div class="main-table-wrapper">
							<div class="product-table-wrapper">
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
						</div>
					<?php } ?>
				</div>
			<?php } } wp_reset_postdata(); ?>
		</div>
	<?php } ?>
	<div class="close-btn d-none"><i class="icon-minus"></i><?php echo __( 'Close', 'mercuryconveyors') ?></div>

	<div class="select-section">
		<div class="select-wrapper">
		<select name="model" id="">
			<option value="">Model</option>
			<option value="">One</option>
		</select>
		<select name="length" id="">
				<option value="">Length</option>
			<option value="one">One</option>
		</select>
		<select name="height" id="">
			<option value="">Height</option>
			<option value="one">One</option>
		</select>
			</div>
	</div>
</div>
<?php } ?>
