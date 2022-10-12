<?php
$content_section_title       = get_field('content_section_title');
$content_section_description = get_field('content_section_description');
$about_cta_button            = get_field('about_cta_button');
?>

<?php if(!empty($content_section_title || $content_section_description || $about_cta_button)) { ?>
<div class="content-section">
	<div class="container">
		<?php if( !empty($content_section_title ) ) { ?>
		<h2 class="h2"><?php echo $content_section_title; ?></h2> 
		<?php } ?>
		<?php if( !empty ($content_section_description )) { ?>
			<p><?php echo $content_section_description; ?></p>
		<?php } ?>
		<?php if( $about_cta_button ) {
				$about_url   = $about_cta_button['url'];
				$about_title = $about_cta_button['title'];
				$about_link  = $about_cta_button['target'] ? $about_cta_button['target'] : '_self'; ?>
		<a class="btn" href="<?php echo esc_url( $about_url ); ?>" target="<?php echo esc_attr( $about_link ); ?>"><?php echo esc_html( $about_title ); ?></a>
		<?php } ?>
	</div>
</div>
<?php } ?>
