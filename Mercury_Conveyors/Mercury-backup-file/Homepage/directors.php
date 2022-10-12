<?php $directors = get_field('directors'); ?>
<!-- Directors block -->
<?php if( !empty($directors) ) { ?>
<div class="directors-block">
	<div class="container">
		<div class="row border-right">
		<?php foreach( $directors as $director ) {
			$director_name         = $director['director_name'];
			$director_designation  = $director['director_designation'];
			$director_email        = $director['email'];
			$director_telephone    = $director['director_telephone'];
			$director_mobile       = $director['director_mobile'];
			$send_email_cta_button = $director['send_email_cta_button']; ?>
			<?php if( !empty( $director_name || $director_designation || $director_email || $director_telephone || $director_mobile ) ) { ?>
				<div class="cell-md-6 block-wrapper">
					<div class="info-wrapper">
						<?php if( !empty( $director_name ) ) { ?>
							<h5 class="h5"><?php echo $director_name ; ?></h5>
						<?php } ?>
						<?php if( !empty( $director_designation) ) { ?>
							<span><?php echo $director_designation ; ?></span>
						<?php } ?>
						<?php if( !empty( $director_email || $director_telephone || $director_mobile ) ) { ?>
							<div class="detail-wrapper">
							<?php if( !empty($director_email ) ) { ?>
								<span><a href="mailto:<?php echo $director_email ;?>"><?php echo $director_email ; ?></a></span>
							<?php } ?>
							<?php if( !empty( $director_telephone ) ) { ?>
								<span>tel:<a href="tel:<?php echo $director_telephone ;?>"><?php echo $director_telephone ; ?></a></span>
							<?php } ?>
							<?php if( !empty( $director_mobile ) ) { ?>
								<span>Mob:<a href="tel:<?php echo $director_mobile ;?>"><?php echo $director_mobile; ?></a></span>
							<?php } ?>
							</div>
						<?php } ?>
						<?php if( $send_email_cta_button ) {
							$send_url   = $send_email_cta_button['url'];
							$send_title = $send_email_cta_button['title'];
							$send_link  = $send_email_cta_button['target'] ? $send_email_cta_button['target'] : '_self'; ?>
							<a class="btn-link" href="<?php echo esc_url( $send_url ); ?>" target="<?php echo esc_attr( $send_link); ?>"><?php echo esc_html( $send_title); ?></a>
						<?php } ?>
					</div>
				</div>
			<?php } } ?>
		</div>
	</div>
</div>
<?php } ?>
