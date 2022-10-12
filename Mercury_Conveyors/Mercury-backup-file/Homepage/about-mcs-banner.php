<?php
$about_mcs_banner = get_field('about_mcs_banner');
?>
<?php if( !empty($about_mcs_banner)) { ?>
<div class="about-mcs-banner">
    <div class="bg-img-wrapper">
		<img src="<?php echo esc_url($about_mcs_banner['url']); ?>" alt="<?php echo esc_attr($about_mcs_banner['alt']); ?>" />
    </div>
    <a href=""><i class="icon-arrow-down"></i></a>
</div>
<?php } ?>
