<?php
/**
 * @file
 * Contains the theme's functions to manipulate Drupal's default markup.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728096
 */


/**
 * Override or insert variables into the maintenance page template.
 *
 * @param array $variables
 *   Variables to pass to the theme template.
 * @param string $hook
 *   The name of the template being rendered ("maintenance_page" in this case.)
 */
/* -- Delete this line if you want to use this function
function tesla_preprocess_maintenance_page(&$variables, $hook) {
  // When a variable is manipulated or added in preprocess_html or
  // preprocess_page, that same work is probably needed for the maintenance page
  // as well, so we can just re-use those functions to do that work here.
  tesla_preprocess_html($variables, $hook);
  tesla_preprocess_page($variables, $hook);
}
// */

/**
 * Override or insert variables into the html templates.
 *
 * @param array $variables
 *   Variables to pass to the theme template.
 * @param string $hook
 *   The name of the template being rendered ("html" in this case.)
 */

function tesla_preprocess_html(&$variables, $hook) {
  //$variables['sample_variable'] = t('Lorem ipsum.');

  // The body tag's classes are controlled by the $classes_array variable. To
  // remove a class from $classes_array, use array_diff().
  /*$variables['classes_array'] = array_diff($variables['classes_array'],
    array('class-to-remove')
  );*/

  $variables['body_class'] = 'front';
  $variables['contact_page_path'] = drupal_get_path_alias('node/6');
  $variables['services_page_path'] = drupal_get_path_alias('node/7');

  $node = menu_get_object();
  if ($node && $node->nid) {
    if ($node->type == 'car') {
      $variables['body_class'] = 'inner ' . preg_replace('@[^a-z0-9-]+@','-', strtolower($node->title));
    }
    
    if ($node->type == 'page' && $node->nid == 6) {
      $variables['body_class'] = 'contact';
    }

    if ($node->type == 'page' && $node->nid == 7) {
      $variables['body_class'] = 'services';
    }
  }

  $main_menu_items = menu_tree('main-menu');
  $main_menu_output = '';
  foreach ($main_menu_items as $menu_item) {
    if (isset($menu_item['#title'])) {
      $main_menu_output .= '<li>' . l($menu_item['#title'], $menu_item['#href']) . '</li>';
    }
  }
  $variables['main_menu'] = $main_menu_output;

}
// */

/**
 * Override or insert variables into the page templates.
 *
 * @param array $variables
 *   Variables to pass to the theme template.
 * @param string $hook
 *   The name of the template being rendered ("page" in this case.)
 */

