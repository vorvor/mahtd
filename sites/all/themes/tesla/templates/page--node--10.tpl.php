<?php 
	$path = explode('/', current_path());
	$node = node_load($path[1]); 
?>
<div id="first-row-wrapper">
    <div class="services-title"><?php print $node->title; ?></div>
    <div class="services-description">
    <?php print $node->field_lead['und'][0]['value']; ?>
    </div>
</div>
<div id="second-row-wrapper">
    <div id="second-row">
        <?php print $node->field_body['und'][0]['value']; ?>
    </div>
</div>
    