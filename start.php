<?php
elgg_register_event_handler('init', 'system', 'memberpicker_pagesetup');
elgg_register_event_handler('init', 'system', 'memberpicker_init');

/**
 * Init plugin.
 */
function memberpicker_init() {
	
	elgg_register_library('elgg:memberpicker', elgg_get_plugins_path() . 'memberpicker/models/model.php');

	// register the JavaScript
	$js = elgg_get_simplecache_url('js', 'memberpicker/js');
	elgg_register_simplecache_view('js/memberpicker/js');
	elgg_register_js('elgg.memberpicker', $js);
	
	// routing of urls
	elgg_register_page_handler('memberpicker', 'memberpicker_page_handler');
	
	// register actions
	$action_path = elgg_get_plugins_path() . 'memberpicker/actions/memberpicker';
	elgg_register_action('memberpicker/add', "$action_path/add.php");
}

function memberpicker_pagesetup() {
	$url = current_page_url();
	if (elgg_is_logged_in() && (strpos($url,'groups/members') !== FALSE)) {
		$bits = explode('/',$url);
		$group_guid = $bits[count($bits)-1];
		$group = get_entity($group_guid);
		if ($group && $group->canEdit()) {
			elgg_set_page_owner_guid($group_guid);
			elgg_load_js('elgg.memberpicker');
			elgg_load_js('elgg.userpicker');
			elgg_load_js('jquery.ui.autocomplete.html');
		}
	}
}

/**
 * Dispatches pages.
 *
 * @param array $page
 * @return bool
 */
function memberpicker_page_handler($page) {
	$page_type = $page[0];
	switch ($page_type) {
		case 'add':
			echo elgg_view_form('memberpicker/add',array(),array('group_guid'=>$page[1]));
			break;
		default:
			return FALSE;
			break;
	}
	return TRUE;
}
