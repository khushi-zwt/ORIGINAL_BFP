<!DOCTYPE html>
<html lang="en-GB">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <meta name="description" content="" />
  <meta name="keywords" content="">
  <?php wp_head(); ?>
  <?php /*
    $title = get_the_title();
    if (is_404()) {
        $title = "Page Not Found";
    }
    if ($post->post_parent) {
        $title_parent = get_the_title($post->post_parent) . " | "; 
    } 
  <title><?php echo $title; echo " | "; echo $title_parent; echo get_bloginfo("name", "display"); echo " | "; echo get_bloginfo("description", "display"); ?></title>
  */
  ?>
  <script>
    /MSIE \d|Trident.*rv:/.test(navigator.userAgent)&&(window.location="microsoft-edge:"+window.location,setTimeout(function(){window.open("","_self","").close()},1));
  </script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@200;300;400;600;700;900&display=swap" rel="stylesheet">
</head>

<body <?= body_class(); ?>>
<?php /* if( is_front_page() || is_home() ) { ?>
  <div class="spinner-load"> <div class="spinner-load-inner"> <img src="<?php echo esc_url($brand_url); ?>" alt="<?php echo esc_attr($brand_alt); ?>"> </div> </div>
<?php } */ 
$header_logo = get_field('header_logo', 'option');

?>
<!-- start -->
<div class="wrapper">
  <div class="main-container">
    <!-- device menu -->
    <div class="mbnav">
      <div class="mbnav__backdrop"></div>
      <div class="mbnav__state" data-clickable="true">
        <!--  main responsive menu -->
        <div class="mbnav__inner">
          <?= wp_nav_menu( 
            array( 
              'theme_location' => 'menu',
              'container'      => 'div', 
              'container_class' => 'main-menu' 
            ) 
          ); ?>
        </div>
          <div class="social-media">
              <a href=""><i class="icon-email"></i></a>
              <a href=""><i class="icon-phone"></i></a>
          </div>
      </div>
    </div>
    <!-- header part -->
    <header class="main-header">
      <div class="container-fluid">
        <div class="main-header--wrap d-flex align-items-center justify-content-between">
          <?php if( $header_logo ) {  ?>
            <a href="<?php echo site_url();?>" class="brand">
              <?php $extension = pathinfo($header_logo['url'], PATHINFO_EXTENSION); 
              if( $extension == 'svg' ) { ?>
                <img src="<?php echo $header_logo['url']; ?>" alt="<?php echo $header_logo['alt']; ?>" />
              <?php } else { ?>
                <?php echo wp_icon( $header_logo['url'] ); ?>
              <?php } ?>
            </a>
          <?php } ?>
          <nav>
            <?= wp_nav_menu( 
              array( 
                'theme_location' => 'menu',
                'container'      => 'div', 
                'container_class' => 'main-menu' 
              ) 
            ); ?>
          </nav>
          <a href="javascript:;" class="hamburger">
            <span class="hamburger__wrap">
              <span class="hamburger__line"></span>
            </span>
          </a>
        </div>
      </div>
    </header>