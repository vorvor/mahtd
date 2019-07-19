<?php

/**
 * @file
 * base_config.features.inc
 */

/**
 * Implements hook_node_info().
 */
function base_config_node_info() {
  $items = array(
    'car' => array(
      'name' => t('Car'),
      'base' => 'node_content',
      'description' => '',
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
    'faq' => array(
      'name' => t('Faq'),
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
