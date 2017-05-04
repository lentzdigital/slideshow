<?php
if(!defined('WPINC')) die;

class Admin
{
	public function addPostType()
	{
		register_post_type('slideshow',[
			'label'  => 'Slideshows',
			'public' => true,
			'supports' => [
				'title'
			]
		]);
	}

	public function addMetaBoxes()
	{
		add_meta_box(
			'slider-images',
			'Images', 
			[$this, 'addImageMetaBox'], 
			'slideshow', 
			'normal'
		);
	}

	public function getSlides($post)
	{
		global $wpdb;
		$table = $wpdb->prefix . 'sliders';

		$query = $wpdb->get_results("SELECT text, image FROM $table WHERE post_id = $post->ID");

		return $query;
	}

	public function addImageMetaBox($post_id)
	{
		require_once plugin_dir_path(__FILE__) . '../views/view.images_meta_box.php';
	}

	public function saveSlide($post_id)
	{
		global $wpdb;
		global $post;

		$current_id = $post_id;
		$url        = $_POST['image_url'];
		$text       = $_POST['image_text'];

		foreach($url as $key => $n)
		{
			$wpdb->insert($wpdb->prefix . 'sliders', [
				'post_id' => $current_id,
				'text' => $text[$key],
				'image' => $url[$key]
			]);
		}
	}

	public static function addShortcode($atts)
	{
		$slider_id = $atts['slider_id'];

		global $wpdb;
		$table = $wpdb->prefix . 'sliders';

		$query = $wpdb->get_results("SELECT text, image FROM $table WHERE post_id = $slider_id");

		require_once plugin_dir_path(__FILE__) . '../views/view.shortcode.php';	
	}
}