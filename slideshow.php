<?
/*
 * Plugin name: Slideshow
 */
if(!defined('WPINC')) die;

require_once plugin_dir_path(__FILE__) . 'classes/class.slideshow.php';

function run()
{
	$slideshow = new Slideshow();
	$slideshow->init();
}

run();