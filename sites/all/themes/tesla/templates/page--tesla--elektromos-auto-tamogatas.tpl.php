<?php
	$path = explode('/', current_path());
	$node = node_load($path[1]);
	$title = $node->title;
	$title = str_replace("a Mah", "<br />a Mah", $title);
?>
<div style="clear:both;"></div>
<div id="page-wrapper">
	<div class="page-header">
		<span class="page-title desktop"><?php print $title; ?></span>
	</div>
	<div class="page-content">
	    <?php print $node->field_body['und'][0]['value']; ?>
	</div>
</div>