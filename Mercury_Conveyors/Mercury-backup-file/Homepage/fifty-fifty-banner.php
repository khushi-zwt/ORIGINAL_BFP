<?php
$fifty_fifty_image       = get_field('fifty_fifty_image');
$fifty_fifty_title       = get_field('fifty_fifty_title');
$fifty_fifty_description = get_field('fifty_fifty_description');
$fifty_fifty_read_more   = get_field('fifty_fifty_read_more');
?>
<!-- case-studies--blog--fifty-fity-banner -->
<?php if(!empty( $fifty_fifty_image || $fifty_fifty_title || $fifty_fifty_description  ) ) { ?>
<div class="case-studies">
	<div class="row no-gutters">
		<?php if(!empty( $fifty_fifty_image ) ) { ?>
			<div class="cell-md-6 tab-device">
				<div class="case-studies-banner-left">
					<img src="<?php echo esc_url($fifty_fifty_image['url']); ?>" alt="<?php echo esc_attr($fifty_fifty_image['alt']); ?>" />
				</div>
			</div>
		<?php } ?>
		<div class="cell-md-6">
			<div class="case-studies-banner-right">
				<div class="right-content text-white">
					<?php if(!empty( $fifty_fifty_title ) ) { ?>
						<h3><?php echo $fifty_fifty_title ; ?></h3>
					<?php } ?>
					<?php if(!empty( $fifty_fifty_description ) ) { ?>
						<p><?php echo $fifty_fifty_description ; ?></p>
					<?php } ?>
					<?php if( $fifty_fifty_read_more ) {
						$read_more_url   = $fifty_fifty_read_more['url'];
						$read_more_title = $fifty_fifty_read_more['title'];
						$read_more_link  = $fifty_fifty_read_more['target'] ? $fifty_fifty_read_more['target'] : '_self'; ?>
							<a class="btn-link" href="<?php echo esc_url( $read_more_url ); ?>" target="<?php echo esc_attr( $read_more_link); ?>"><?php echo esc_html( $read_more_title); ?></a>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php } ?>
