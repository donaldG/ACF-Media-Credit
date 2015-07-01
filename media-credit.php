<?php
/*
  Plugin Name: Advanced Custom Fields Media Credit
  Description: This plugin adds Credit & Credit Link fields to the media uploading and editing tool and inserts this credit when the images appear on your blog.
  Version: 1.3.2
  Author: Don Gaines
  Author URI: http://www.dongaines.com
*/

include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

/**
 * Let's make sure ACF Pro is installed & activated
 * If not, we give notice and kill the activation of ACF Media Credit.
 * Also works if ACF Pro is deactivated.
 * @donaldG
 */
add_action('admin_init', 'acf_pro_or_die');

if(!function_exists('acf_pro_or_die')){
	function acf_pro_or_die(){
		if (! function_exists('acf_register_repeater_field') && ! class_exists('acf') ) {
			deactivate_plugins( plugin_basename( __FILE__ ) );   
				if ( isset( $_GET['activate'] ) ) {
					unset( $_GET['activate'] );
				}
			add_action( 'admin_notices', 'acf_dependent_plugin_notice' );
		}
	}
}

function acf_dependent_plugin_notice(){
	?><div class="error"><p>ACF Media Credit requires Advanced Custom Fields Pro to be installed &amp; active or the free version of ACF with the ACF Repeater premium add-on installed &amp; active.</p></div>
<?php
}

/**
 * Let's define some shtuff, shall we?
 * @donaldG
 */
define( 'MEDIA_CREDIT_URL', plugins_url(plugin_basename(dirname(__FILE__)).'/') );

/**
 * Include fields based on what kind of ACF is installed.
 * This works b/c the plugin won't load w/o ACF Repeater add-on or ACF Pro.
 * So, we really only need to check for ACF Repeater add-on. If it doesn't exist then 
 * we include fields created in the Pro version.
 * @donaldG
 */
function add_acf_fields(){
	//this is our check for the Repeater add-on
	if(function_exists('acf_register_repeater_field')){
		include_once( plugin_dir_path(__FILE__) . 'inc/acf-media-credit-fields.php');
	}
	else{	
		include_once( plugin_dir_path(__FILE__) . 'inc/acf-pro-media-credit-fields.php');
	}
}
add_action('init', 'add_acf_fields');


/**
 * returns media credit array
 * use: print_r(get_media_credit($attachment_id)); to display on front end
 * @donaldG
 */
if(!function_exists('get_media_credit')){
	function get_media_credit($attachment_id) {
		$rows = get_field('media_credit', $attachment_id);
		return $rows;
	}
}

/**
 * Template tag to return the media credit as html.
 * @donaldG
 * @param int|object $attachment_id is the attachment object ID
 */
if(!function_exists('the_media_credit_html')){
	function the_media_credit_html($attachment_id) {
		if ( have_rows('media_credit', $attachment_id ) ) :
		
			$image_credit = '<span class="acf-media-credit">';
			$i = 1;
			$total = count(get_field('media_credit', $attachment_id));
		
			//http://www.advancedcustomfields.com/resources/repeater/		
			while( have_rows( 'media_credit', $attachment_id ) ) : the_row();		 
				$image_credit .= '<span class="acf-credit">';
				$credit = get_sub_field('credit');
				$credit_link = get_sub_field('credit_link'); 
				
		    // If credit is linked, else just display credit
		    // Also checks if any subsequent empty fields have been added & if so do nothing
		    if($i == 1){
		     	if (!empty($credit_link) && !empty($credit) ) {
		    		$image_credit .= '<span class="acf-credit"><a href="'.$credit_link.'" target="_blank">'.$credit.'</a></span>';
		     	} 
		     	else{
		     		$image_credit .= '<span class="acf-credit">' . $credit . '</span>';
		     	}
				}
				else if(!empty($credit)){
					if (!empty($credit_link) && !empty($credit) ) {
		    		$image_credit .= ' | <span class="acf-credit"><a href="'.$credit_link.'" target="_blank">'.$credit.'</a></span>';
		     	} else{
		     		$image_credit .= ' | <span class="acf-credit">'. $credit .'</span>';
		     	}	
				}
				else{
				}

				$image_credit .= '</span>';
				$i++;
		
			endwhile;
		
			$image_credit .= '</span>';
	
		endif;
	
		return $image_credit;
	}
}

/**
 * Template tag to print the media credit as html.
 * @param int|object $attachment_id is the attachment object ID
 * @donaldG
 */
if(!function_exists('the_media_credit')){
	function the_media_credit($attachment_id) {
		echo the_media_credit_html($attachment_id);
	}
}

