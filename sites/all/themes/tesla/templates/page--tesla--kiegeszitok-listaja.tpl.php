
<div id="content-wrapper">
	<div id="line"></div>
	<div id="page-title">
	<h1><?php print drupal_get_title(); ?></h1>
	</div>
	<div id="page-lead">
		<h2>
			<?php
				$node = node_load(35);
				print $node->field_lead[LANGUAGE_NONE][0]['value'];
			?>
		</h2>
	</div>

	<div id="accessories">
	<?php print views_embed_view('accessories', 'page'); ?>
	</div>
</div>