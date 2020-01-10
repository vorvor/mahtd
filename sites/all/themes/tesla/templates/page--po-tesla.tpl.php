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
				print $year . ' ' . $model_parent . ' ' . $model . ' - ' . $km . ' km';
			?>
		</div>
		<div class="po-tesla-title">
			<h1><?php print $title; ?></h1>
		</div>
		<div class="po-tesla-price">
			<?php print $price ?>
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
				<div class="color-pic"><img src="<?php print $exterior_color_pic; ?>"></div>
				<div class="color-name"><?php print $exterior_color_name; ?></div>
				<div style="clear: both;"></div>
			</div>

			<div class="po-tesla-field-title">Belső</div>
			<div class="po-tesla-field-data">
				<div class="color-pic"><img src="<?php print $interior_color_pic; ?>"></div>
				<div class="color-name"><?php print $interior_color_name; ?></div>
				<div style="clear: both;"></div>
			</div>

			
			<?php if (!empty($node->field_num_of_seats)) { ?>
			<div class="po-tesla-field-title">Ülések száma</div>
			<div class="po-tesla-field-data">
				<?php print $seats; ?>
			</div>
			<div style="clear: both;"></div>
			<?php } ?>

			<?php if (!empty($node->field_guarantee)) { ?>
			<div class="po-tesla-field-title">Garancia</div>
			<div class="po-tesla-field-data">
				<?php print $guarantee; ?>
			</div>
			<div style="clear: both;"></div>
			<?php } ?>

			<div class="red-button red-button-wide">
				<a id="po-tesla-send-order-button" href="#send-order-button">Ajánlat kérése</a>
			
        	</div>
		</div>
		<div class="block-po-tesla-send-order">
            <div id="po-tesla-order-form" class="po-tesla-send-order invisible">
                <?php
                    $nid = 67; //node id of the webform node
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
		<div id="po-tesla-details" style="display:none;">
			<input type="hidden" id="model" value="<?php print $model_parent . ' ' . $model; ?>">
			<input type="hidden" id="price" value="<?php print $price; ?>">
			<input type="hidden" id="exterior" value="<?php print $exterior_color_name; ?>">
			<input type="hidden" id="interior" value="<?php print $interior_color_name; ?>">
			<input type="hidden" id="seats" value="<?php print $seats; ?>">
		</div>
	</div>
</div>