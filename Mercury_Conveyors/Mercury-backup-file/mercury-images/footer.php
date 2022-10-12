<?php
$footer_logo  = get_field('footer_logo','option');
$social_icons = get_field('social_icons', 'option');
?>
<!-- footer part -->
<footer class="main-footer">
   <div class="container">
        <div class="row">
			<?php if($footer_logo || $social_icons ) {
				if( !empty($footer_logo) ) { ?>
					<div class="cell-md-3 cell-lg-4 cell-xl-6">
						<a href="<?php echo home_url( '/' ) ?>" class="footer-logo">
						<?php $extension = pathinfo($footer_logo['url'], PATHINFO_EXTENSION); 
							if( $extension == 'svg' ) { ?>
								<img src="<?php echo $footer_logo['url']; ?>" alt="<?php echo $footer_logo['alt']; ?>" />
							<?php } else { ?>
								<?php echo wp_icon( $footer_logo['url'] ); ?>
							<?php } ?>
						</a>
					</div>
				<?php } ?>
				<div class="cell-md-9 cell-lg-8 cell-xl-6">
					<div class="footer-right-content d-flex">
						<div class="footer-list-content">
							<?= wp_nav_menu(
								array( 
									'theme_location' => 'footer',
									'container'      => 'div', 
									'container_class' => 'footer-menu',
									'items_wrap'      => '<ul id="%1$s" class="d-flex">%3$s</ul>',
								)
							); ?>
						</div>
						<?php if( !empty($social_icons) ) { ?>
							<div class="social-icons">
								<?php if( $social_icons ) {
									foreach( $social_icons as $row ) {
										$social_icon = $row['icons'];
										$social_link = $row['link'];
										echo '<a href="' . $social_link . '" target="_blank"><i class="icon-'.$social_icon.'"></i></a>' ;
									}
								} ?>
							</div>
						<?php } ?>
					</div>
				</div>
			<?php } ?>
        </div>
   </div>
</footer>

</div><!-- End "wrapper" -->

<?php wp_footer(); ?>

</body>

</html>
