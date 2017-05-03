<?
/*
 * Plugin name: Slideshow
 */
if(!defined('WPINC')) die;

require_once plugin_dir_path(__FILE__) . 'classes/class.slideshow.php';

$slideshow = new Slideshow;
register_activation_hook(__FILE__, [$slideshow, 'setTable']);
$slideshow->init();