/**
 * Template tag to print the media credit as html.
 * @param int|object $attachment_id is the attachment object ID
 * @donaldG
 */
if(!function_exists('the_plain_media_credit')){
	function the_plain_media_credit($attachment_id) {
		if ( have_rows('media_credit', $attachment_id ) ) :
		
			$image_credit = '';
			$i = 1;
			$total = count(get_field('media_credit', $attachment_id));
			
				while( have_rows( 'media_credit', $attachment_id ) ) : the_row();

					$image_credit .= '';
					$credit = get_sub_field('credit');
					$credit_link = get_sub_field('credit_link');
			      
		    	// If credit is linked, else just display credit
		    	// Also checks if any subsequent empty fields have been added & if so do nothing
		  	  if($i == 1){
			     	if (!empty($credit_link) && !empty($credit) ) {
			    		$image_credit .= '<span class="acf-credit"><a href="'.$credit_link.'" target="_blank">'.$credit.'</a></span>';
			     	} 
		    	 	else{
		  	   		$image_credit .= '<span class="acf-credit">' . $credit . '</span>';
			     	}
					}
					else if(!empty($credit)){
						if (!empty($credit_link) && !empty($credit) ) {
			    		$image_credit .= ' | <span class="acf-credit"><a href="'.$credit_link.'" target="_blank">'.$credit.'</a></span>';
			     	} else{
			     		$image_credit .= ' | <span class="acf-credit">'. $credit .'</span>';
		     		}	
					}
					else{
					}
					$image_credit .= '';
				  $i++;

				endwhile;

			$image_credit .= '';

		endif;

	return $image_credit;
	}
}

/**
 * Template tag to print the current post's thumbnail media credit as html.
 * @param int|object $post Optional post ID or object of attachment. Default is global $post object.
 * @donaldG
 */
if (!function_exists('the_post_thumbnail_media_credit')) {
	function the_post_thumbnail_media_credit($post_id=null) {
		global $post;
		if ( $post_id && $post_id != 0) {
			$post_thumbnail_id = get_post_thumbnail_id( $post_id ) ;
		}
		else{
			$post_thumbnail_id = get_post_thumbnail_id( $post->ID ) ;
		}
		the_media_credit($post_thumbnail_id);
	}
}

if ( !function_exists( 'get_the_post_thumbnail_media_credit' ) ) {
	function get_the_post_thumbnail_media_credit( $post_id = null ) {
		global $post;
		
		if ( $post_id && $post_id != 0) {
			$post_thumbnail_id = get_post_thumbnail_id( $post_id ) ;
		} else {
			$post_thumbnail_id = get_post_thumbnail_id( $post->ID ) ;
		}
		
		return the_media_credit_html( $post_thumbnail_id );
	}
}

/**
 * This just filters images that have the caption shortcode to grab any added classes
 * on the image and apply them to the wrapping caption div
 * From support: https://wordpress.org/support/topic/credit-disappears-if-class-added-to-image?replies=3#post-6726612
 * Support for adding classes to un-captioned images in located in the filter_images() function
 * @donaldG
 */
function filter_images_with_caption($content){
	$captioned_images = array();

	//find all images w/ caption
	preg_match_all('/\[caption(.*?)\](.*?)\[\/caption]/', $content, $captioned_images);
	if($captioned_images){
		
		foreach($captioned_images[0] as $captioned_image){
			if(preg_match('/\[caption(.*?)\](.*?)<img(.*?)class="(.*?)"(.*?)\[\/caption]/', $content)){
				$pattern = '/\[caption(.*?)\](.*?)<img(.*?)class="(.*?)"(.*?)\[\/caption]/';
				//this will add a new shortcode attribute of class that will not be seen in the edit screen
				//but will be interpreted by our filter_img_caption_shortcode function
				$new_captioned_image = '[caption${1} class="${4}"]${2}<img${3}class="${4}"${5}[/caption]';
			}
			$content = preg_replace($pattern, $new_captioned_image, $content);
		}
		
	}
	return $content;
}
add_filter('the_content', 'filter_images_with_caption');

/**
 * Filter the img caption shortcode to add our media credit 
 * using the get_captioned_credit($attachment_id) function
 * http://codex.wordpress.org/Plugin_API/Filter_Reference/img_caption_shortcode
 * @donaldG
 */
