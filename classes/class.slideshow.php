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
		$admin = new Admin();
		$this->loader->addAction('admin_menu', $admin, 'addSettingsPage');
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
		require_once plugin_dir_path(__FILE__) . 'class.admin.php';
		$this->loader = new Loader();
	}

	public function init()
	{
		$this->loader->init();
	}

	public static function setTable()
	{
		global $wpdb;

		$table_name = $wpdb->prefix . 'sliders';

		if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name)
		{
			$charset = $wpdb->get_charset_collate();
			
			$query   = "CREATE TABLE $table_name (
			id mediumint(9) NOT NULL AUTO_INCREMENT,
			post_id mediumint(9) NOT NULL,
			text text DEFAULT '' NOT NULL,
			image mediumint(9) NOT NULL,
			PRIMARY KEY  (id)
			) $charset;";

			require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
			dbDelta($query);  
		}

		return false;
	}

	public function getVersion()
	{
		return $this->version;
	}
}