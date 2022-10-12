<?php
$contact_page_banner = get_field('contact_page_banner');
?>

<!-- contact-page-banner -->
<?php if(!empty($contact_page_banner)) { ?>
<div class="contact-page-banner">
	<img src="<?php echo esc_url($contact_page_banner['url']); ?>" alt="<?php echo esc_attr($contact_page_banner['alt']); ?>" />
</div>
<?php } ?>
