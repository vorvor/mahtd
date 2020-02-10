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
  global $base_url;
  //$variables['sample_variable'] = t('Lorem ipsum.');

  // The body tag's classes are controlled by the $classes_array variable. To
  // remove a class from $classes_array, use array_diff().
  /*$variables['classes_array'] = array_diff($variables['classes_array'],
    array('class-to-remove')
  );*/

  $theme_path = drupal_get_path('theme', 'tesla');

  $variables['logo'] = '/' . $theme_path . '/images/logo.png';

  $variables['body_class'] = 'front';
  $variables['contact_page_path'] = drupal_get_path_alias('tesla/kapcsolat');
  $variables['services_page_path'] = drupal_get_path_alias('tesla/szolgaltatasaink');
  $variables['faq_page_path'] = drupal_get_path_alias('tesla-gyik');
  $variables['brand_story_path'] = drupal_get_path_alias('tesla/markatortenet');
  $variables['articles_path'] = drupal_get_path_alias('tesla/hirek');
  $variables['accessories_path'] = drupal_get_path_alias('tesla/kiegeszitok-listaja');
  $variables['energy_certificate'] = drupal_get_path_alias('tesla/TAO-tamogatas');
  $variables['family_support_path'] = drupal_get_path_alias('tesla/autovasarlasi-tamogatas-nagycsaladosoknak-mah-zrt');
  $variables['governmental_support_path'] = drupal_get_path_alias('tesla/elektromos-auto-tamogatas');
  $variables['po_tesla_path'] = drupal_get_path_alias('tesla/hasznalt-tesla');

  $variables['current_url'] = url(current_path(), array('absolute' => TRUE));
  if (drupal_is_front_page()) {
    $variables['current_url'] = $base_url;
  }

  $node = menu_get_object();
  if ($node && $node->nid) {
    if ($node->type == 'car') {
      $model_name = preg_replace('@[^a-z0-9-]+@','-', strtolower($node->title));
      $variables['body_class'] = 'inner ' . $model_name;

      $model_js = drupal_get_path('theme', 'tesla') .'/js/' . $model_name . '.js';
      if (file_exists($model_js)) {
        drupal_add_js($model_js, 'file');
      }
    }

    if (isset($node->field_meta_title)) {
      $variables['meta_title'] = $node->field_meta_title[LANGUAGE_NONE][0]['value'];
      $variables['meta_description'] = $node->field_meta_description[LANGUAGE_NONE][0]['value'];
    }
    
    if ($node->type == 'page' && $node->nid == 6) {
      $variables['body_class'] = 'contact';
    }

    if ($node->type == 'page' && $node->nid == 7) {
      $variables['body_class'] = 'services';
    }

    if ($node->type == 'faq' && $node->nid == 11) {
      $variables['body_class'] = 'faq';
    }

    if ($node->type == 'faq' && $node->nid == 18) {
      $variables['body_class'] = 'faq brand-story';
    }

    if ($node->type == 'article') {
      $variables['body_class'] = 'articles tesla-article';
      $variables['meta_title'] = check_plain(strip_tags($node->title));
      $variables['meta_description'] = check_plain(strip_tags($node->field_lead[LANGUAGE_NONE][0]['value']));
      $variables['meta_img'] = file_create_url($node->field_main_image[LANGUAGE_NONE][0]['uri']);
      $variables['logo'] = '/' . $theme_path . '/images/logo-black-red.png';

    }

    if ($node->type == 'accessories') {
      $variables['body_class'] = 'accessories';
      drupal_add_css(drupal_get_path('theme', 'tesla') .'/css/accessories.css', 'file');
      drupal_add_js(drupal_get_path('theme', 'tesla') .'/js/accessories.js', 'file');
      $variables['logo'] = '/' . $theme_path . '/images/logo-black-red.png';
    }

    if ($node->type == 'po_tesla') {
      $variables['body_class'] = 'po-tesla';
      drupal_add_css(drupal_get_path('theme', 'tesla') .'/css/po-tesla.css', 'file');
      drupal_add_js(drupal_get_path('theme', 'tesla') .'/js/po-tesla.js', 'file');
      $variables['logo'] = '/' . $theme_path . '/images/logo-black-red.png';
    }

  } 

  if (current_path() == 'tesla/hirek') {
    $variables['body_class'] = 'articles';
    $variables['logo'] = '/' . $theme_path . '/images/logo-black-red.png';
  }

  if (current_path() == 'tesla/kiegeszitok-listaja') {
    $variables['body_class'] = 'accessories-list';
    drupal_add_js(drupal_get_path('theme', 'tesla') .'/js/accessories-list.js', 'file');
    drupal_add_css(drupal_get_path('theme', 'tesla') .'/css/accessories-list.css', 'file');
  }

  if (drupal_get_path_alias(current_path()) == 'tesla/TAO-tamogatas') {
    $variables['body_class'] = 'energetikai-tanusitvany';
    drupal_add_js(drupal_get_path('theme', 'tesla') .'/js/energetikai-tanusitvany.js', 'file');
    drupal_add_css(drupal_get_path('theme', 'tesla') .'/css/energetikai-tanusitvany.css', 'file');
  }

  if (drupal_get_path_alias(current_path()) == 'tesla/autovasarlasi-tamogatas-nagycsaladosoknak-mah-zrt') {
    $variables['body_class'] = 'autovasarlasi-tamogatas';
    drupal_add_js(drupal_get_path('theme', 'tesla') .'/js/autovasarlasi-tamogatas.js', 'file');
    drupal_add_css(drupal_get_path('theme', 'tesla') .'/css/autovasarlasi-tamogatas.css', 'file');
  }

  if (drupal_get_path_alias(current_path()) == 'tesla/elektromos-auto-tamogatas') {
    $variables['body_class'] = 'elektromos-auto-tamogatas';
    drupal_add_js(drupal_get_path('theme', 'tesla') .'/js/elektromos-auto-tamogatas.js', 'file');
    drupal_add_css(drupal_get_path('theme', 'tesla') .'/css/elektromos-auto-tamogatas.css', 'file');
  }

  if (drupal_get_path_alias(current_path()) == 'tesla/adatkezelesi-tajekoztato') {
    $variables['body_class'] = 'gdpr';
    drupal_add_css(drupal_get_path('theme', 'tesla') .'/css/gdpr.css', 'file');
    $variables['logo'] = '/' . $theme_path . '/images/logo-black-red.png';
  }

  if (drupal_get_path_alias(current_path()) == 'tesla/hasznalt-tesla') {
    $variables['body_class'] = 'po-tesla-list';
    drupal_add_js(drupal_get_path('theme', 'tesla') .'/js/po-tesla-list.js', 'file');
    drupal_add_css(drupal_get_path('theme', 'tesla') .'/css/po-tesla-list.css', 'file');
    $variables['logo'] = '/' . $theme_path . '/images/logo-black-red.png';
  }

  if (empty($variables['meta_title'])) {
    $variables['meta_title'] = 'Tesla ár és vásárlás Magyarországon - Tesla Model 3 ár kalkuláció és rendelés 2 hónapon belül | Tesla.hu';
  }

  if (empty($variables['meta_description'])) {
    $variables['meta_description'] = 'Tesla rendelés Magyarországon egyedülállóan rövid időn belül a Magyar Autókereskedőház Zrt.-től. Számolja ki elektromos Tesla autó konfigurátorunk segítségével a Tesla Model 3 árát, valamint a Tesla Model S, Tesla Model Y, Model X árát.';
  }

  if (empty($variables['meta_img'])) {
    $variables['meta_img'] = 'https://www.tesla.hu/sites/default/files/tesla-model-x-index.jpg';
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
    $variables['theme_hook_suggestions'][] = 'page__' . $variables['node']->type;

    $alias = str_replace('-', '_', drupal_get_path_alias('node/' . $variables['node']->nid));
    $variables['theme_hook_suggestions'][] = 'page__' . str_replace('/', '__', $alias);

    if ($variables['node']->type == 'article') {
      $node = $variables['node'];
      $difference = time() - $node->created;
      $variables['date'] = format_interval($difference, 1) . ' ago';
    }

    if ($variables['node']->type == 'car') {
      $node = node_load($variables['node']->nid);

      $variables['technical_details'] = $node->field_technical_details['und'][0]['value'];
      $variables['more_details'] = $node->field_more_details['und'][0]['value'];
      
      if (isset($node->field_video['und'])) {
        $variables['video'] = $node->field_video['und'][0]['uri'];
      }
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
            'free-items' => $paragraph->field_with_free_config_items['und'][0]['value'],
            'optional-class' => ($paragraph->field_optional['und'][0]['value'] == 1) ? 'optional' : '',
            'free-items-class' => ($paragraph->field_with_free_config_items['und'][0]['value'] == 1) ? 'with-free-items' : '',
          );

          $ranges[] = $paragraph->field_range['und'][0]['value'];
          $top_speeds[] = $paragraph->field_top_speed['und'][0]['value'];
          $accelerations[] = $paragraph->field_acceleration['und'][0]['value'];
        }
        $variables['facilities'] = $facilities;
      }


      // if there is configurator, best values are the potential best choices, if not, it set manually
      if (isset($node->field_index_range['und'])) {
        $variables['range'] = $node->field_index_range['und'][0]['value'];
      } else {
        $variables['range'] = max($ranges);
      }
      
      if (isset($node->field_index_acceleration['und'])) {
        $variables['acceleration'] = $node->field_index_acceleration['und'][0]['value'];
      } else {
        $variables['acceleration'] = min($accelerations);
      }
      if (isset($node->field_index_topspeed['und'])) {
        $variables['topspeed'] = $node->field_index_topspeed['und'][0]['value'];
      } else {
        $variables['topspeed'] = max($top_speeds);
      }

      if (in_array($node->title, array('Model 3', 'Model S', 'Model X', 'Model Y'))) {
        unset($variables['topspeed']);
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
            'performance-price' => number_format($paragraph->field_performance_price['und'][0]['value'], 0, ',', ' '),
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

    if ($variables['node']->type == 'po_tesla') {

      $node = $variables['node'];
      $interior = $node->field_interior_color[LANGUAGE_NONE][0]['value'];
      switch ($interior) {
        case 'fekete':
          $img = 'carpet-black_0.png';
          break;
        case 'fehér':
          $img = '';
          break;
        case 'fehér-fehér':
          $img = 'carpet-bw_2.png';
          break;
        case 'fekete kőrisfa betétekkel':
          $img = 'all_black__FihuredAshWoodDecor.png';
          break;
        case 'fekete-fehér kőrisfa betétekkel':
          $img = 'black_and_white__DarkAshWoodDecor.png';
          break;
        case 'bézs tölgyfa betétekkel':
          $img = 'cream__OakWoodDecor.png';
          break;
        case 'fekete karbon betétekkel':
          $img = 'all_black_CarbonFiberDecor.png';
          break;
        case 'fekete-fehér karbon betétekkel':
          $img = 'black_and_white__CarbonFiberDecor.png';
          break;
      }
      
      $variables['interior_color_pic'] = file_create_url('public://' . $img);
      $variables['interior_color_name'] = $interior;
      
      $exterior = $node->field_exterior_color[LANGUAGE_NONE][0]['value'];

      switch ($exterior) {
        case 'gyémánt metál':
          $img = 'color-white.png';
          break;
        case 'fekete metál':
          $img = 'color-black.png';
          break;
        case 'sötétszürke metál':
          $img = 'color-grey.png';
          break;
        case 'mélykék metál':
          $img = 'color-blue.png';
          break;
        case 'vörös metál':
          $img = 'color-red.png';
          break;
      }
      $variables['exterior_color_pic'] = file_create_url('public://' . $img);
      $variables['exterior_color_name'] = $exterior;

      $variables['model'] = taxonomy_term_load($node->field_model_one[LANGUAGE_NONE][0]['tid'])->name;
      $model_parent = taxonomy_get_parents(taxonomy_term_load($node->field_model_one[LANGUAGE_NONE][0]['tid'])->tid);
      $model_parent = reset($model_parent);
      $variables['model_parent'] = $model_parent->name;
      $variables['year'] = date('Y', strtotime($node->field_year[LANGUAGE_NONE][0]['value']));
      $variables['km'] = number_format($node->field_km[LANGUAGE_NONE][0]['value'], 0, ',', ' ');
      $variables['seats'] = $node->field_num_of_seats[LANGUAGE_NONE][0]['value'];
      $variables['guarantee'] = render(field_view_field('node', $node, 'field_guarantee', array(
        'label'=>'hidden', 
      )));

      $field_formatters = field_info_instances('node', 'po_tesla');
      $prefix = $field_formatters['field_price']['settings']['prefix'];
      $suffix = $field_formatters['field_price']['settings']['suffix'];
      $variables['price'] = $prefix . number_format($node->field_price[LANGUAGE_NONE][0]['value'], 0, ',', ' ') . ' ' . $suffix;

      $details_for_order = $node->title . ' ';

    }
  } else {

    $models = array(
      2 => 'model_3',
      1 => 'model_s',
      3 => 'model_x',
      5 => 'roadster',
      4 => 'model_y',
    );

    foreach ($models as $key => $model) {
      $node = node_load($key);

      $ranges = [];
      $top_speeds = [];
      $accelerations = [];
      if (isset($node->field_facilities[LANGUAGE_NONE])) {
        foreach ($node->field_facilities[LANGUAGE_NONE] as $facility) {
          $paragraph = entity_load('paragraphs_item', array($facility['value']));
          $paragraph = reset($paragraph);

          $ranges[] = $paragraph->field_range['und'][0]['value'];
          $top_speeds[] = $paragraph->field_top_speed['und'][0]['value'];
          $accelerations[] = $paragraph->field_acceleration['und'][0]['value'];
        }
      }

      if (isset($node->field_index_range['und'])) {
        $variables[$model . '_range'] = $node->field_index_range['und'][0]['value'];
      } else {
        if (!empty($ranges)) {
          $variables[$model . '_range'] =  max($ranges);
        }
      }

      if (isset($node->field_index_acceleration['und'])) {
        $variables[$model . '_acceleration'] = $node->field_index_acceleration['und'][0]['value'];
      } else {
        $variables[$model . '_acceleration'] = min($accelerations);
      }
      if (isset($node->field_index_topspeed['und'])) {
        $variables[$model . '_topspeed'] = $node->field_index_topspeed['und'][0]['value'];
      } else {
        $variables[$model . '_topspeed'] = max($top_speeds);
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

