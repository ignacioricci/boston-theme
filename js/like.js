jQuery(function(){

	jQuery('.like').click(function(e){
		
		e.preventDefault();
		var heart = jQuery(this);
		var post_id = heart.data('postid');
		var votes = parseInt(jQuery(heart).children('.likeCount').text());

		if(jQuery(heart).hasClass('not-voted')){

			jQuery(heart).addClass('voting');
			setTimeout(function(){
				jQuery.ajax({
					type: 'post',
					url: ajax_var.url,
					data: 'action=post-like&nonce='+ajax_var.nonce+'&post_like=&post_id='+post_id,
					success: function(count){
						if(count !== 'denied'){
							jQuery(heart).removeClass('not-voted');
							jQuery(heart).addClass('just-voted');
							jQuery(heart).children('.likeCount').text(votes + 1);
						}
						jQuery(heart).removeClass('voting');
					}
				});
			}, 2000);

		}

	});

});