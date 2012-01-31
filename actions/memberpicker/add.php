<?php
elgg_load_library('elgg:memberpicker');
$members = get_input('members');
$group_guid = get_input('guid');
if (memberpicker_invite_to_group($group_guid,$members)) {
	system_message(elgg_echo('memberpicker:success'));
} else {
	register_error(elgg_echo('memberpicker:error'));
}

forward('groups/members/'.$group_guid);
