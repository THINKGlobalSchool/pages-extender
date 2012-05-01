<?php
/**
 * Pages-Extender start.php
 * 
 * - Override for regular pages edit form
 * 
 * @package Pages-Extender
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Jeff Tilson
 * @copyright THINK Global School 2010 - 2012
 * @link http://www.thinkglobalschool.com/ 
 *
 * Page edit form body
 *
 * @package ElggPages
 */

$variables = elgg_get_config('pages');
foreach ($variables as $name => $type) {
?>
<div>
	<label><?php echo elgg_echo("pages:$name") ?></label>
	<?php
		if ($type != 'longtext') {
			echo '<br />';
		}
	?>
	<?php echo elgg_view("input/$type", array(
			'name' => $name,
			'value' => $vars[$name],
		));
	?>
</div>
<?php
}

// Load existing page type
if ($vars['guid']) {
	$page = get_entity($vars['guid']);
	$page_type = $page->page_type;
}

$page_types = pages_extender_get_page_types_array();

?>
<div>
	<label><?php echo elgg_echo("pages:page_type") ?></label><br />
	<?php
		echo elgg_view("input/dropdown", array(
			'name' => 'page_type',
			'value' => $page_type,
			'options_values' => $page_types,
		));
	?>
</div>
<?php
$cats = elgg_view('input/categories', $vars);
if (!empty($cats)) {
	echo $cats;
}


echo '<div class="elgg-foot">';
if ($vars['guid']) {
	echo elgg_view('input/hidden', array(
		'name' => 'page_guid',
		'value' => $vars['guid'],
	));
}
echo elgg_view('input/hidden', array(
	'name' => 'container_guid',
	'value' => $vars['container_guid'],
));
if ($vars['parent_guid']) {
	echo elgg_view('input/hidden', array(
		'name' => 'parent_guid',
		'value' => $vars['parent_guid'],
	));
}

echo elgg_view('input/submit', array('value' => elgg_echo('save')));

echo '</div>';
