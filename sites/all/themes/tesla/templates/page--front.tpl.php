<?php
    $theme_path = drupal_get_path('theme', 'tesla');
?>

<div class="index-row-wrapper" id="index-first-row">
        <div id="spacer">
        </div>
        <div class="index-row">
            <div id="data-1" class="index-row-data">
                <div class="data">
                    <div class="data-text">
                        <div>gyorsulás 0 - 100 km/h</div>
                        <div><span class="large-font"><?php print $model_3_acceleration; ?> mp</span>-től</div>
                    </div>
                </div>
            </div>
            <div id="data-2" class="index-row-data">
                <div class="data">
                    <div class="data-text">
                        <div>hatótávolság</div>
                        <div><span class="large-font"><?php print $model_3_range; ?> km</span>-ig</div>
                    </div>
                </div>
            </div>
            <div id="data-3" class="index-row-data">
                <div class="red-button">
                    <a href="/tesla/tesla-model-3" class="">Részletek</a>
                </div>
            </div>
        </div>

    </div>
    <div class="index-row-wrapper" id="index-second-row">
            <div id="spacer">
            </div>
            <div class="index-row">
                <div id="data-1" class="index-row-data">
                    <div class="data">
                        <div class="data-text">
                            <div>gyorsulás 0 - 100 km/h</div>
                            <div><span class="large-font"><?php print $model_s_acceleration; ?> mp</span>-től</div>
                        </div>
                    </div>
                </div>
                <div id="data-2" class="index-row-data">
                    <div class="data">
                        <div class="data-text">
                            <div>hatótávolság</div>
                            <div><span class="large-font"><?php print $model_s_range; ?> km</span>-ig</div>
                        </div>
                    </div>
                </div>
                <div id="data-3" class="index-row-data">
                    <div class="red-button">
                        <a href="/tesla/tesla-model-s" class="">Részletek</a>
                    </div>
                </div>
            </div>

    </div>
    <div class="index-row-wrapper" id="index-third-row">
            <div id="spacer">
            </div>
            <div class="index-row">
                <div id="data-1" class="index-row-data">
                    <div class="data">
                        <div class="data-text">
                            <div>gyorsulás 0 - 100 km/h</div>
                            <div><span class="large-font"><?php print $model_x_acceleration; ?> mp</span>-től</div>
                        </div>
                    </div>
                </div>
                <div id="data-2" class="index-row-data">
                    <div class="data">
                        <div class="data-text">
                            <div>hatótávolság</div>
                            <div><span class="large-font"><?php print $model_x_range; ?> km</span>-ig</div>
                        </div>
                    </div>
                </div>
                <div id="data-3" class="index-row-data">
                    <div class="red-button">
                        <a href="/tesla/tesla-model-x" class="">Részletek</a>
                    </div>
                </div>
            </div>

    </div>
    <div class="index-row-wrapper" id="index-fourth-row">
        <div class="index-row">

            <div class="index-col index-col-left">
                <div class="col-block year-model">
                    <div class="year"><img src="/<?php print $theme_path; ?>/images/2020.png"></div>
                    <div class="name-model">
                        <div class="name">Tesla</div>
                        <div class="model">Roadster</div>
                    </div>
                </div>
                <div class="col-block col-data">
                    <div id="data-1" class="index-row-data">
                        <div class="data">
                            <div class="data-text">
                                <div>gyorsulás 0 - 100 km/h</div>
                                <div><span class="large-font"><?php print $roadster_acceleration; ?> mp</span></div>
                            </div>
                        </div>
                    </div>
                    <div id="data-2" class="index-row-data">
                        <div class="data">
                            <div class="data-text">
                                <div>végsebesség</div>
                                <div><span class="large-font"><?php print $roadster_topspeed; ?>  km/h</span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-block col-extra">
                    <?php 
                    $node = node_load(5);

                    foreach ($node->field_index_extras[LANGUAGE_NONE] as $item) { 
                        $paragraph = entity_load('paragraphs_item', array($item['value']));
                        $paragraph = reset($paragraph);
                        ?>
                        <div class="extra">
                            <div class="extra-icon">
                                <img src="<?php print file_create_url($paragraph->field_image['und'][0]['uri']); ?>">
                            </div>
                            <div class="extra-desc">
                                <?php print $paragraph->field_title['und'][0]['value']; ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="col-block col-order">
                    <div class="red-button">
                        <a href="/tesla/tesla-roadster" class="">Részletek</a>
                    </div>
                </div>
            </div>

            <div class="index-col index-col-right">
                <div class="col-block year-model">
                    <div class="year"><img src="/<?php print $theme_path; ?>/images/2019.png"></div>
                    <div class="name-model">
                        <div class="name">Tesla</div>
                        <div class="model">model Y</div>
                    </div>
                </div>
                <div class="col-block col-data">
                    <div id="data-1" class="index-row-data">
                        <div class="data">
                            <div class="data-text">
                                <div>gyorsulás 0 - 100 km/h</div>
                                <div><span class="large-font"><?php print $model_y_acceleration; ?> mp</span>-től</div>
                            </div>
                        </div>
                    </div>
                    <div id="data-2" class="index-row-data">
                        <div class="data">
                            <div class="data-text">
                                <div>hatótávolság</div>
                                <div><span class="large-font"><?php print $model_y_range; ?> km</span>-ig</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-block col-extra">
                    <?php
                    $node = node_load(4);

                    foreach ($node->field_index_extras[LANGUAGE_NONE] as $item) { 
                        $paragraph = entity_load('paragraphs_item', array($item['value']));
                        $paragraph = reset($paragraph);
                        ?>
                        <div class="extra">
                            <div class="extra-icon">
                                <img src="<?php print file_create_url($paragraph->field_image['und'][0]['uri']); ?>">
                            </div>
                            <div class="extra-desc">
                                <?php print $paragraph->field_title['und'][0]['value']; ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="col-block col-order">
                    <div class="red-button">
                        <a href="/tesla/tesla-model-y" class="">Részletek</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="index-row-wrapper" id="index-fifth-row">
        <div class="index-row">
            <iframe allow="fullscreen" defer="defer" height="100vh" src="//www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2698.300798865563!2d18.98028671562492!3d47.44507567917426!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4741e0aad6a5d437%3A0x593a19e9c78f1d1b!2zTWFneWFyIEF1dMOza2VyZXNrZWTFkWjDoXogWnJ0Lg!5e0!3m2!1shu!2shu!4v1557134518362!5m2!1shu!2shu" style="border:0;width:99vw;height:100vh;" width="98vw"></iframe>
        </div>
    </div>
    <div class="index-row-wrapper" id="index-sixth-row">
        <div class="index-row">
            <div class="col-block col-1">
                <div class="mah">Magyar Autókereskedőház Zrt.</div>
                <div class="contact-title">Kapcsolat</div>
            </div>
            <div class="col-block col-2">
                <div class="contact-first-part">
                    <div class="address"><span class="address-label">Székhely:</span> 1112 Bp., Repülőtéri út 6. A épület</div>
                    <div class="phone"><span class="phone-label">Telefonszám:</span> +36202578998 / +36203663447</div>
                    <div class="email"><span class="email-label">Email:</span> info@mahzrt.hu</div>
                </div>
                <div class="contact-second-part">
                    <div class="tax-number"><span class="tax-number-label">Adószám:</span> 25196276-2-43</div>
                    <div class="company-id"><span class="company-id-label">Cégjegyzékszám:</span> 01-10-048433</div>
                </div>
            </div>
            <div class="col-block col-3">
                <div class="open-hours-label">Nyitvatartás</div>
                <div class="open-hours">
                    H-P: 9.00 - 17.00<br />
                    Sz-V: Zárva
                </div>
            </div>
        </div>
    </div>