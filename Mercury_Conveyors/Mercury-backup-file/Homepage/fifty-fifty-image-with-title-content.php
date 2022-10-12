<?php
$main_title            = get_field('main_title');
// Left side content
$left_title            = get_field('left_title');
$left_description      = get_field('left_description');
$learn_more_cta_button = get_field('learn_more_cta_button');
// Right side image
$right_image          = get_field('right_image');
?>

<?php if( $main_title || $left_title || $right_image) { ?>
<div class="conveyor-care-section">
	<div class="container">
		<?php if( !empty($main_title) ) { ?>
			<h2 class="h1"><?php echo $main_title; ?></h2>
		<?php } ?>
		<div class="row no-gutters">
			<div class="cell-md-6">
			<?php  if( !empty( $left_title  || $left_description  || $learn_more_cta_button) ) { ?>
				<div class="left-conveyor-section">
					<?php if( !empty($left_title) ) { ?>
						<h3 class="h3"><?php echo $left_title ;?></h3>
					<?php }
					if( !empty($left_description) ) { ?>
						<p><?php echo $left_description ;?></p>
					<?php } ?>
					<?php if( $learn_more_cta_button ) {
							$learn_more_url   = $learn_more_cta_button['url'];
							$learn_more_title = $learn_more_cta_button['title'];
							$learn_more_link  = $learn_more_cta_button['target'] ? $learn_more_cta_button['target'] : '_self'; ?>
								<a class="btn" href="<?php echo esc_url( $learn_more_url ); ?>" target="<?php echo esc_attr( $learn_more_link); ?>"><?php echo esc_html( $learn_more_title); ?></a>
					<?php } ?>
				</div>
			<?php } ?>
			</div>
			<?php if( !empty ($right_image) ) { ?>
			<div class="cell-md-6">
				<div class="conveyor-image-parent">
					<img src="<?php echo esc_url($right_image['url']); ?>" alt="<?php echo esc_attr($right_image['alt']); ?>" />  
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
</div>
<?php } ?>
