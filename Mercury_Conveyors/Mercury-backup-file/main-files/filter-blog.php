<?php
// Filter blog.
add_action('wp_ajax_filter_blog','misha_filter_function_blog');
add_action('wp_ajax_nopriv_filter_blog','misha_filter_function_blog');

function misha_filter_function_blog(){
  $post_args = array(
    'post_type' => 'post',
    'order' => 'DESC',
    'orderby' => 'DATE',
    'post_status' => 'publish',
    'posts_per_page' => 999,
    'cat' => $_POST['category-filter-blog'],
  );
	$post_loop = new WP_Query($post_args);
  
  if ($post_loop->have_posts()) {
    while ($post_loop->have_posts()) {
      $post_loop->the_post();
      if (has_post_thumbnail()) {
          $image_src = wp_get_attachment_url(get_post_thumbnail_id($post->ID), "thumbnail");
          $image_alt = get_post_meta(get_post_thumbnail_id($post->ID), "_wp_attachment_image_alt", "true");
      } else {
          $image_src = "/wp-content/themes/template/images/placeholder.png";
          $image_alt = "The placeholder featured image.";
      } ?>

<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="post" data-aos="fade-up">

  <?php if (has_post_thumbnail()) {
          $image_src = wp_get_attachment_url(get_post_thumbnail_id($post->ID), "thumbnail");
          $image_alt = get_post_meta(get_post_thumbnail_id($post->ID), "_wp_attachment_image_alt", "true");
        } else {
          $image_src = "/wp-content/themes/mercuryconveyors/images/placeholder.png";
          $image_alt = "The placeholder featured image.";
        } ?>

  <img src="<?php echo $image_src; ?>" alt="<?php echo $image_alt; ?>">
  <div class="title-button">
    <h3><?php the_title(); ?></h3>
    <p class="button">Read More</p>
  </div>
</a>

<?php wp_reset_postdata(); ?>

<script>
$(".no-results").removeClass("visible");
var blog_search_value = $("#search-blog").val().toLowerCase();

$("#response-blog .post").filter(function() {
  $(this).toggle($(this).find("h3").text().toLowerCase().indexOf(blog_search_value) > -1);
  if ($("#response-blog").children(":visible").length == 0) {
    $(".no-results").addClass("visible");
  } else {
    $(".no-results").removeClass("visible");
  }
});
</script>

<?php } } else { ?>

<script>
$(".no-results").addClass("visible");
</script>

<?php } die(); }