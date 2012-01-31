<?php

// modified from mod/groups/actions/groups/membership/invite.php
// any errors are just ignored for now
function memberpicker_invite_to_group($group_guid, $members) {

	$logged_in_user = elgg_get_logged_in_user_entity();
	$group = get_entity($group_guid);
	
	if (count($members) && elgg_instanceof($group,'group') && $group->canEdit()) {
		foreach ($members as $u_id) {
			$user = get_user($u_id);	
			if ($user) {	
				if (!$group->isMember($user) && !check_entity_relationship($group->guid, 'invited', $user->guid)) {
	
					// Create relationship
					add_entity_relationship($group->guid, 'invited', $user->guid);
	
					// Send email
					// KJ - should this not force email?
					$url = elgg_normalize_url("groups/invitations/$user->username");
					$result = notify_user($user->getGUID(), $group->owner_guid,
							elgg_echo('groups:invite:subject', array($user->name, $group->name)),
							elgg_echo('groups:invite:body', array(
								$user->name,
								$logged_in_user->name,
								$group->name,
								$url,
							)),
							NULL);
				}
			}
		}
	}
	return TRUE;
}
