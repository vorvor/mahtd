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
          preg_match('/id="config-photo-src" data-src="(.*?)"/ms', $body, $match);
          $image_src = trim($match[1]);
          $body = str_replace('###CONFIG_PHOTO###', $image_src, $body);

          print $body;
          watchdog('order template', 'mimemail-message.tpl.php');
          watchdog('accessories-order-mail-body', $body); 
        ?>
      </div>
    </div>
  </body>
</html>
