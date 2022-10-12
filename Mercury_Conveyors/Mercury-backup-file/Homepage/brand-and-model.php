<?php
$bm_main_title  = get_field('bm_main_title');
$bm_table       = get_field('bm_table');  //Table Field
?>

<?php	if( !empty( $bm_table ) ) { ?>
<div class="brand-and-model">
	<div class="container">
		<?php if( !empty($bm_main_title)) { ?>
			<h2 class="h1 text-center"><?php echo $bm_main_title ;?></h2>
		<?php } ?>
		<?php	if( !empty( $bm_table ) ) { ?>
			<div class="component-table-wrapper">
				<?php
				if( !empty( $bm_table ) ) {
					echo'<table style="width:100%">';
						if ( !empty( $bm_table['header'] ) && 1 == 2 ) {
							echo '<thead>';
								echo '<tr>';
									foreach ( $bm_table['header'] as $th ) {
										echo '<th>';
											echo $th['c'];
										echo '</th>';
									}
								echo '</tr>';
								echo '<tr class="d-md-none">';
								$loop_data_label = 1;
									foreach ( $bm_table['header'] as $th ) {
										echo '<th scope="col">';
											echo $th['c'];
										echo '</th>';

										$table_data_label[$loop_data_label] = $th['c'];
										$loop_data_label++;
									}
								echo '</tr>';
							echo '</thead>';
						}
						echo '<tr>
							<th style="width:25%">Part</th>
							<th style="width:25%">Brand</th>
							<th style="width:25%">Model</th>
						</tr>';
						$table_data_label[1] = 'Part';
						$table_data_label[2] = 'Brand';
						$table_data_label[3] = 'Model';
						echo '<tbody>';
							foreach ( $bm_table['body'] as $tr ) {
								echo '<tr>';
									$loop = 1;
									foreach ( $tr as $td ) {
										echo '<td data-label="'.$table_data_label[$loop].' : ">';
											echo $td['c'];
										echo '</td>';
										$loop ++;
									}
								echo '</tr>';
							}
						echo '</tbody>';
					echo '</table>'; } ?>
				<div class="reveal-btn">
					<a href="javascript:void(0);" class="btn" tabindex="0"><?php echo __( 'Reveal', 'mercuryconveyors' ) ?></a>
				</div>
			</div>
		<?php } ?>
	</div>
	<div class="close-btn"><i class="icon-minus"></i><?php echo __( 'Close', 'mercuryconveyors' ) ?></div>
</div>
<?php } ?>
