<?php
/**
 * @file
 * Returns the HTML for the basic html structure of a single Drupal page.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728208
 */
?><!DOCTYPE html>
<html>
<head>
    <?php print $head; ?>
    <?php print $styles; ?>
    <?php print $scripts; ?>

    <?php
      $theme_path = drupal_get_path('theme', 'tesla');
    ?>
    <link rel="stylesheet" href="/<?php print $theme_path; ?>/css/normalize.css">
    <link rel="stylesheet" href="/<?php print $theme_path; ?>/css/vars.css">
    <link rel="stylesheet" href="/<?php print $theme_path; ?>/css/fonts.css">
    <link rel="stylesheet" href="/<?php print $theme_path; ?>/css/style.css">
    <link rel="stylesheet" href="/<?php print $theme_path; ?>/css/resp.css">
    
    <meta name="MobileOptimized" content="width">
    <meta name="HandheldFriendly" content="true">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta charset="utf-8"/>
    
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
    <!--  <script src="./js/script.js"></script>  -->
</head>
<body class="<?php print $body_class; ?>">
    <?php if (isset($messages)): ?>
      <div id="messages"><?php print $messages; ?></div>
    <?php endif; ?>
    <div id="mobile-menu-block" class="invisible">
        <div id="mobile-menu-close-wrapper">
            <div id="mobile-menu-close"></div>
        </div>
        <nav>
          <ol id="menu">
            <?php print $main_menu; ?>
            <li><a href="/<?php print $services_page_path; ?>">Szolgáltatásaink</a></li>
            <li><a href="/<?php print $contact_page_path; ?>">Kapcsolat</a></li>
          </ol>
        </nav>
    </div>
    <div id="top">
        <header>
           <h1 id="logo-wrapper">
              <a id="logo" href="/" title="Mah Zrt. - tesla.hu">
                  <img src="/<?php print $theme_path; ?>/images/logo.png">
              </a>
           </h1>  
        </header>
        <nav>
          <ol id="menu">
            <?php print $main_menu; ?>
          </ol>
        </nav>
        <div id="mobile-menu" class="mobile-nav-button" aria-label="Menu" title="Menu">
        </div>
    </div>
    <?php print $page; ?>
    <footer>
        <div id="footer-inner">
            <div id="footer-1" class="footer-block">
                <img src="/<?php print $theme_path; ?>/images/logo-monochrome.jpg">
            </div>
            <div id="footer-2" class="footer-block">
              <ol id="menu">
                <?php print $main_menu; ?>
              </ol>
            </div>
            <div id="footer-3" class="footer-block">© 2019 MAHZRT</div>
        </div>
    </footer>
    <a id="scrolltop" href="#"></a>
</body>
</html>
