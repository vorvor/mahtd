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

	<div id="accessories-column-left">
		<div class="accessories-wrapper">
			
			<div class="accessories-main-image top">
				<img 
				alt="<?php print $node->field_image[LANGUAGE_NONE][0]['alt']; ?>"
				title="<?php print $node->field_image[LANGUAGE_NONE][0]['title']; ?>"
				src="<?php print file_create_url($node->field_image[LANGUAGE_NONE][0]['uri']); ?>">
			</div>
 			
 			
			<div class="accessories-images">
				<?php 

					$c = 0;
					foreach ($node->field_image[LANGUAGE_NONE] as $image) {
						if ($c == 0) {
							$c++;
							continue;
						} ?>
						<div class="accessories-image accessories-image-<?php print $c; ?>"><img 
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
	<div id="accessories-column-right">
		<div class="accessories-model">
			<?php

			foreach ($node->field_accessories_model[LANGUAGE_NONE] as $model) {
				$model_term = taxonomy_term_load($model['tid']);
				$models[] = $model_term->name;
			}

			print implode(' - ', $models);
			
			?>
		</div>
		<div class="accessories-title">
			<h1><?php print $title; ?></h1>
		</div>
		<div class="accessories-price">
			<?php print $node->field_price[LANGUAGE_NONE][0]['value'] ?> EUR
		</div>
		<div class="accessories-main-image bottom">
				<img 
				alt="<?php print $node->field_image[LANGUAGE_NONE][0]['alt']; ?>"
				title="<?php print $node->field_image[LANGUAGE_NONE][0]['title']; ?>"
				src="<?php print file_create_url($node->field_image[LANGUAGE_NONE][0]['uri']); ?>">
			</div>
		<div id="accessories-counter-wrapper">
			
			<div class="accessories-counter-title">Mennyiség</div>
			<div class="accessories-counter">
				<a href="#" class="counter-minus">-</a>
				<span class="accessories-counter-count">1</span>
				<a href="#" class="counter-plus">+</a>
			</div>
			<div class="red-button red-button-wide">
				<a id="accessories-send-order-button" href="#send-order-button">Megrendelem</a>
			
        	</div>
		</div>
		<div class="block-accessories-send-order">
            <div id="accessories-order-form" class="accessories-send-order invisible">
                <?php
                    $nid = 19; //node id of the webform node
                    $node_webform = node_load($nid);
                    $form = drupal_get_form('webform_client_form_' . $nid, $node_webform);
                    print drupal_render($form);
                ?>
            </div>
        </div>
		<div class="accessories-body">
			<h3>Jellemzők</h3>
			<?php print $node->field_body[LANGUAGE_NONE][0]['value']; ?>
		</div>
	</div>
</div>