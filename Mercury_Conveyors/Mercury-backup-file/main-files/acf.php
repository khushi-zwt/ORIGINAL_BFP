<?php
// Create ACF options page.
add_action('acf/init', 'my_acf_op_init');
function my_acf_op_init() {
  if( function_exists('acf_add_options_page') ) {
    $options_page = acf_add_options_page(array(
      'page_title'    => __('Theme Settings'),
      'menu_title'    => __('Theme Settings'),
      'menu_slug'     => 'theme-settings',
      'capability'    => 'edit_posts',
      'redirect'      => false
    ));
  }
}

// Add a default image option to ACF fields.
add_action('acf/render_field_settings/type=image', 'add_default_value_to_image_field');
function add_default_value_to_image_field($field) {
  acf_render_field_setting( $field, array(
    'label'			=> 'Default Image',
    'instructions'		=> 'Appears when creating a new post',
    'type'			=> 'image',
    'name'			=> 'default_value',
  ));
}

// Add functionality for auto-collapse of ACF boxes.
add_action('acf/input/admin_head', function() { ?>
<script>
(function($) {
  $(document).ready(function() {
    var collapseButtonClass = 'collapse-all';
    $('.acf-field-flexible-content > .acf-label')
      .append('<a class="' + collapseButtonClass +
        '" style="position: absolute; top: 0; right: 0; cursor: pointer;">Collapse All</a>');
    $('.' + collapseButtonClass).on('click', function() {
      $('.acf-flexible-content .layout:not(.-collapsed) .acf-fc-layout-controls .-collapse').click();
    });
  });
})(jQuery);
</script>
<?php });


/**
 * Acf Json file storing hook
 */
add_filter( 'acf/settings/save_json', 'acf_settings_save_json' );
add_filter( 'acf/settings/load_json', 'acf_settings_load_json' );

/**
 * Filter: acf/settings/save_json
 *
 * Specify directory to save ACF JSON to.
 *
 * @link https://www.advancedcustomfields.com/resources/local-json/ Documentation.
 *
 * @param string $path
 *
 * @return string
 */
function acf_settings_save_json( $path = '' ) {
    $theme_dir = get_template_directory() .'/app/acf-json';
    return $theme_dir;
}

/**
 * [acf_settings_load_json acf settings load function]
 * @param  [type] $paths [description]
 * @return [type]        [description]
 */
function acf_settings_load_json( $paths ) {
    return acf_settings_save_json();
}

/**
 * create acf guternburg blocks
 * @param  array $block
 */
