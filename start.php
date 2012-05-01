<?php
/**
 * Pages-Extender start.php
 * 
 * @package Pages-Extender
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Jeff Tilson
 * @copyright THINK Global School 2010 - 2012
 * @link http://www.thinkglobalschool.com/
 * 
 */

// Register init
elgg_register_event_handler('init', 'system', 'pages_extender_init');

// Init
function pages_extender_init() {
	// Register library
	elgg_register_library('elgg:pagesextender', elgg_get_plugins_path() . 'pages-extender/lib/pagesextender.php');
	elgg_load_library('elgg:pagesextender'); // @TODO Load elsewhere?
	
	// Register JS
	$extender_js = elgg_get_simplecache_url('js', 'pagesextender/extender');
	elgg_register_simplecache_view('js/pagesextender/extender');
	elgg_register_js('elgg.pagesextender', $extender_js);

	// Register CSS
	$extender_css = elgg_get_simplecache_url('css', 'pagesextender/css');
	elgg_register_simplecache_view('css/pagesextender/css');
	elgg_register_css('elgg.pagesextender', $extender_css);
	
	elgg_load_css('elgg.pagesextender');
	elgg_load_js('elgg.pagesextender');
}