<?php
$git_title        = get_field('git_title');
$git_description  = get_field('git_description');
$email_cta_button = get_field('email_cta_button');
?>

<!-- Get in Touch -->
<?php if( $git_title || $git_description || $email_cta_button  ) { ?>
<div class="get-in-touch-section">
    <div class="container">
        <div class="get-in-touch-content">
			<?php if( !empty( $git_title ) ) { ?>
				<h2 class="h1"><?php echo $git_title; ?></h2>
			<?php }
			if( !empty( $git_description ) ) { echo $git_description ; } ?>
			<?php if( !empty( $email_cta_button ) ) { ?>
				<a class="btn-link" href="mailto: <?php echo $email_cta_button ;?>"><?php echo __( 'Email us', 'mercuryconveyors' ) ?></a>
			<?php } ?>
        </div>
    </div>
</div>
<?php } ?>
