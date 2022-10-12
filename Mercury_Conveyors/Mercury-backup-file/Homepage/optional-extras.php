<?php
$optional_title       = get_field('optional_title');
$optional_description = get_field('optional_description');
$optional             = get_field('optional');
$optional_mobile      = get_field('optional');
?>

<?php if( !empty( $optional )  ) { ?>
<div class="optional-extras">
	<div class="container">
		<?php if(!empty( $optional_title || $optional_description )) { ?>
				<div class="head-text-wrapper">
					<?php if(!empty($optional_title)) { ?>
					<h2 class="h1 text-center"><?php echo $optional_title; ?></h2>
					<?php } ?>
					<?php if(!empty( $optional_description ) ) { ?>
						<p><?php echo $optional_description ; ?></p>
					<?php } ?>
				</div>
		<?php } ?>
		<div class="button-view-product">
            <a href="#" class="btn-link"><?php echo __( 'View all options', 'mercuryconveyors' ) ?></a>
        </div>
		<?php if(!empty($optional )) { ?>
		<div class="row">
			<div class="cell-md-6">
				<ul class="product-list">
					<?php
						$loop = 1 ;
						foreach( $optional  as $optional ) {
						$optional_product_title       = $optional['oe_o_title'];
						$optional_product_description = $optional['oe_o_description'];
						$optional_product_image       = $optional['oe_image'];
						$optional_product_add_cta     = $optional['add_cta_button']; ?>
							<?php if(!empty( $optional_product_title || $optional_product_description || $optional_product_image || $optional_product_add_cta )) { ?>
								<li class="<?php if($loop == 1 ) { echo 'active'; } ?>"><a href="#"><?php echo $optional_product_title ; ?></a>
									<div class="image-txt-wrapper">
										<?php if(!empty($optional_product_image)) { ?>
										<div class="right-img-wrapper">
											<img src="<?php echo esc_url($optional_product_image['url']); ?>" alt="<?php echo esc_attr($optional_product_image['alt']); ?>" />
										</div>
										<?php } ?>
										<?php if(!empty($optional_product_title || $optional_product_description )) { ?>
										<div class="optional-extras-content">
											<div class="content-left">
												<?php if(!empty($optional_product_title)) { ?>
													<a href="#" class="h3"><?php echo $optional_product_title ; ?></a>
												<?php } ?>
												<?php if(!empty($optional_product_description)) { ?>
													<p><?php echo $optional_product_description ; ?></p>
												<?php } ?>
											</div>
											<?php if( $optional_product_add_cta  ) { ?>
												<div class="content-right"> <?php
													$optional_add_url    = $optional_product_add_cta ['url'];
													$optional_add_title  = $optional_product_add_cta ['title'];
													$optional_add_link   = $optional_product_add_cta ['target'] ? $optional_product_add_cta ['target'] : '_self'; ?>
													<a class="btn-view" href="<?php echo esc_url( $optional_add_url ); ?>" target="<?php echo esc_attr( $optional_add_link ); ?>"><i class="icon-plus"></i><?php echo esc_html( $optional_add_title ); ?></a>
												</div>
											<?php } ?>
										</div>
										<?php } ?>
									</div>
								</li>
					<?php $loop++; } } ?>
				</ul>
			</div>
			<div class="cell-md-6 d-none"> </div>
		</div>
		<?php } ?>
		<!-- Responsive view -->
		<div class="optional-extras-slider">
			<?php
				foreach( $optional_mobile  as $optional ) {
				$optional_product_title       = $optional['oe_o_title'];
				$optional_product_description = $optional['oe_o_description'];
				$optional_product_image       = $optional['oe_image'];
				$optional_product_add_cta     = $optional['add_cta_button']; 
				if( !empty($optional_product_title || $optional_product_description || $optional_product_image || $optional_product_add_cta ) ) {  ?>
					<div class="image-txt-wrapper">
						<div class="right-img-wrapper">
							<img src="<?php echo esc_url($optional_product_image['url']); ?>" alt="<?php echo esc_attr($optional_product_image['alt']); ?>" /> 
						</div>
					<?php if(!empty($optional_product_title || $optional_product_description || $optional_product_add_cta )) { ?>
						<div class="optional-extras-content">
							<?php if(!empty($optional_product_title || $optional_product_description )) { ?>
								<div class="content-left">
									<?php if(!empty($optional_product_title )) { ?>
										<a href="#" class="h3"><?php echo $optional_product_title ; ?></a>
									<?php } ?>
									<?php if(!empty( $optional_product_description )) { ?>
										<p><?php echo $optional_product_description ; ?></p>
									<?php } ?>
								</div>
							<?php } ?>
							<?php if( $optional_product_add_cta  ) { ?>
								<div class="content-right"> <?php
									$optional_add_url    = $optional_product_add_cta ['url'];
									$optional_add_title  = $optional_product_add_cta ['title'];
									$optional_add_link   = $optional_product_add_cta ['target'] ? $optional_product_add_cta ['target'] : '_self'; ?>
									<a class="btn-view" href="<?php echo esc_url( $optional_add_url ); ?>" target="<?php echo esc_attr( $optional_add_link ); ?>"><i class="icon-plus"></i><?php echo esc_html( $optional_add_title ); ?></a>
								</div>
							<?php } ?>
						</div>
						<?php } ?>
					</div>
			<?php } } ?>
		</div>
	</div>
</div>
<?php } ?>
