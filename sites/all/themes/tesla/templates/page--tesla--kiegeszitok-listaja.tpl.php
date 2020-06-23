
<div id="content-wrapper">
	<div id="line"></div>
	<div id="page-title">
	<h1><?php print drupal_get_title(); ?></h1>
	</div>
	<div id="page-lead">
		<h2>
			<?php
				//$node = node_load(35);
				//print $node->field_lead[LANGUAGE_NONE][0]['value'];
			?>
		</h2>
	</div>

	<div id="accessories">
		<div id="user-accessories-filter">
			<?php
				/*print '<pre>';
				print_r(taxonomy_get_tree(2, 0));
				print '</pre>';*/
				$categories = taxonomy_get_tree(2);
				$tree = [];
				$parent = [];
				foreach ($categories as $cat) {
					if ($cat->parents[0] == 0) {
						$parents[$cat->tid] = $cat->name;
					} else {
						$tree[$cat->parents[0]][] = ['name' => $cat->name, 'tid' => $cat->tid]; 
					}
				}

				foreach ($parents as $key => $parent) {
					print '<h3>' . $parent . '</h3>';
					print '<div class="accessories-subcategory">';

					foreach ($tree[$key] as $item) {
						print '<div class="config-button filter category" data-tid="' . $item['tid'] . '">' . $item['name'] . '</div>';
					}

					print '</div>';
					
				}

				$models = array('Model 3', 'Model S', 'Model X');
				print '<h3>Modellek</h3>';
				print '<div class="accessories-subcategory">';
				foreach ($models as $item) {
					print '<div class="config-button filter model" data-model="' . $item . '">' . $item . '</div>';
				}
				print '</div>';
				
				print '<div id="reset-filter"><div class="config-button filter-reset" data-title="Autopilot" data-price="0" data-wrapper="autopilot">Összes kiegészítő</div>';
			?>
		</div>
	</div>
	<?php print views_embed_view('accessories', 'page'); ?>
</div>