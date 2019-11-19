<?php
/**
 * @file
 * Returns the HTML for a single Drupal page.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728148
 */
?>


<div id="content-wrapper">
	<div id="line"></div>

	<div id="po-tesla-column-left">
		<div class="po-tesla-wrapper">
			
			<div class="po-tesla-main-image top">
				<img 
				alt="<?php print $node->field_image[LANGUAGE_NONE][0]['alt']; ?>"
				title="<?php print $node->field_image[LANGUAGE_NONE][0]['title']; ?>"
				src="<?php print file_create_url($node->field_image[LANGUAGE_NONE][0]['uri']); ?>">
			</div>
 			
 			
			<div class="po-tesla-images">
				<?php 

					$c = 0;
					foreach ($node->field_image[LANGUAGE_NONE] as $image) {
						if ($c == 0) {
							$c++;
							continue;
						} ?>
						<div class="po-tesla-image po-tesla-image-<?php print $c; ?>"><img 
							alt="<?php print $image['alt']; ?>"
							title="<?php print $image['title']; ?>"
							src="<?php print file_create_url($image['uri']); ?>">
						</div>
						<?php
					}
				?>
			</div>

		</div>
	</div>
	<div id="po-tesla-column-right">
		<div class="po-tesla-model">
			<?php
				$model_term = taxonomy_term_load($node->field_model_one[LANGUAGE_NONE][0]['tid']);
				$year = date('Y', strtotime($node->field_year[LANGUAGE_NONE][0]['value']));
				$km = number_format($node->field_km[LANGUAGE_NONE][0]['value'], 0, ',', ' ');
				print $year . ' ' . $model_term->name . ' - ' . $km . ' km';
			?>
		</div>
		<div class="po-tesla-title">
			<h1><?php print $title; ?></h1>
		</div>
		<div class="po-tesla-price">
			<?php print number_format($node->field_price[LANGUAGE_NONE][0]['value'], 0, ',', ' '); ?> EUR
		</div>
		<div class="po-tesla-main-image bottom">
				<img 
				alt="<?php print $node->field_image[LANGUAGE_NONE][0]['alt']; ?>"
				title="<?php print $node->field_image[LANGUAGE_NONE][0]['title']; ?>"
				src="<?php print file_create_url($node->field_image[LANGUAGE_NONE][0]['uri']); ?>">
			</div>
		<div id="po-tesla-counter-wrapper">
			
			<div class="po-tesla-field-title">Külső</div>
			<div class="po-tesla-field-data">
				<?php print $node->field_exterior_color[LANGUAGE_NONE][0]['value']; ?>
			</div>
			<div class="po-tesla-field-title">Belső</div>
			<div class="po-tesla-field-data">
				<?php print $node->field_interior_color[LANGUAGE_NONE][0]['value']; ?>
			</div>
			
			<?php if (!empty($node->field_num_of_seats)) { ?>
			<div class="po-tesla-field-title">Ülések száma</div>
			<div class="po-tesla-field-data">
				<?php print $node->field_num_of_seats[LANGUAGE_NONE][0]['value']; ?>
			</div>
			<?php } ?>

			<div class="red-button red-button-wide">
				<a id="po-tesla-send-order-button" href="#send-order-button">Megrendelem</a>
			
        	</div>
		</div>
		<div class="block-po-tesla-send-order">
            <div id="po-tesla-order-form" class="po-tesla-send-order invisible">
                <?php
                    $nid = 19; //node id of the webform node
                    $node_webform = node_load($nid);
                    $form = drupal_get_form('webform_client_form_' . $nid, $node_webform);
                    print drupal_render($form);
                ?>
            </div>
        </div>
		<div class="po-tesla-body">
			<h3>Jellemzők</h3>
			<?php print $node->field_body[LANGUAGE_NONE][0]['value']; ?>
		</div>
		<div class="po-tesla-extra">
			<h3>Extrák</h3>
			<ul>
				<?php
				$extra = field_view_field('node', $node, 'field_exta', array('label'=>'hidden'));
				$c = 0;
				while (isset($extra[$c])) {
					print '<li>' . $extra[$c]['#markup'] . '</li>';
					$c++;
				}
				?>
			</ul>
		</div>
	</div>
</div>