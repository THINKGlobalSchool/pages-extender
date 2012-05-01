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
 * OVERRIDES:
 *	- forms/pages/edit 
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
	
	// Hook into object create/update events to add page_type metadata
	elgg_register_event_handler('create', 'object', 'pages_extender_save');
	elgg_register_event_handler('update', 'object', 'pages_extender_save');

	// Hook into object/page_top view to add custom styles
	elgg_register_plugin_hook_handler('view', 'object/page_top', 'pages_extender_customize_view');
	
	elgg_load_css('elgg.pagesextender'); // @TODO Load elsewhere?
	elgg_load_js('elgg.pagesextender'); // @TODO Load elsewhere?
}

/**
 * Save page type to pages on save
 */
function pages_extender_save($event, $object_type, $object) {
	if (elgg_instanceof($object, 'object', 'page') || elgg_instanceof($object, 'object', 'page_top')) {
		$page_type = get_input('page_type');

		// Set page type metadata
		$object->page_type = $page_type;
	}
	return TRUE;
}

/**
 * Post process object/page_top view to add custom styles
 */
function pages_extender_customize_view($hook, $type, $result, $params) {
	if (elgg_get_viewtype() != "default") {
		return;
	}
	
	$entity = $params['vars']['entity'];
	
	if ($entity->page_type) {
		$result = "<div class='pages-custom-type-{$entity->page_type}'>{$result}</div>";
	}
	
	return $result;
}