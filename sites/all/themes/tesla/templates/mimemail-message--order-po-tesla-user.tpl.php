<?php

/**
 * @file
 * Default theme implementation to format an HTML mail.
 *
 * Copy this file in your default theme folder to create a custom themed mail.
 * Rename it to mimemail-message--[module]--[key].tpl.php to override it for a
 * specific mail.
 *
 * Available variables:
 * - $recipient: The recipient of the message
 * - $subject: The message subject
 * - $body: The message body
 * - $css: Internal style sheets
 * - $module: The sending module
 * - $key: The message identifier
 *
 * @see template_preprocess_mimemail_message()
 */
?>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="https://fonts.googleapis.com/css?family=Barlow:500,700,800&display=swap" rel="stylesheet">
    <?php if ($css): ?>
    <style type="text/css">

    @import url("https://use.typekit.net/xxa7rwd.css");


      <!--
      <?php print $css ?>
      -->
    </style>
    <?php endif; ?>
  </head>
  <body id="mimemail-body" <?php if ($module && $key): print 'class="'. $module .'-'. $key .'"'; endif; ?>>
    
    <div id="center">
      <div id="main">
        <?php
          preg_match_all('/data-image=\"(.*?)\"/ms', $body, $match);
          $config_photo = trim(str_replace("\n", "", $match[1][0]));
          $body = str_replace('###CONFIG-PHOTO###', $config_photo, $body);

          preg_match_all('/data-keys="(.*?)"/ms', $body, $keys);
          preg_match_all('/data-values="(.*?)"/ms', $body, $values);

          $keys_e = explode(',', $keys[1][0]);
          $values_e = explode(',', $values[1][0]);
          $c = 0;
          foreach ($values_e as $value) {
            $key = trim($keys_e[$c]);
            if (empty(trim($value))) {
              $pattern = '/<span id="' . $key . '">.*?<\/span>/ms';
              $body = preg_replace($pattern, '', $body);
            }
            $c++;
          }

          preg_match('/data-funding.*?right">(.*?)<\/div>/ms', $body, $match);

          if (empty(trim($match[1]))) {
            $body = preg_replace('/<div id="funding-title">.*?<div id="funding-end"><\/div>/ms', '', $body);
          }

          $body = str_replace(' !', '!', $body);

          print $body;
          watchdog('order template', 'mimemail-message--order-po-tesla-user.tpl.php');
          watchdog('po-order-mail-body', $body); 
        ?>
      </div>
    </div>
  </body>
</html>
