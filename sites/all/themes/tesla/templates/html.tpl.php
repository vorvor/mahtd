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
    <title>Tesla ár és vásárlás Magyarországon - Tesla Model 3 ár kalkuláció és rendelés 2 hónapon belül | Tesla.hu</title>
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

    <link rel="alternate" type="application/rss+xml" title="Tesla ár és vásárlás Magyarországon - Tesla Model 3 ár kalkuláció és rendelés 2 hónapon belül | Tesla.hu RSS" href="https://www.tesla.hu/rss.xml" />
    <meta name="description" content="Tesla rendelés Magyarországon egyedülállóan rövid időn belül a Magyar Autókereskedőház Zrt.-től. Számolja ki elektromos Tesla autó konfigurátorunk segítségével a Tesla Model 3 árát, valamint a Tesla Model S, Tesla Model Y, Model X árát." />
    <meta name="generator" content="Drupal 7 (https://www.drupal.org)" />
    <link rel="canonical" href="https://www.tesla.hu/" />
    <link rel="shortlink" href="https://www.tesla.hu/" />
    <meta property="fb:app_id" content="1192951680871368" />
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="Tesla ár és vásárlás Magyarországon - Tesla Model 3 ár kalkuláció és rendelés 2 hónapon belül | Tesla.hu" />
    <meta property="og:url" content="https://www.tesla.hu/" />
    <meta property="og:title" content="Tesla ár és vásárlás Magyarországon - Tesla Model 3 ár kalkuláció és rendelés 2 hónapon belül | Tesla.hu" />
    <meta property="og:determiner" content="auto" />
    <meta property="og:description" content="Tesla rendelés Magyarországon egyedülállóan rövid időn belül a Magyar Autókereskedőház Zrt.-től. Számolja ki elektromos Tesla autó konfigurátorunk segítségével a Tesla Model 3 árát, valamint a Tesla Model S, Tesla Model Y, Model X árát." />
    <meta property="og:image" content="https://www.tesla.hu/sites/default/files/model-3-orra_0.jpg" />
    <meta property="og:image:url" content="https://www.tesla.hu/sites/default/files/model-3-orra_0.jpg" />
    <meta property="og:image:secure_url" content="https://www.tesla.hu/sites/default/files/model-3-orra_0.jpg" />
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:url" content="https://www.tesla.hu/" />
    <meta name="twitter:title" content="Tesla ár és vásárlás Magyarországon - Tesla Model 3 ár kalkuláció és" />
    <meta name="dcterms.title" content="Tesla ár és vásárlás Magyarországon - Tesla Model 3 ár kalkuláció és rendelés 2 hónapon belül | Tesla.hu" />
    <meta name="dcterms.type" content="Text" />
    <meta name="dcterms.identifier" content="https://www.tesla.hu/" />
    <meta name="dcterms.format" content="text/html" />
    
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
                  <img alt="logo" src="/<?php print $theme_path; ?>/images/logo.png">
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
                <img alt="logo mono" src="/<?php print $theme_path; ?>/images/logo-monochrome.jpg">
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
