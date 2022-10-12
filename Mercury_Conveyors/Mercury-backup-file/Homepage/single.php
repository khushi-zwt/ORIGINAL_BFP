<?php get_header(); ?>

<main class="content">
	<div class="primary-container default-margin default-center">
		<div class="primary-text single-content">
			<?php
				if (has_post_thumbnail()) {
					$image = wp_get_attachment_url(get_post_thumbnail_id($post->ID), "thumbnail");
					$image_alt = get_post_meta(get_post_thumbnail_id($post->ID), "_wp_attachment_image_alt", "true");
				} else {
					$image = "/wp-content/themes/mercuryconveyors/images/placeholder.png";
					$image_alt = "The placeholder featured image.";
				}
			?>
			<img src="<?php echo $image; ?>" alt="<?php echo $image_alt; ?>" class="example-featured-image">
				<h1><?php the_title(); ?></h1>
				<p><?php echo get_the_date("d / m / y"); ?></p>
			<?php
				$category = get_the_category();
				$category = $category[0]->name;
				if (get_the_category()) {
			?>
			<!-- <p><i><?php echo $category; ?></i></p> -->
			<?php } ?>
			<?php the_content(); ?>
			<!-- <br><hr><br> -->
			<!-- <p class="blog-author-next">
				<span><b>Author</b> <i><?php echo get_the_author_meta("user_firstname") . " " . get_the_author_meta("user_lastname"); ?></i></span>
				<?php
					$next = get_next_post();
					if(get_next_post()) {
				?>
				<a href="<?php echo get_the_permalink($next); ?>" title="Next post"><u>Next post</u></a>
				<?php } ?>
			</p> -->
		</div>
	</div>
	</main>

<?php get_footer(); ?>
