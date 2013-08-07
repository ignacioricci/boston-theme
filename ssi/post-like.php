<?php

	$timebeforerevote = 1;
	add_action('wp_ajax_nopriv_post-like', 'post_like');
	add_action('wp_ajax_post-like', 'post_like');
	wp_enqueue_script('like_post', get_template_directory_uri().'/js/press/like.min.js', '', '', 1 );
	wp_localize_script('like_post', 'ajax_var', array(
		'url' => admin_url('admin-ajax.php'),
		'nonce' => wp_create_nonce('ajax-nonce')
	));

	function post_like(){
		
		$nonce = $_POST['nonce'];
	 
	    if (!wp_verify_nonce($nonce, 'ajax-nonce')){
	    	die ('No cheating!');
	    }
			
		if(isset($_POST['post_like'])){

			$ip = $_SERVER['REMOTE_ADDR'];
			$post_id = $_POST['post_id'];
			$meta_IP = get_post_meta($post_id, '_voted_IP');
			$voted_IP = $meta_IP[0];
			
			if(!is_array($voted_IP)){
				$voted_IP = array();
			}
			
			$meta_count = get_post_meta($post_id, '_votes_count', true);

			if(!hasAlreadyVoted($post_id)){
				
				$voted_IP[$ip] = time();
				update_post_meta($post_id, '_voted_IP', $voted_IP);
				update_post_meta($post_id, '_votes_count', ++$meta_count);
				die($meta_count);
			}
			else {
				echo "denied";
			}
		}
		exit;
	}

	function hasAlreadyVoted($post_id){
		
		global $timebeforerevote;
		$meta_IP = get_post_meta($post_id, '_voted_IP');
		$voted_IP = $meta_IP[0];
		
		if(!is_array($voted_IP)){
			$voted_IP = array();
		}

		$ip = $_SERVER['REMOTE_ADDR'];
		
		if(in_array($ip, array_keys($voted_IP))){		
			$time = $voted_IP[$ip];
			$now = time();
			if(round(($now - $time) / 60) > $timebeforerevote){
				return false;
			}
			return true;
		}	
		return false;
	}

	function like_status($post_id){
		if(hasAlreadyVoted($post_id)){
			echo 'just-voted';
		}
		else {
			echo 'not-voted';
		}
	}

	function like_count($post_id){
		$vote_count = get_post_meta($post_id, '_votes_count', true);
		if ($vote_count){
			echo $vote_count;
		}
		else {
			echo '0';
		}
	}

?>