<?php
$main_title = get_field('main_title');
$blog_posts = get_field('blog_posts');
?>
<?php if( !empty($blog_posts) ) { ?>
<div class="blog-section">
	<?php	if( !empty( $main_title ) ) { ?>
		<h2 class="h1 text-center"><?php echo $main_title ; ?></h2>
	<?php }
	if( !empty( $blog_posts  ) ) { ?>
		<div class="blog-slider blog-wrapper">
			<?php foreach( $blog_posts as $post ) { setup_postdata($post);
				$blog_image   = get_the_post_thumbnail( $post->ID );
				$blog_title   = $post->post_title;
				$blog_content = wp_trim_words( $post->post_content, 15, '' );
			?>
			<?php if( !empty( $blog_image || $blog_title || $blog_content ) ) { ?>
				<a href="<?php the_permalink( $post->ID ); ?>" class="block">
					<?php if( !empty( $blog_image ) ) { ?>
						<div class="blog-img-wrapper">
							<?php echo $blog_image; ?>
						</div>
					<?php } ?>
					<div class="blog-content">
						<?php if( !empty( $blog_title ) ) { ?>
							<h4 class="h4"><?php echo $blog_title; ?></h4>
						<?php } ?>
						<?php if( !empty( $blog_content ) ) { ?>
							<p> <?php echo $blog_content; ?></p>
						<?php } ?>
						<div  class="btn-link"><?php echo __( 'Read more', 'mercuryconveyors' ); ?></div>
					</div>
				</a>
			<?php } } wp_reset_postdata(); ?>
		</div>
	<?php } ?>
</div>
<?php } ?>
