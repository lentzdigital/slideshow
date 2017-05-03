<?php
if(!defined('WPINC')) die;

class Admin
{
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
		echo '<h1>Test</h1>';
	}
}