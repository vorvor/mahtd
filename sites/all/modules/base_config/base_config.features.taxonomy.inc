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
    'model' => array(
      'name' => 'Model',
      'machine_name' => 'model',
      'description' => '',
      'hierarchy' => 0,
      'module' => 'taxonomy',
      'weight' => 0,
    ),
  );
}
