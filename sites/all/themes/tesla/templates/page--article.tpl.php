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

	<div id="article-column-left">
		<div class="article-wrapper">
			
			<div class="article-main-image">
				<img 
				alt="<?php print $node->field_main_image[LANGUAGE_NONE][0]['alt']; ?>"
				title="<?php print $node->field_main_image[LANGUAGE_NONE][0]['title']; ?>"
				src="<?php print file_create_url($node->field_main_image[LANGUAGE_NONE][0]['uri']); ?>">
			</div>
 
			<div class="article-date">
				<?php print $date; ?>
			</div>
			<div class="article-title">
				<h1><?php print $title; ?></h1>
			</div>	
			<div class="article-lead">
				<?php print $node->field_lead[LANGUAGE_NONE][0]['value']; ?>
			</div>	
			<div class="article-body">
				<?php print $node->field_body[LANGUAGE_NONE][0]['value']; ?>
			</div>	
			
			

		</div>
	</div>
	<div id="article-column-right">
		<div id="last-articles">
	        <?php
	        print views_embed_view('articles', 'block_2');
	        ?>
	    </div>
	</div>
</div>