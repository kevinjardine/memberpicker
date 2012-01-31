//<script>
elgg.provide('elgg.memberpicker');

elgg.memberpicker.init = function () {

	$(".elgg-list").before('<div id="elgg-memberpicker-form-container"></div>');
	$("#elgg-memberpicker-form-container").load(elgg.get_site_url()+'memberpicker/add/'+elgg.get_page_owner_guid(),elgg.userpicker.init);
}

elgg.register_hook_handler('init', 'system', elgg.memberpicker.init);
//</script>