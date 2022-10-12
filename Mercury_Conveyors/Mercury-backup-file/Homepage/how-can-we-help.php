<?php
$hcwh_title       = get_field('hcwh_title');
$hcwh_description = get_field('hcwh_description');
?>
<!-- how-can-we-help -->
<?php if(!empty( $hcwh_title || $hcwh_description )) { ?>
	<div class="how-can-we-help">
		<div class="container">
			<div class="title-wrap text-center">
				<?php if(!empty($hcwh_title )) { ?>
					<h2 class="h1"><?php echo $hcwh_title; ?> </h2>
				<?php } ?>
				<?php if(!empty($hcwh_description )) { ?>
					<?php echo $hcwh_description ; ?>
				<?php } ?>
			</div>
		</div>
	</div>
<?php } ?>
