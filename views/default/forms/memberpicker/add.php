<?php
echo '<h3>'.elgg_echo('memberpicker:title').'</h3>';
echo '<p>'.elgg_echo('memberpicker:description').'</p>';
echo elgg_view('input/userpicker');
echo elgg_view('input/hidden',array('name'=>'guid', 'value'=>$vars['group_guid']));
echo elgg_view('input/submit',array('name'=>'submit_button','value' => elgg_echo('memberpicker:submit_button')));
echo elgg_view('input/submit',array('name'=>'add_button','value' => elgg_echo('memberpicker:add_button')));
echo '<br /><br />'.elgg_echo('memberpicker:warning').'<br /><br />';
