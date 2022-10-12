<?php
$bio_background_image  = get_field('bio_background_image');
?>

<?php if(!empty($bio_background_image)) { ?>
<div class="banner-image-only">
	<img src="<?php echo esc_url($bio_background_image['url']); ?>" alt="<?php echo esc_attr($bio_background_image['alt']); ?>" />
</div>
<?php } ?>