function filter_img_caption_shortcode( $empty, $attr, $content ){
	$attr = shortcode_atts( array(
		'id'      => '',
		'align'   => 'alignnone',
		'width'   => '',
		'caption' => '',
		//class is not native, it's interpreted from the filter_images_with_caption function above
		'class'		=> ''
	), $attr );

	if ( 1 > (int) $attr['width'] || empty( $attr['caption'] ) ) {
		return '';
	}
	
	$credit_id = $attr['id'];
	$credit_id = str_replace('attachment_', '', $credit_id);
	
	if(current_theme_supports( 'html5') && the_media_credit_html($credit_id) && get_field('media_credit', $credit_id) ){
		return '<figure id="attachment_' . $credit_id . '"'
		. 'class="media-credit-container wp-caption ' . esc_attr( $attr['align'] ) . ' '. esc_attr( $attr['class'] ) .'" '
		. 'style="max-width: ' . ( 10 + (int) $attr['width'] ) . 'px;">'
		. do_shortcode( $content )
		. the_media_credit_html($credit_id)
		. '<figcaption class="wp-caption-text">'. $attr['caption'] . '</figcaption>'
		. '</figure>';
	}
	else if( the_media_credit_html($credit_id) && get_field('media_credit', $credit_id) ){		
		return '<div id="attachment_' . $credit_id . '"'
		. 'class="media-credit-container wp-caption ' . esc_attr( $attr['align'] ) . ' '. esc_attr( $attr['class'] ) .'" '
		. 'style="max-width: ' . ( 10 + (int) $attr['width'] ) . 'px;">'
		. do_shortcode( $content )
		. the_media_credit_html($credit_id)
		. '<p class="wp-caption-text">'. $attr['caption'] . '</p>'
		. '</div>';
	}
	else{
		return '<div id="attachment_' . $credit_id . '"'
		. 'class="wp-caption ' . esc_attr( $attr['align'] ) . '" '
		. 'style="max-width: ' . ( 10 + (int) $attr['width'] ) . 'px;">'
		. do_shortcode( $content )
		. '<p class="wp-caption-text">' . $attr['caption'] . '</p>'
		. '</div>';
	}
}
add_filter( 'img_caption_shortcode', 'filter_img_caption_shortcode', 10, 3 );

/**
 * Filters the content for images and returns a wrapping div w/ the media credit following the image
 * or image link if it exists.
 * @donaldG & Alicia (@bedsheet) 
 * Thank you Alicia for helping me get started w/ the regex & fixing my loop!
 */
