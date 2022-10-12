<?php
// $blog_hideshow  = get_field('blog_hideshow');
$blog_load_more = get_field('blog_load_more');

wp_reset_query();
$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
?>

<?php
$args = [
    "post_type"      => "post",
    "post_status"    => "publish",
	"posts_per_page" =>  4,
	"order"          => 'DESC',
];
$the_query = new WP_Query($args);

if ($the_query->have_posts()) {
	$post_count  = $the_query->post_count;
	$found_posts = $the_query->found_posts;  ?>
	<div class="fifty-fifty-image-title-with-link">
		<div class="container">
			<input id="paged" type="hidden" value="<?php echo $paged; ?>" name="paged">
			<input id="paged_name_for_ajax" type="hidden" value="review" name="paged_name">
		<div class="fifty-fifty-slider" id="blog_load_more_holder">
			<?php while($the_query->have_posts()) { $the_query->the_post(); 
					$image          = get_the_post_thumbnail_url(get_the_ID(), 'featured-img-size');
					$image_id       = get_post_thumbnail_id();
					$image_alt      = get_post_meta($image_id, '_wp_attachment_image_alt', TRUE);
					$blog_content   = wp_trim_words( get_the_content(), 55, '' ); ?>
					<div class="main-block fifty-fifty-block">
						<div class="left-block">
							<div class="title-content-link">
								<a href="<?php the_permalink(); ?>" class="h3"><?php the_title();?></a>
								<?php echo $blog_content;?>
								<a href="<?php the_permalink(); ?>" class="btn-link"><?php echo __( 'Read more', 'mercuryconveyors' ); ?></a>
							</div>
						</div>
						<div class="right-block">
							<a href="<?php the_permalink(); ?>" class="image-wrapper">
								<img src="<?php echo $image; ?>" alt="<?php echo $image_alt; ?>" />
							</a>
						</div>
					</div>
			<?php } wp_reset_postdata(); ?>
		</div>
		<?php if( !empty($blog_load_more) ) {
			$blog_title = $blog_load_more['title'];
				if($found_posts > 1){ ?>
					<div class="blog-post-btn" id="blog_post_btn">
						<a class="btn" id="blog_load_more_btn" href="javascript:void(0)" data-paged="<?php echo $paged; ?>"><?php echo esc_html( $blog_title); ?></a>
					</div>
			<?php } ?>
		<?php } ?>
	</div>
</div>
<?php  } ?>


