<!-- footer part -->
<footer class="main-footer">
   <div class="container">
        <div class="row">
            <div class="cell-md-3 cell-lg-4 cell-xl-6">
                <a href="#" class="footer-logo">
                    <img src="<?php echo get_template_directory_uri(); ?>/app/images/footer-image.svg" />   
                </a>
            </div>
            <div class="cell-md-9 cell-lg-8 cell-xl-6">
               <div class="footer-right-content d-flex">
                    <div class="footer-list-content">
                            <!-- <ul class="d-flex">
                                <li><a href="#">Products</a></li>
                                <li><a href="#">Case Studies</a></li>
                                <li><a href="#">Cookie Policy</a></li>
                                <li><a href="#">Conveyor Care</a></li>
                                <li><a href="#">Blog</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">About MCS</a></li>
                                <li><a href="#">Contact</a></li>
                                <li><a href="#">Terms and Conditions</a></li>
                            </ul> -->
							<?= wp_nav_menu(
								array( 
									'theme_location' => 'footer',
									'container'      => 'div', 
									'container_class' => 'footer-menu',
									'items_wrap'           => '<ul id="%1$s" class="d-flex">%3$s</ul>',
								)
							); ?>
                    </div>
                    <div class="social-icons">
                        <a href="#"><i class="icon-twitter"></i></a>
                        <a href="#"><i class="icon-facebook"></i></a>
                        <a href="#"><i class="icon-linkedin"></i></a>
                        <a href="#"><i class="icon-instagram"></i></a>
                    </div>
               </div>
            </div>
        </div>
   </div>
</footer>

</div><!-- End "wrapper" -->

<?php wp_footer(); ?>

</body>

</html>
