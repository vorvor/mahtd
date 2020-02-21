<?php

/**
 * @file
 * base_config.features.taxonomy.inc
 */

/**
 * Implements hook_taxonomy_default_vocabularies().
 */
function base_config_taxonomy_default_vocabularies() {
  return array(
    'accessories_categories' => array(
      'name' => 'Accessories categories',
      'machine_name' => 'accessories_categories',
      'description' => '',
      'hierarchy' => 0,
      'module' => 'taxonomy',
      'weight' => 0,
    ),
    'model' => array(
      'name' => 'Model',
      'machine_name' => 'model',
      'description' => '',
      'hierarchy' => 1,
      'module' => 'taxonomy',
      'weight' => 0,
    ),
  );
}
