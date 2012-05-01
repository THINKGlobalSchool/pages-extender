<?php
/**
 * Pages-Extender JS Library
 * 
 * @package Pages-Extender
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Jeff Tilson
 * @copyright THINK Global School 2010 - 2012
 * @link http://www.thinkglobalschool.com/
 * 
 */
?>
//<script>
elgg.provide('elgg.pagesextender');

elgg.pagesextender.init = function() {

}

// Destroy and unbind events
elgg.pagesextender.destroy = function() {

}

elgg.register_hook_handler('init', 'system', elgg.pagesextender.init);