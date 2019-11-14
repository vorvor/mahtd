<?php

/**
 * @file
 * base_config.features.inc
 */

/**
 * Implements hook_views_api().
 */
function base_config_views_api($module = NULL, $api = NULL) {
  return array("api" => "3.0");
}

/**
 * Implements hook_image_default_styles().
 */
function base_config_image_default_styles() {
  $styles = array();

  // Exported image style: accessories.
  $styles['accessories'] = array(
    'label' => 'accessories',
    'effects' => array(
      3 => array(
        'name' => 'image_scale',
        'data' => array(
          'width' => '',
          'height' => 400,
          'upscale' => 0,
        ),
        'weight' => 1,
      ),
      4 => array(
        'name' => 'image_crop',
        'data' => array(
          'width' => 400,
          'height' => 400,
          'anchor' => 'center-center',
        ),
        'weight' => 2,
      ),
    ),
  );

  // Exported image style: article_main_image.
  $styles['article_main_image'] = array(
    'label' => 'Article main image',
    'effects' => array(
      1 => array(
        'name' => 'image_scale',
        'data' => array(
          'width' => '',
          'height' => 350,
          'upscale' => 0,
        ),
        'weight' => 1,
      ),
      2 => array(
        'name' => 'image_crop',
        'data' => array(
          'width' => 500,
          'height' => 350,
          'anchor' => 'center-center',
        ),
        'weight' => 2,
      ),
    ),
  );

  return $styles;
}

/**
 * Implements hook_node_info().
 */
function base_config_node_info() {
  $items = array(
    'accessories' => array(
      'name' => t('Accessories'),
      'base' => 'node_content',
      'description' => '',
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
    'article' => array(
      'name' => t('Article'),
      'base' => 'node_content',
      'description' => '',
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
    'car' => array(
      'name' => t('Car'),
      'base' => 'node_content',
      'description' => '',
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
    'faq' => array(
      'name' => t('Unique page'),
      'base' => 'node_content',
      'description' => '',
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
    'page' => array(
      'name' => t('Page'),
      'base' => 'node_content',
      'description' => '',
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
    'po_tesla' => array(
      'name' => t('PO Tesla'),
      'base' => 'node_content',
      'description' => '',
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
    'webform' => array(
      'name' => t('Webform'),
      'base' => 'node_content',
      'description' => t('Create a new form or questionnaire accessible to users. Submission results and statistics are recorded and accessible to privileged users.'),
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
  );
  drupal_alter('node_info', $items);
  return $items;
}

/**
 * Implements hook_paragraphs_info().
 */
function base_config_paragraphs_info() {
  $items = array(
    'config_type_1' => array(
      'name' => 'config type 1',
      'bundle' => 'config_type_1',
      'locked' => '1',
    ),
    'config_type_2' => array(
      'name' => 'config type 2',
      'bundle' => 'config_type_2',
      'locked' => '1',
    ),
    'faq' => array(
      'name' => 'faq',
      'bundle' => 'faq',
      'locked' => '1',
    ),
    'index_extra' => array(
      'name' => 'Index extra',
      'bundle' => 'index_extra',
      'locked' => '1',
    ),
  );
  return $items;
}
