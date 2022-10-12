var $ = jQuery.noConflict();
$(document).ready(function () {
    if($('#paged_name_for_ajax').val()=='review'){
		var posts_per_page_review = blog_ajax_variable.posts_per_page;

        // Blog [load more]
        if ($('#blog_load_more_btn').length > 0) {
            $(document).on('click', 'a#blog_load_more_btn', function(event) {
				//console.log('test');
                event.preventDefault();

                var paged		= $(this).data('paged');
                review_ajax(paged);
            });
        }

        // Blog [Load more] function
		function review_ajax(paged){
			jQuery.ajax({
				type		:"post",
				url			:blog_ajax_variable.ajax_url, // AJAX handler
				data		:{
								'action'		: 'blog_load_more',
								'security'		: blog_ajax_variable.ajax_nonce,
								'posts_per_page': posts_per_page_review,
								'paged'			: paged,
							},
				dataType	:'json',
				cache		:false,
				success		:function(res) {
								if (res.response == 'success') {
                                    jQuery('#blog_load_more_holder').append(res.data.posts);
									jQuery('#blog_post_btn').html(res.data.load_more_btn);
									
								} else {
                                    jQuery('#blog_load_more_holder').html(res.data.posts);
									jQuery('#blog_post_btn').html('');
								}
							}
			});
		}
    }
});
