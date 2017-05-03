<?php
if(!defined('WPINC')) die;

class Slideshow
{
	protected $loader;
	protected $plugin_slug;
	protected $version;

	public function __construct()
	{
		$this->plugin_slug = 'Slideshow';
		$this->version     = '0.1.0';

		$this->loadDependencies();
		$this->defineHooks();
	}

	public function addResources()
	{
		// Styles and scripts goes here
	}

	public function defineHooks()
	{
		$this->loader->addAction('init', $this, 'addPostType');
	}

	public function addPostType()
	{
		register_post_type('slideshow',[
			'label'  => 'Slideshows',
			'public' => true,
		]);
	}

	private function loadDependencies()
	{
		require_once plugin_dir_path(__FILE__) . 'class.loader.php';
		$this->loader = new Loader();
	}

	public function init()
	{
		$this->loader->init();
	}

	public function getVersion()
	{
		return $this->version;
	}
}