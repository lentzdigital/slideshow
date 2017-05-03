<?php
if(!defined('WPINC')) die;

class Admin
{
	public function addPostType()
	{
		register_post_type('slideshow',[
			'label'  => 'Slideshows',
			'public' => true,
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

	public function addImageMetaBox()
	{
		echo '<h2>Test</h2>';
	}

	public function addSettingsPage()
	{
		add_menu_page(
			'Slider',
			'Slider',
			'manage_options',
			'slider.php',
			[$this, 'settingsPageView'],
			'f233',
			20
		);
	}

	public function settingsPageView()
	{
		require_once plugin_dir_path(__FILE__) . '../views/view.overview.php';
	}
}