function filter_images($content){
	$images = array();
  	
	// Find all images with an ID in content
	preg_match_all( '/wp-image-[0-9]+/', $content, $images );

	if ($images) {
    	
  	// For each image build the credit and add to content
  	foreach ($images[0] as $image) {
  		//1.2.0 updates in case there are any other stray numbers that would've been picked up, was previously just [0-9]+
  		$get_id = preg_match('/wp-image-[0-9]+/', $image, $the_id);
  		$attachment_id = $the_id[0];
  		$attachment_id = str_replace('wp-image-', '', $attachment_id);

    	//http://www.advancedcustomfields.com/resources/repeater/		
	  	if ( have_rows('media_credit', $attachment_id ) ) :
	    	$image_credit = '<span class="acf-media-credit">';
	    	$i = 1;
				$total = count(get_field('media_credit', $attachment_id));  
		      
	      	while( have_rows( 'media_credit', $attachment_id ) ) : the_row();
		    		$image_credit .= '';
		    		$credit = get_sub_field('credit');
		    		$credit_link = get_sub_field('credit_link');
		      
		    		// If credit is linked, else just display credit
		    		// Also checks if any subsequent empty fields have been added & if so do nothing
		    		if($i == 1){
		      		if (!empty($credit_link) && !empty($credit) ) {
		      			$image_credit .= '<span class="acf-credit"><a href="'.$credit_link.'" target="_blank">'.$credit.'</a></span>';
		      		} 
		      		else{
		      			$image_credit .= '<span class="acf-credit">' . $credit . '</span>';
		      		}
						}
						else if(!empty($credit)){
							if (!empty($credit_link) && !empty($credit) ) {
		      			$image_credit .= ' | <span class="acf-credit"><a href="'.$credit_link.'" target="_blank">'.$credit.'</a></span>';
		      		} else{
		      			$image_credit .= ' | <span class="acf-credit">'. $credit .'</span>';
		      		}	
						}
						else{

						}
		    $image_credit .= '';
		  	$i++;
			endwhile;

			$image_credit .= '';

		  // Find image with our ID
		  // This may seem like a lot but we need to account for images wrapped in a <p> tag or if for some reason autop is turned off
		  // If things look broken it's b/c both images are in the same paragraph tag, they shouldn't be. So, don't do that!
			if(preg_match('/<p>\<a(.*?)\<img(.*?)class="align(.*?)wp-image-' . $attachment_id . '(.*?)"(.*?)\/><\/a><\/p>/', $content)){
				$pattern = '/<p>\<a(.*?)\<img(.*?)class="align(.*?)wp-image-' . $attachment_id . '(.*?)"(.*?)\/><\/a><\/p>/';
	  		$new_image = '<div class="${4} align${3}media-credit wp-image-'. $attachment_id .'"><a${1}<img${2}class="align${3}wp-image-' . $attachment_id . '${4}" ${5}></a>' . $image_credit . '</span></div>';
			}
			else if(preg_match('/<p(.*?)>\<a(.*?)\<img(.*?)class="align(.*?)wp-image-' . $attachment_id . '(.*?)"(.*?)\/><\/a><\/p>/', $content)){
				$pattern = '/<p(.*?)>\<a(.*?)\<img(.*?)class="align(.*?)wp-image-' . $attachment_id . '(.*?)"(.*?)\/><\/a><\/p>/';
	  		$new_image = '<div class="${5} align${4}media-credit wp-image-'. $attachment_id .'"><p${1}><a${2}<img${3}class="align${4}wp-image-' . $attachment_id . '${5}" ${6}></a>' . $image_credit . '</span></p></div>';
			}
			else if(preg_match('/\<a(.*?)\<img(.*?)class="align(.*?)wp-image-' . $attachment_id . '(.*?)"(.*?)\/><\/a>/', $content)){
				$pattern = '/\<a(.*?)\<img(.*?)class="align(.*?)wp-image-' . $attachment_id . '(.*?)"(.*?)\/><\/a>/';
	  		$new_image = '<div class="${4} align${3}media-credit wp-image-'.$attachment_id.'"><a${1}<img${2}class="align${3}wp-image-' . $attachment_id . '${4}" ${5}></a>' . $image_credit . '</span></div>';
			}
			else if(preg_match('/\<p>\<img(.*?)class="align(.*?)wp-image-' . $attachment_id . '(.*?)"(.*?)\/>(.*?)/', $content)){
				$pattern = '/\<p>\<img(.*?)class="align(.*?)wp-image-' . $attachment_id . '(.*?)"(.*?)\/>(.*?)/';
	  		$new_image = '<div class="${3} align${2}media-credit wp-image-'.$attachment_id.'"><img${1}class="align${2}wp-image-' . $attachment_id . '${3}" ${4}>' . $image_credit . '</span></div>';
	  	}
	  	else if(preg_match('/\<p(.*?)>\<img(.*?)class="align(.*?)wp-image-' . $attachment_id . '(.*?)"(.*?)\/>(.*?)/', $content)){
				$pattern = '/\<p(.*?)>\<img(.*?)class="align(.*?)wp-image-' . $attachment_id . '(.*?)"(.*?)\/>(.*?)/';
	  		$new_image = '<div class="${4} align${3}media-credit wp-image-'.$attachment_id.'"><p${1}><img${2}class="align${3}wp-image-' . $attachment_id . '${4}" ${5}>' . $image_credit . '</span></p></div>';
	  	}
	  	else if(preg_match('/\<div(.*?)class="(.*?)media-credit(.*?)">(.*?)\<\/div>/', $content)){
	  		$pattern = '/\<div(.*?)class="(.*?)media-credit(.*?)">(.*?)\<\/div>/';
	  		$new_image = '<div${1}class="${2}media-credit${3}">${4}</div>';
	  	}
	  	else{
				$pattern = '/\<img(.*?)class="align(.*?)wp-image-' . $attachment_id . '(.*?)"(.*?)>/';
	  		$new_image = '<div class="${3} align${2}media-credit wp-image-'.$attachment_id.'"><img${1}class="align${2}wp-image-' . $attachment_id . '${3}" ${4}>' . $image_credit . '</span></div>';		  		
	  	}
	  	$content = preg_replace($pattern, $new_image, $content);	
	
	  	endif;
		}
  }
return $content;
}
add_filter('the_content', 'filter_images'); 


/**
 * Enqueue the styles. These are quite minimal.
 * @donaldG
 */
function media_credit_stylesheet() {
	wp_enqueue_style( 'media-credit', MEDIA_CREDIT_URL . 'css/media-credit.min.css', array(), 1.0, 'all');
}
add_action('wp_print_styles', 'media_credit_stylesheet');

/**
 * Custom Stylesheet added to the WP Admin CSS in the header of the page to help out the display of 
 * the ACF fields
 * @donaldG
 */
function media_load_custom_wp_admin_style() {
	wp_register_style( 'custom_wp_admin_css', MEDIA_CREDIT_URL . 'css/media-credit-admin-style.min.css', false, '1.0.0' );
	wp_enqueue_style( 'custom_wp_admin_css' );
}
add_action( 'admin_enqueue_scripts', 'media_load_custom_wp_admin_style' );