<?php $node = node_load(6); ?>
<div id="first-row-wrapper">
        <div class="contact-title">Kapcsolat</div>
    </div>
    <div id="second-row-wrapper">
        <div id="second-row-left">
            <iframe allowfullscreen="" frameborder="0" height="290" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2698.3006127684375!2d18.980286715906345!3d47.445079307114575!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4741e0aad6a5d437%3A0x593a19e9c78f1d1b!2zTWFneWFyIEF1dMOza2VyZXNrZWTFkWjDoXogWnJ0Lg!5e0!3m2!1shu!2shu!4v1557491879317!5m2!1shu!2shu" style="border:0" width="100%"></iframe>
            <div class="contact-row-1">
                <div class="mah">Magyar Autókereskedőház Zrt.</div>
            </div>
            <div class="contact-row-2">
                <div class="contact-first-part contact-part">
                    <div class="open-hours-label">Nyitvatartás</div>
                    <div class="open-hours">
                        <?php print $node->field_text_3['und'][0]['value']; ?>
                    </div>
                </div>
                <div class="contact-second-part contact-part">
                    <?php print $node->field_text_4['und'][0]['value']; ?>
                </div>
                <div class="contact-third-part contact-part">
                    <?php print $node->field_text_5['und'][0]['value']; ?>
                </div>
            </div>
        </div>
        <div id="second-row-right">
            <h2>Azonnali üzenetküldés</h2>
            <div id="contact-form">
                <?php
                    $nid = 8; //node id of the webform node
                    $node = node_load($nid);
                    $form = drupal_get_form('webform_client_form_' . $nid, $node);
                    print drupal_render($form);
                ?>
            </div>
        </div>
    </div>