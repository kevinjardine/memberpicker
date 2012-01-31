<?php
echo '<h3>'.elgg_echo('memberpicker:title').'</h3>';
echo '<p>'.elgg_echo('memberpicker:description').'</p>';
echo elgg_view('input/userpicker');
echo elgg_view('input/hidden',array('name'=>'guid', 'value'=>$vars['group_guid']));
echo elgg_view('input/submit',array('value' => elgg_echo('memberpicker:submit_button')));
echo '<br /><br />';
