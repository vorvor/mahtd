
<div id="content-wrapper">
	<div id="line"></div>
	<div id="page-title">
	<h1><?php print drupal_get_title(); ?></h1>
	</div>

	<div id="articles">
	<?php print views_embed_view('articles', 'page'); ?>
	</div>
</div>