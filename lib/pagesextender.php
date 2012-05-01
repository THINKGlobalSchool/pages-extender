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

/**
 * Helper function to grab custom page types
 * 
 * @return array
 */
function pages_extender_get_page_types() {
	$page_types = array(
		'essay',
		'tutorial',
	);

	// @TODO config? plugin hook?
	return $page_types;
}

/**
 * Helper function to grab an array of dropdown friendly
 * page type array
 * 
 * @return array
 */
function pages_extender_get_page_types_array() {
	$page_types = pages_extender_get_page_types();

	$page_types_array = array(
		0 => 'None',
	);

	foreach ($page_types as $type) {
		$page_types_array[$type] = elgg_echo("pages-extender:type:{$type}");
	}

	return $page_types_array;
}