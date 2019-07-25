<?php $node = node_load(7); ?>
<div id="first-row-wrapper">
        <div class="services-title">Szolgáltatásaink</div>
        <div class="services-description">
        <?php print $node->field_text_1['und'][0]['value']; ?>
        </div>
    </div>
    <div id="second-row-wrapper">
        <div id="second-row">
            <div id="second-row-left">
                <div class="mah">Magyar Autókereskedőház Zrt.</div>
                <div class="row-title">Finanszírozási lehetőségek</div>
            </div>
            <div id="second-row-right">
            <?php print $node->field_text_2['und'][0]['value']; ?>
            </div>
        </div>
    </div>
    <div id="third-row-wrapper">
        <div id="third-row">
            <?php
                $rows = explode("\n", $node->field_text_3['und'][0]['value']);
            ?>
            <div id="third-row-col-1" class="third-row-col"> 
                <div class="col-title"><?php print $rows[0]; ?></div>
                <div class="col-content">
                    <?php 
                    $c = 0;
                    while (isset($rows[$c + 2])) { ?>
                        <div class="col-row">
                            <span class="col-row-label"><?php print $rows[$c + 2]; ?></span>
                            <span class="col-row-content"><?php print $rows[$c + 3]; ?></span>
                        </div>
                    <?php 
                    $c += 3;
                    } ?>
                </div>
            </div>
            <?php
                $rows = explode("\n", $node->field_text_4['und'][0]['value']);
            ?>
            <div id="third-row-col-2" class="third-row-col"> 
                <div class="col-title">Nyíltvégű pénzügyi lízing</div>
                <div class="col-content">
                    <?php 
                    $c = 0;
                    while (isset($rows[$c + 2])) { ?>
                        <div class="col-row">
                            <span class="col-row-label"><?php print $rows[$c + 2]; ?></span>
                            <span class="col-row-content"><?php print $rows[$c + 3]; ?></span>
                        </div>
                    <?php 
                    $c += 3;
                    } ?>
                </div>
            </div>
            <?php
                $rows = explode("\n", $node->field_text_5['und'][0]['value']);
            ?>
            <div id="third-row-col-3" class="third-row-col"> 
                <div class="col-title">Operatív lízing vagy tartós bérlet</div>
                <div class="col-content">
                    <?php 
                    $c = 0;
                    while (isset($rows[$c + 2])) { ?>
                        <div class="col-row">
                            <span class="col-row-label"><?php print $rows[$c + 2]; ?></span>
                            <span class="col-row-content"><?php print $rows[$c + 3]; ?></span>
                        </div>
                    <?php 
                    $c += 3;
                    } ?>
                </div>
            </div>
        </div>
    </div>
    <div id="fourth-row-wrapper">
        <div id="fourth-row">
            <div id="fourth-row-title">
                <?php print $node->field_text_6['und'][0]['value']; ?>
            </div>
            <div id="fourth-row-button">
                <div class="red-button">
                    <a href="/tesla/kapcsolat" class="">Kapcsolat</a>
                </div>
            </div>
        </div>
    </div>
    <div id="fifth-row-wrapper">
        <div id="fifth-row-left">
            <h2 class="row-title">Magyar Autókereskedőház Zrt.</h2>
            <h3 class="row-title">Biztosítási lehetőségek</h3>
            <div class="technical-details">
                <?php print $technical_details; ?>
            </div>
        </div>
        <div id="fifth-row-right">
            <?php print $node->field_text_7['und'][0]['value']; ?>
        </div>
    </div>