
<div id="content-wrapper">
	<div id="line"></div>
	<div id="page-title">
	<h1><?php print drupal_get_title(); ?></h1>
	</div>
	<div id="po-tesla">
	<?php 
		// print views_embed_view('po_tesla', 'page'); 

		$view = views_get_view('po_tesla','page');
		$view->override_path = $_GET['q'];
		$viewsoutput = $view->preview();
		print $viewsoutput;
	?>
	</div>
</div>