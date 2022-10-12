var $ = jQuery.noConflict();
$(document).ready(function () {
    if($('#cs_paged_name_for_ajax').val()=='case-study'){
		var posts_per_page_cs = cs_ajax_variable.posts_per_page;

        // Case Study [load more]
        if ($('#cs_load_more_btn').length > 0) {
            $(document).on('click', 'a#cs_load_more_btn', function(event) {
				//console.log('test');
                event.preventDefault();

                var paged		= $(this).data('paged');
                review_ajax(paged);
            });
        }

        // Case Study [Load more] function
		function review_ajax(paged){
			jQuery.ajax({
				type		:"post",
				url			: cs_ajax_variable.ajax_url, // AJAX handler
				data		:{
								'action'		: 'cs_load_more',
								'security'		: cs_ajax_variable.ajax_nonce,
								'posts_per_page': posts_per_page_cs,
								'paged'			: paged,
							},
				dataType	:'json',
				cache		:false,
				success		:function(res) {
								if (res.response == 'success') {
                                    jQuery('#cs_load_more_holder').append(res.data.posts);
									jQuery('#cs_post_btn').html(res.data.load_more_btn);
									
								} else {
                                    jQuery('#cs_load_more_holder').html(res.data.posts);
									jQuery('#cs_post_btn').html('');
								}
							}
			});
		}
    }
});