function tesla_preprocess_page(&$variables, $hook) {
  //$variables['sample_variable'] = t('Lorem ipsum.');
  if (isset($variables['node'])) {
    $variables['theme_hook_suggestion'] = 'page__' . $variables['node']->type;

    if ($variables['node']->type == 'car') {
      $node = node_load($variables['node']->nid);

      $variables['technical_details'] = $node->field_technical_details['und'][0]['value'];
      $variables['range'] = $node->field_index_range['und'][0]['value'];
      $variables['acceleration'] = $node->field_index_acceleration['und'][0]['value'];
      if (isset($node->field_index_topspeed)) {
        $variables['topspeed'] = $node->field_index_topspeed['und'][0]['value'];
      }
      $variables['video'] = $node->field_video['und'][0]['uri'];
      $variables['title'] = $node->title;
      $variables['preorder'] = $node->field_preorder['und'][0]['value'];

      // facilities
      if (!empty($node->field_facilities)) {
        foreach ($node->field_facilities[LANGUAGE_NONE] as $facility) {
          $paragraph = entity_load('paragraphs_item', array($facility['value']));
          $paragraph = reset($paragraph);
          $facilities[] = array(
            'title' => $paragraph->field_title['und'][0]['value'],
            'price' => number_format($paragraph->field_price['und'][0]['value'], 0, ',', ' '),
            'range' => $paragraph->field_range['und'][0]['value'],
            'top_speed' => $paragraph->field_top_speed['und'][0]['value'],
            'acceleration' => $paragraph->field_acceleration['und'][0]['value'],
            'optional' => $paragraph->field_optional['und'][0]['value'],
            'option-condition' => $paragraph->field_option_condition['und'][0]['value'],
            'optional-class' => ($paragraph->field_optional['und'][0]['value'] == 1) ? 'optional' : '',
          );
        }
        $variables['facilities'] = $facilities;
      }

      // exterior
      if (!empty($node->field_exterior)) {
        foreach ($node->field_exterior[LANGUAGE_NONE] as $exterior) {
          $paragraph = entity_load('paragraphs_item', array($exterior['value']));
          $paragraph = reset($paragraph);
          $exteriors[] = array(
            'title' => $paragraph->field_title['und'][0]['value'],
            'price' => number_format($paragraph->field_price['und'][0]['value'], 0, ',', ' '),
            'image' => $paragraph->field_image['und'][0]['uri'],
          );
        }
        $variables['exteriors'] = $exteriors;
      }

      // rim
      if (!empty($node->field_rim)) {
        foreach ($node->field_rim[LANGUAGE_NONE] as $rim) {
          $paragraph = entity_load('paragraphs_item', array($rim['value']));
          $paragraph = reset($paragraph);
          $rims[] = array(
            'title' => $paragraph->field_title['und'][0]['value'],
            'price' => number_format($paragraph->field_price['und'][0]['value'], 0, ',', ' '),
            'image' => $paragraph->field_image['und'][0]['uri'],
          );
        }

        $variables['rims'] = $rims;
      }

      // interior
      if (!empty($node->field_interior)) {
        foreach ($node->field_interior[LANGUAGE_NONE] as $interior) {
          $paragraph = entity_load('paragraphs_item', array($interior['value']));
          $paragraph = reset($paragraph);
          $interiors[] = array(
            'title' => $paragraph->field_title['und'][0]['value'],
            'price' => number_format($paragraph->field_price['und'][0]['value'], 0, ',', ' '),
            'image' => $paragraph->field_image['und'][0]['uri'],
          );
        }

        $variables['interiors'] = $interiors;
      }

      // autopilot
      if (!empty($node->field_autopilot)) {
        foreach ($node->field_autopilot[LANGUAGE_NONE] as $autopilot) {
          $paragraph = entity_load('paragraphs_item', array($autopilot['value']));
          $paragraph = reset($paragraph);
          $autopilots[] = array(
            'title' => $paragraph->field_title['und'][0]['value'],
            'price' => number_format($paragraph->field_price['und'][0]['value'], 0, ',', ' '),
          );
        }

        $variables['autopilots'] = $autopilots;
      }

      // winter wheels
      if (!empty($node->field_winter_wheels)) {
        foreach ($node->field_winter_wheels[LANGUAGE_NONE] as $winter_wheel) {
          $paragraph = entity_load('paragraphs_item', array($winter_wheel['value']));
          $paragraph = reset($paragraph);
          $winter_wheels[] = array(
            'title' => $paragraph->field_title['und'][0]['value'],
            'price' => number_format($paragraph->field_price['und'][0]['value'], 0, ',', ' '),
            'image' => $paragraph->field_image['und'][0]['uri'],
          );
        }

        $variables['winter_wheels'] = $winter_wheels;
      }

      // extras
      if (!empty($node->field_extras)) {
        foreach ($node->field_extras[LANGUAGE_NONE] as $extra) {
          $paragraph = entity_load('paragraphs_item', array($extra['value']));
          $paragraph = reset($paragraph);
          $extras[] = array(
            'title' => $paragraph->field_title['und'][0]['value'],
            'price' => number_format($paragraph->field_price['und'][0]['value'], 0, ',', ' '),
            'image' => $paragraph->field_image['und'][0]['uri'],
          );
        }

        $variables['extras'] = $extras;
      }

      // seats
      if (!empty($node->field_seats)) {
        foreach ($node->field_seats[LANGUAGE_NONE] as $seat) {
          $paragraph = entity_load('paragraphs_item', array($seat['value']));
          $paragraph = reset($paragraph);
          $seats[] = array(
            'title' => $paragraph->field_title['und'][0]['value'],
            'price' => number_format($paragraph->field_price['und'][0]['value'], 0, ',', ' '),
          );
        }

        $variables['seats'] = $seats;
      }
    }
  }
}
// */

/**
 * Override or insert variables into the region templates.
 *
 * @param array $variables
 *   Variables to pass to the theme template.
 * @param string $hook
 *   The name of the template being rendered ("region" in this case.)
 */
/* -- Delete this line if you want to use this function
function tesla_preprocess_region(&$variables, $hook) {
  // Don't use Zen's region--no-wrapper.tpl.php template for sidebars.
  if (strpos($variables['region'], 'sidebar_') === 0) {
    $variables['theme_hook_suggestions'] = array_diff(
      $variables['theme_hook_suggestions'], array('region__no_wrapper')
    );
  }
}
// */

/**
 * Override or insert variables into the block templates.
 *
 * @param array $variables
 *   Variables to pass to the theme template.
 * @param string $hook
 *   The name of the template being rendered ("block" in this case.)
 */
/* -- Delete this line if you want to use this function
function tesla_preprocess_block(&$variables, $hook) {
  // Add a count to all the blocks in the region.
  // $variables['classes_array'][] = 'count-' . $variables['block_id'];

  // By default, Zen will use the block--no-wrapper.tpl.php for the main
  // content. This optional bit of code undoes that:
  if ($variables['block_html_id'] == 'block-system-main') {
    $variables['theme_hook_suggestions'] = array_diff(
      $variables['theme_hook_suggestions'], array('block__no_wrapper')
    );
  }
}
// */

/**
 * Override or insert variables into the node templates.
 *
 * @param array $variables
 *   Variables to pass to the theme template.
 * @param string $hook
 *   The name of the template being rendered ("node" in this case.)
 */
/* -- Delete this line if you want to use this function
function tesla_preprocess_node(&$variables, $hook) {
  $variables['sample_variable'] = t('Lorem ipsum.');

  // Optionally, run node-type-specific preprocess functions, like
  // tesla_preprocess_node_page() or tesla_preprocess_node_story().
  $function = __FUNCTION__ . '_' . $variables['node']->type;
  if (function_exists($function)) {
    $function($variables, $hook);
  }
}
// */

/**
 * Override or insert variables into the comment templates.
 *
 * @param array $variables
 *   Variables to pass to the theme template.
 * @param string $hook
 *   The name of the template being rendered ("comment" in this case.)
 */
/* -- Delete this line if you want to use this function
function tesla_preprocess_comment(&$variables, $hook) {
  $variables['sample_variable'] = t('Lorem ipsum.');
}
// */

