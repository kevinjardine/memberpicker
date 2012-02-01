<?php
elgg_load_library('elgg:memberpicker');
$members = get_input('members');
$group_guid = get_input('guid');
if (get_input('add_button')) {
	$immediate = TRUE;
	$success_message = elgg_echo('memberpicker:add:success');
	$error_message = elgg_echo('memberpicker:add:error');
} else {
	$immediate = FALSE;
	$success_message = elgg_echo('memberpicker:invite:success');
	$error_message = elgg_echo('memberpicker:invite:error');
}
if (memberpicker_add_to_group($group_guid,$members,$immediate)) {
	system_message($success_message);
} else {
	register_error($error_message);
}

forward('groups/members/'.$group_guid);
