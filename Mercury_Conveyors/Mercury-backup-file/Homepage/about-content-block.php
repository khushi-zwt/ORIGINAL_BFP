<?php
$about_title             = get_field('about_title');
$about_block_description = get_field('about_block_description');
$get_quote_cta           = get_field('get_quote_cta');
?>

<!-- about content -->
<?php if(!empty($about_title || $about_block_description || $get_quote_cta )) { ?>
<div class="about-content">
    <div class="container">
        <div class="about-content-wrapper">
			<?php if(!empty($about_title)) { ?>
            	<h2 class="h2"><?php echo $about_title ; ?></h2>
			<?php } ?>
			<?php if(!empty($about_block_description)) { ?>
            	<p><?php echo $about_block_description ; ?></p>
			<?php } ?>
			<?php if( !empty($get_quote_cta)  ) {
				$get_quote_url   = $get_quote_cta ['url'];
				$get_quote_title = $get_quote_cta ['title'];
				$get_quote_link  = $get_quote_cta ['target'] ? $get_quote_cta ['target'] : '_self'; ?>
					<a class="btn-link" href="<?php echo esc_url( $get_quote_url ); ?>" target="<?php echo esc_attr( $get_quote_link ); ?>"><?php echo esc_html( $get_quote_title ); ?></a>
		<?php } ?>
        </div>
    </div>
</div>
<?php } ?>
