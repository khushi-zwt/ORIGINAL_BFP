<?php
$mtt_title       = get_field('mtt_title');
$mtt_description = get_field('mtt_description');
$team            = get_field('team');
?>

<!-- meet-the-team -->
<?php if(!empty( $mtt_title || $mtt_description || $team ) ) { ?>
<div class="meet-section">
	<?php if(!empty( $mtt_title || $mtt_description ) ) { ?>
		<div class="titles-content">
			<?php if(!empty( $mtt_title ) ) { ?>
				<h2 class="h1 text-center"><?php echo $mtt_title ; ?></h2>
			<?php } ?>
			<?php if(!empty( $mtt_description ) ) { ?>
				<div><?php echo $mtt_description ; ?></div>
			<?php } ?>
		</div>
	<?php } ?>
	<?php	if(!empty( $team )) { ?>
		<div class="container">
			<div class="meet-slider blog-wrapper">
				<?php foreach( $team as $meet_team) {
						$team_profile_image = $meet_team['team_profile'];
						$team_name          = $meet_team['team_name']; 
						$team_description   = $meet_team['team_description'];
						$email_cta_button   = $meet_team['email_cta_button']; ?>
						<?php if(!empty( $team_profile_image || $team_name || $team_description ) ) { ?>
						<div class="block">
							<?php if(!empty( $team_profile_image ) ) { ?>
								<div class="blog-img-wrapper">
									<img src="<?php echo esc_url($team_profile_image['url']); ?>" alt="<?php echo esc_attr($team_profile_image['alt']); ?>" /> 
								</div>
							<?php } ?>
							<?php if(!empty( $team_name || $team_description || $email_cta_button ) ) { ?>
								<div class="blog-content">
									<?php if(!empty( $team_name ) ) { ?>
										<h4 class="h4"><?php echo $team_name ; ?></h4>
									<?php } ?>
									<?php if(!empty( $team_description ) ) { ?>
										<div><?php echo $team_description ; ?></div>
									<?php } ?>
									<?php if( !empty($email_cta_button) ) {
											$email_url   = $email_cta_button['url'];
											$email_title = $email_cta_button['title'];
											$email_link  = $email_cta_button['target'] ? $email_cta_button['target'] : '_self'; ?>
											<a class="btn-link" href="<?php echo esc_url( $email_url ); ?>" target="<?php echo esc_attr( $email_link); ?>"><?php echo esc_html( $email_title); ?></a>
									<?php } ?>
								</div>
							<?php } ?>
						</div>
				<?php } } ?>
			</div>
		</div>
	<?php } ?>
</div>
<?php } ?>