add_action('acf/init', 'action__acf_init_block_types');
function action__acf_init_block_types() {

    // Check function exists.
    if( function_exists('acf_register_block_type') ) {

		acf_register_block_type(array(
			'name'              => 'hero-banner',
			'title'             => __('Hero banner'),
			'description'       => __('A custom banner block.'),
			'render_callback'   =>  'page_builder_acf_block_render_callback',
			'category'          => 'mercury',
			'icon'              => 'cover-image',
			'keywords'          => array( 'banner', 'hero' ),
            'mode'			  => 'edit',
			'example'           => array(
			    'attributes' => array(
			        'mode' => 'preview',
			        'data' => array(
                        'image' => '<img src="'. get_theme_file_uri() .'/app/images/acf-block/hero-banner-block.png' .'">'
			        )
			    )
			)
		));
		acf_register_block_type(array(
            'name'              => 'content',
            'title'             => __('Content Section'),
            'description'       => __('A custom content section.'),
			'render_callback'   =>  'page_builder_acf_block_render_callback',
			'category'          => 'mercury',
			'icon'              => 'text',
            'keywords'          => array( 'content' ),
			'example'           => array(
			    'attributes' => array(
			        'mode' => 'preview',
			        'data' => array(
                        'image' => '<img src="'. get_theme_file_uri() .'/app/images/acf-block/content-section.png' .'">'
			        )
			    )
			)
        ));
		acf_register_block_type(array(
            'name'              => 'product-slider',
            'title'             => __('Product Slider Section'),
            'description'       => __('A custom Product Slider section.'),
			'render_callback'   =>  'page_builder_acf_block_render_callback',
			'category'          => 'mercury',
			'icon'              => 'slides',
            'keywords'          => array( 'product-slider' ),
            'example'           => array(
			    'attributes' => array(
			        'mode' => 'preview',
			        'data' => array(
                        'image' => '<img src="'. get_theme_file_uri() .'/app/images/acf-block/products-section.png' .'">'
			        )
			    )
			)
        ));
		acf_register_block_type(array(
            'name'              => 'fifty-fifty-image-with-title-content',
            'title'             => __('Fifty Fifty image with title content Section'),
            'description'       => __('A custom Fifty Fifty image with title content section.'),
			'render_callback'   =>  'page_builder_acf_block_render_callback',
			'category'          => 'mercury',
			'icon'              => 'columns',
            'keywords'          => array( 'fifty-fifty','image-with-content' ),
            'example'           => array(
			    'attributes' => array(
			        'mode' => 'preview',
			        'data' => array(
                        'image' => '<img src="'. get_theme_file_uri() .'/app/images/acf-block/conveyor-care-section.png' .'">'
			        )
			    )
			)
        ));
		acf_register_block_type(array(
            'name'              => 'get-in-touch-section',
            'title'             => __('Get in touch Section'),
            'description'       => __('A custom Get-in-touch-section'),
			'render_callback'   =>  'page_builder_acf_block_render_callback',
			'category'          => 'mercury',
			'icon'              => 'text',
            'keywords'          => array( 'get-in-touch' ),
            'example'           => array(
			    'attributes' => array(
			        'mode' => 'preview',
			        'data' => array(
                        'image' => '<img src="'. get_theme_file_uri() .'/app/images/acf-block/get-in-touch-section.png' .'">'
			        )
			    )
			)
        ));
		acf_register_block_type(array(
            'name'              => 'conveyor-care-section',
            'title'             => __('Conveyor Care section'),
            'description'       => __('A custom Conveyor-Care-section'),
			'render_callback'   =>  'page_builder_acf_block_render_callback',
			'category'          => 'mercury',
			'icon'              => 'text',
            'keywords'          => array( 'conveyor','care','conveyor-care-section' ),
            'example'           => array(
			    'attributes' => array(
			        'mode' => 'preview',
			        'data' => array(
                        'image' => '<img src="'. get_theme_file_uri() .'/app/images/acf-block/conveyor-content-wrapper.png' .'">'
			        )
			    )
			)
        ));
		acf_register_block_type(array(
            'name'              => 'meet-the-team',
            'title'             => __('Meet the team'),
            'description'       => __('A custom Meet the team section'),
			'render_callback'   =>  'page_builder_acf_block_render_callback',
			'category'          => 'mercury',
			'icon'              => 'groups',
            'keywords'          => array( 'meet team','team' ),
            'example'           => array(
			    'attributes' => array(
			        'mode' => 'preview',
			        'data' => array(
                        'image' => '<img src="'. get_theme_file_uri() .'/app/images/acf-block/meet-section.png' .'">'
			        )
			    )
			)
        ));
		acf_register_block_type(array(
            'name'              => 'optional-extras',
            'title'             => __('Optional Extras'),
            'description'       => __('A custom Optional Extras section'),
			'render_callback'   =>  'page_builder_acf_block_render_callback',
			'category'          => 'mercury',
			'icon'              => 'align-right',
            'keywords'          => array( 'optional extras' ),
            'example'           => array(
			    'attributes' => array(
			        'mode' => 'preview',
			        'data' => array(
                        'image' => '<img src="'. get_theme_file_uri() .'/app/images/acf-block/optional-extras.png' .'">'
			        )
			    )
			)
        ));
		acf_register_block_type(array(
            'name'              => 'fifty-fifty-black-bg section',
            'title'             => __('Fifty fifty black bg section'),
            'description'       => __('A custom Fifty fifty black bg section'),
			'render_callback'   =>  'page_builder_acf_block_render_callback',
			'category'          => 'mercury',
			'icon'              => 'columns',
            'keywords'          => array( 'fifty-fifty-black','black-bg' ),
            'example'           => array(
			    'attributes' => array(
			        'mode' => 'preview',
			        'data' => array(
                        'image' => '<img src="'. get_theme_file_uri() .'/app/images/acf-block/fifty-fifty-section.png' .'">'
			        )
			    )
			)
        ));
		acf_register_block_type(array(
            'name'              => 'order-form',
            'title'             => __('Order Form'),
            'description'       => __('A custom Order Form'),
			'render_callback'   =>  'page_builder_acf_block_render_callback',
			'category'          => 'mercury',
			'icon'              => '<svg width="76px" height="76px" viewBox="0 0 76 76" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" baseProfile="full" enable-background="new 0 0 76.00 76.00" xml:space="preserve"><path fill="#000000" fill-opacity="1" stroke-width="0.2" stroke-linejoin="round" d="M 19,20L 33,20L 33,23L 19,23L 19,20 Z M 35,17.0001L 56.9999,17.0001L 56.9999,26.0001L 35,26.0001L 35,17.0001 Z M 37,19.0001L 37,24.0001L 54.9999,24.0001L 54.9999,19.0001L 37,19.0001 Z M 19,39L 42,39L 42,42L 19,42L 19,39 Z M 22,47L 23,47L 23,51L 22,51L 22,47 Z M 19,44L 57,44L 57,60L 19,60L 19,44 Z M 21,46L 21,58L 55,58L 55,46L 21,46 Z M 19,31L 33,31L 33,34L 19,34L 19,31 Z M 35,28L 57,28L 57,37L 35,37L 35,28 Z M 37,30L 37,35L 54.9999,35L 55,30L 37,30 Z M 38,33L 39,33L 39,34L 38,34L 38,33 Z M 38,22L 39,22L 39,23L 38,23L 38,22 Z M 40,33L 41,33L 41,34L 40,34L 40,33 Z M 42,33L 43,33L 43,34L 42,34L 42,33 Z M 40,22L 41,22L 41,23L 40,23L 40,22 Z M 42,22L 43,22L 43,23L 42,23L 42,22 Z "/></svg>',
            'keywords'          => array( 'Order Form'),
            'example'           => array(
			    'attributes' => array(
			        'mode' => 'preview',
			        'data' => array(
                        'image' => '<img src="'. get_theme_file_uri() .'/app/images/acf-block/order-form.png' .'">'
			        )
			    )
			)
        ));
		acf_register_block_type(array(
            'name'              => 'fifty-fifty-banner',
            'title'             => __('Fifty Fifty Banner'),
            'description'       => __('A custom Fifty fifty banner'),
			'render_callback'   =>  'page_builder_acf_block_render_callback',
			'category'          => 'mercury',
			'icon'              => 'columns',
            'keywords'          => array( 'Fifty fifty banner'),
            'example'           => array(
			    'attributes' => array(
			        'mode' => 'preview',
			        'data' => array(
                        'image' => '<img src="'. get_theme_file_uri() .'/app/images/acf-block/case-studies.png' .'">'
			        )
			    )
			)
        ));
		acf_register_block_type(array(
            'name'              => 'brand-and-model',
            'title'             => __('Brand and Model'),
            'description'       => __('A custom Brand and Model'),
			'render_callback'   =>  'page_builder_acf_block_render_callback',
			'category'          => 'mercury',
			'icon'              => 'editor-table',
            'keywords'          => array('Brand and Model'),
            'example'           => array(
			    'attributes' => array(
			        'mode' => 'preview',
			        'data' => array(
                        'image' => '<img src="'. get_theme_file_uri() .'/app/images/acf-block/brand-and-model.png' .'">'
			        )
			    )
			)
        ));
		acf_register_block_type(array(
            'name'              => 'how-can-we-help',
            'title'             => __('How can we help'),
            'description'       => __('A custom How can we help'),
			'render_callback'   =>  'page_builder_acf_block_render_callback',
			'category'          => 'mercury',
			'icon'              => 'editor-help',
            'keywords'          => array('How can we help'),
            'example'           => array(
			    'attributes' => array(
			        'mode' => 'preview',
			        'data' => array(
                        'image' => '<img src="'. get_theme_file_uri() .'/app/images/acf-block/how-can-we-help.png' .'">'
			        )
			    )
			)
        ));
		acf_register_block_type(array(
            'name'              => 'directors',
            'title'             => __('Directors'),
            'description'       => __('A custom Directors'),
			'render_callback'   =>  'page_builder_acf_block_render_callback',
			'category'          => 'mercury',
			'icon'              => 'email',
            'keywords'          => array('Directors'),
            'example'           => array(
			    'attributes' => array(
			        'mode' => 'preview',
			        'data' => array(
                        'image' => '<img src="'. get_theme_file_uri() .'/app/images/acf-block/directors-block.png' .'">'
			        )
			    )
			)
        ));
		acf_register_block_type(array(
            'name'              => 'site-address',
            'title'             => __('Site Address'),
            'description'       => __('A custom Site Address'),
			'render_callback'   =>  'page_builder_acf_block_render_callback',
			'category'          => 'mercury',
			'icon'              => 'location',
            'keywords'          => array('Site Address'),
            'example'           => array(
			    'attributes' => array(
			        'mode' => 'preview',
			        'data' => array(
                        'image' => '<img src="'. get_theme_file_uri() .'/app/images/acf-block/site-address.png' .'">'
			        )
			    )
			)
        ));
		
		acf_register_block_type(array(
            'name'              => 'blog',
            'title'             => __('Blog'),
            'description'       => __('A custom post type Blog'),
			'render_callback'   =>  'page_builder_acf_block_render_callback',
			'category'          => 'mercury',
			'icon'              => 'rss',
            'keywords'          => array('Blog'),
            'example'           => array(
			    'attributes' => array(
			        'mode' => 'preview',
			        'data' => array(
                        'image' => '<img src="'. get_theme_file_uri() .'/app/images/acf-block/blog-section.png' .'">'
			        )
			    )
			)
        ));
		acf_register_block_type(array(
            'name'              => 'case-study',
            'title'             => __('Case Study'),
            'description'       => __('A custom post type Case Study'),
			'render_callback'   =>  'page_builder_acf_block_render_callback',
			'category'          => 'mercury',
			'icon'              => '<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="256px" height="190px" viewBox="0 0 256 190" enable-background="new 0 0 256 190" xml:space="preserve"><path d="M48.12,27.903C48.12,13.564,59.592,2,74.023,2c14.339,0,25.903,11.564,25.903,25.903 C99.834,42.335,88.27,53.806,74.023,53.806C59.684,53.806,48.12,42.242,48.12,27.903z M191,139h-47V97c0-20.461-17.881-37-38-37H43 C20.912,60,1.99,79.14,2,98v77c-0.026,8.533,6.001,12.989,12,13c6.014,0.011,12-4.445,12-13v-75h8v88h78v-88h8l0.081,50.37 c-0.053,8.729,5.342,12.446,10.919,12.63h60C207.363,163,207.363,139,191,139z M235.813,94.924h-12.125v-6.063h-36.375v6.063 h-12.125v-6.063H157v36.375h97V88.862h-18.188V94.924z M223.688,58.549V40.362h-36.375v18.188H157v24.25h97v-24.25H223.688z M194.891,47.94h21.219v10.609h-21.219V47.94z"/></svg>',
            'keywords'          => array('Case Study'),
            'example'           => array(
			    'attributes' => array(
			        'mode' => 'preview',
			        'data' => array(
                        'image' => '<img src="'. get_theme_file_uri() .'/app/images/acf-block/case-studies-section.png' .'">'
			        )
			    )
			)
        ));
		acf_register_block_type(array(
            'name'              => 'product-banner',
            'title'             => __('Product Banner'),
            'description'       => __('product page main banner'),
			'render_callback'   =>  'page_builder_acf_block_render_callback',
			'category'          => 'mercury',
			'icon'              => 'cover-image',
            'keywords'          => array('Product Banner'),
            'example'           => array(
			    'attributes' => array(
			        'mode' => 'preview',
			        'data' => array(
                        'image' => '<img src="'. get_theme_file_uri() .'/app/images/acf-block/telescopic-conveyor.png' .'">'
			        )
			    )
			)
        ));
		acf_register_block_type(array(
            'name'              => 'product-description',
            'title'             => __('Product Description'),
            'description'       => __('product description block'),
			'render_callback'   =>  'page_builder_acf_block_render_callback',
			'category'          => 'mercury',
			'icon'              => 'text',
            'keywords'          => array('Product Description'),
            'example'           => array(
			    'attributes' => array(
			        'mode' => 'preview',
			        'data' => array(
                        'image' => '<img src="'. get_theme_file_uri() .'/app/images/acf-block/product-information-section.png' .'">'
			        )
			    )
			)
        ));
		acf_register_block_type(array(
            'name'              => 'about-mcs-banner',
            'title'             => __('About MCS Banner'),
            'description'       => __('about mcs banner description block'),
			'render_callback'   =>  'page_builder_acf_block_render_callback',
			'category'          => 'mercury',
			'icon'              => 'cover-image',
            'keywords'          => array('About MCS Banner'),
            'example'           => array(
			    'attributes' => array(
			        'mode' => 'preview',
			        'data' => array(
                        'image' => '<img src="'. get_theme_file_uri() .'/app/images/acf-block/about-mcs-banner.png' .'">'
			        )
			    )
			)
        ));
		acf_register_block_type(array(
            'name'              => 'about-content-block',
            'title'             => __('About Content Block'),
            'description'       => __('about block'),
			'render_callback'   =>  'page_builder_acf_block_render_callback',
			'category'          => 'mercury',
			'icon'              => 'text',
            'keywords'          => array('About Block'),
            'example'           => array(
			    'attributes' => array(
			        'mode' => 'preview',
			        'data' => array(
                        'image' => '<img src="'. get_theme_file_uri() .'/app/images/acf-block/about-content.png' .'">'
			        )
			    )
			)
        ));
		acf_register_block_type(array(
            'name'              => 'three-round-block',
            'title'             => __('Three Round Block'),
            'description'       => __('about block'),
			'render_callback'   =>  'page_builder_acf_block_render_callback',
			'category'          => 'mercury',
			'icon'              => 'ellipsis',
            'keywords'          => array('Three Round Block'),
            'example'           => array(
			    'attributes' => array(
			        'mode' => 'preview',
			        'data' => array(
                        'image' => '<img src="'. get_theme_file_uri() .'/app/images/acf-block/three-round-block.png' .'">'
			        )
			    )
			)
        ));
		acf_register_block_type(array(
            'name'              => 'contact-page-banner',
            'title'             => __('Contact Page Banner'),
            'description'       => __('contact page banner'),
			'render_callback'   =>  'page_builder_acf_block_render_callback',
			'category'          => 'mercury',
			'icon'              => 'cover-image',
            'keywords'          => array('Contact Page Banner'),
            'example'           => array(
			    'attributes' => array(
			        'mode' => 'preview',
			        'data' => array(
                        'image' => '<img src="'. get_theme_file_uri() .'/app/images/acf-block/contact-page-banner.png' .'">'
			        )
			    )
			)
        ));
		acf_register_block_type(array(
            'name'              => 'contact-form-block',
            'title'             => __('Contact Form Block'),
            'description'       => __('contact form'),
			'render_callback'   =>  'page_builder_acf_block_render_callback',
			'category'          => 'mercury',
			'icon'              => '<svg width="76px" height="76px" viewBox="0 0 76 76" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" baseProfile="full" enable-background="new 0 0 76.00 76.00" xml:space="preserve"><path fill="#000000" fill-opacity="1" stroke-width="0.2" stroke-linejoin="round" d="M 19,20L 33,20L 33,23L 19,23L 19,20 Z M 35,17.0001L 56.9999,17.0001L 56.9999,26.0001L 35,26.0001L 35,17.0001 Z M 37,19.0001L 37,24.0001L 54.9999,24.0001L 54.9999,19.0001L 37,19.0001 Z M 19,39L 42,39L 42,42L 19,42L 19,39 Z M 22,47L 23,47L 23,51L 22,51L 22,47 Z M 19,44L 57,44L 57,60L 19,60L 19,44 Z M 21,46L 21,58L 55,58L 55,46L 21,46 Z M 19,31L 33,31L 33,34L 19,34L 19,31 Z M 35,28L 57,28L 57,37L 35,37L 35,28 Z M 37,30L 37,35L 54.9999,35L 55,30L 37,30 Z M 38,33L 39,33L 39,34L 38,34L 38,33 Z M 38,22L 39,22L 39,23L 38,23L 38,22 Z M 40,33L 41,33L 41,34L 40,34L 40,33 Z M 42,33L 43,33L 43,34L 42,34L 42,33 Z M 40,22L 41,22L 41,23L 40,23L 40,22 Z M 42,22L 43,22L 43,23L 42,23L 42,22 Z "/></svg>',
            'keywords'          => array('Contact Form Block'),
            'example'           => array(
			    'attributes' => array(
			        'mode' => 'preview',
			        'data' => array(
                        'image' => '<img src="'. get_theme_file_uri() .'/app/images/acf-block/contact-form.png' .'">'
			        )
			    )
			)
        ));
		acf_register_block_type(array(
            'name'              => 'blog-listing',
            'title'             => __('Blog Listing'),
            'description'       => __('blog listing page'),
			'render_callback'   =>  'page_builder_acf_block_render_callback',
			'category'          => 'mercury',
			'icon'              => 'list-view',
            'keywords'          => array('blog-two-col-layout'),
            'example'           => array(
			    'attributes' => array(
			        'mode' => 'preview',
			        'data' => array(
                        'image' => '<img src="'. get_theme_file_uri() .'/app/images/acf-block/fifty-fifty-image-title-with-link.png' .'">'
			        )
			    )
			)
        ));
	}
}
/**
 * [page_builder_acf_block_render_callback - Function to call layout of cards]
 * @param  array $block
 */
function page_builder_acf_block_render_callback( $block,$content = '', $is_preview = false) {

    if ( $is_preview && ! empty( $block['data'] ) ) :
  		echo $block['data']['image'];
  		return;
  	else :
  		if ( $block ) :
  			$slug = str_replace('acf/', '', $block['name']);
  			if( file_exists( get_theme_file_path("/includes/blocks/{$slug}.php") ) ) :
  				include( get_theme_file_path("/includes/blocks/{$slug}.php") );
  			endif;
  		endif;
  	endif;
}

// acf gutenburg category
function filter__block_category( $categories, $post ) {
	return array_merge(
		$categories,
		array(
			array(
				'slug' => 'mercury',
				'title' => 'Mercury Conveyors Blocks',
			),
		)
	);
}
add_filter( 'block_categories_all', 'filter__block_category', 1, 2);
