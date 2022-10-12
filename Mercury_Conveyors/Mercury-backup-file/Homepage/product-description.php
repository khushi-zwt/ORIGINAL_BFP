<?php
$product_variation_title     = get_field('product_variation_title');
$product_variation_sub_title = get_field('product_variation_sub_title');
$product_short_description   = get_field('product_short_description');
$product_variation_table     = get_field('product_variation_table');
$product_variation_table_two = get_field('product_variation_table_two');
$product_variations_unit     = get_field('product_variations_unit');
?>

<!-- description of product variation -->
<div class="product-information-section">
    <div class="container">
		<?php if( !empty($product_variation_title)) { ?>
			<h2 class="h1 text-center"><?php echo $product_variation_title ; ?></h2>
		<?php } ?>
        <div class="row">
            <div class="cell-lg-6">
                <div class="left-block-text-wrapper">
					<?php if( !empty( $product_variation_sub_title )) { ?>
						<h3 class="h3"><?php echo $product_variation_sub_title ; ?></h3>
					<?php } ?>
					<?php if( !empty( $product_short_description )) { ?>
						<p><?php echo $product_short_description ;?></p>
					<?php } ?>
                    <div class="optional-extras-button  mobile-btn"><i class="icon-plus"></i><?php echo __( 'Optional Extras', 'mercuryconveyors') ?></div>
                    <div class="table-dekstop">
                        <div class="table-wrapper-one table">   
							<?php 	if( !empty( $product_variation_table ) ) {
									echo '<table style="width:100%">';
										if ( ! empty( $product_variation_table['header'] ) ) {
											echo '<thead>';
												echo '<tr>';
													foreach ( $product_variation_table['header'] as $th ) {
														echo '<th style="width:25%">';
															echo $th['c'];
														echo '</th>';
													}
												echo '</tr>';
											echo '</thead>';
										}
										echo '<tbody>';
											foreach ( $product_variation_table['body'] as $tr ) {
												echo '<tr>';
													foreach ( $tr as $td ) {
														echo '<td>';
															echo $td['c'];
														echo '</td>';
													}
												echo '</tr>';
											}
										echo '</tbody>';
									echo '</table>'; } ?>
                        </div>
                        <div class="table-wrapper-two table">   
						<?php 	if( !empty($product_variation_table_two ) ) {
									echo '<table style="width:100%">';
										if ( ! empty($product_variation_table_two['header'] ) ) {
											echo '<thead>';
												echo '<tr>';
													foreach ($product_variation_table_two['header'] as $th ) {
														echo '<th style="width:25%">';
															echo $th['c'];
														echo '</th>';
													}
												echo '</tr>';
											echo '</thead>';
										}
										echo '<tbody>';
											foreach ($product_variation_table_two['body'] as $tr ) {
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
                </div>
            </div>
            <div class="cell-lg-6">
				<?php	if( $product_variations_unit ) { ?>
					<div class="right-block-wrapper">
						<?php foreach( $product_variations_unit as $product_unit ) {
							$product_data      = $product_unit['product_variation_data'];
							$product_data_unit = $product_unit['product_data_unit']; ?>
								<div class="ammount-border-block">
									<h2 class="h2"><?php echo $product_data ; ?></h2>
									<span><?php echo $product_data_unit ; ?></span>
								</div>
						<?php } ?>
					</div>
				<?php	} ?>
				<!-- Responsoive Table View -->
				<div class="table-mobile">
					<div class="table-wrapper-one table">   
					<?php if( !empty( $product_variation_table ) ) {
							echo '<table style="width:100%">';
								if ( !empty( $product_variation_table['header'] ) ) {
									echo '<thead>';
										echo '<tr>';
											foreach ( $product_variation_table['header'] as $th ) {
												echo '<th style="width:25%">';
													echo $th['c'];
												echo '</th>';
											}
										echo '</tr>';
									echo '</thead>';
								}
								echo '<tbody>';
									foreach ( $product_variation_table['body'] as $tr ) {
										echo '<tr>';
											foreach ( $tr as $td ) {
												echo '<td>';
													echo $td['c'];
												echo '</td>';
											}
										echo '</tr>';
									}
								echo '</tbody>';
							echo '</table>'; } ?>
					</div>
					<div class="table-wrapper-two table">   
						<?php  if( !empty($product_variation_table_two ) ) {
							echo '<table style="width:100%">';
								if ( !empty($product_variation_table_two['header'] ) ) {
									echo '<thead>';
										echo '<tr>';
											foreach ($product_variation_table_two['header'] as $th ) {
												echo '<th style="width:20%">';
													echo $th['c'];
												echo '</th>';
											}
										echo '</tr>';
									echo '</thead>';
								}
								echo '<tbody>';
									foreach ($product_variation_table_two['body'] as $tr ) {
										echo '<tr>';
											foreach ( $tr as $td ) {
												echo '<td>';
													echo $td['c'];
												echo '</td>';
											}
										echo '</tr>';
									}
								echo '</tbody>';
							echo '</table>';  } ?>
					</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="optional-extras-button desktop-btn"><i class="icon-plus"></i><?php echo __( 'Optional Extras', 'mercuryconveyors') ?></div>
</div>


