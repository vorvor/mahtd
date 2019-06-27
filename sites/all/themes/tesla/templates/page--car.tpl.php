<div id="first-row-wrapper">
            <div id="spacer">
            </div>
            <div id="first-row">
                <div id="data-1" class="first-row-data">
                    <div class="data">
                        <div class="data-text">
                            <div>gyorsulás 0 - 100 km/h</div>
                            <div><span class="large-font">2,6 mp</span>-től</div>
                        </div>
                    </div>
                </div>
                <div id="data-2" class="first-row-data">
                    <div class="data">
                        <div class="data-text">
                            <div>hatótávolság</div>
                            <div><span class="large-font">610 km</span>-ig</div>
                        </div>
                    </div>
                </div>
                <div id="data-3" class="first-row-data">
                    <div class="red-button">
                        <a href="#" class="">Megrendelem</a>
                    </div>
                </div>
            </div>

    </div>
    <div id="second-row-wrapper">
        <div id="second-row-left">
            <h2 class="row-title">Tesla Model S</h2>
            <h3 class="row-title">Technikai adatok</h3>
            <?php print $technical_details; ?>
        </div>
        <div id="second-row-right"></div>
    </div>
    <div id="third-row-wrapper">
        <div id="third-row-left">
            <h2 class="row-title">Tesla Model S</h2>
            <h3 class="row-title">Konfigurátor</h3>
            <div id="config-calc">
                <div class="config-calc-row">
                    <div class="config-calc-label">Hatótávolság:</div>
                    <div class="config-calc-data"><span id="range">200</span> km</div>
                    <div class="config-calc-desc">(WLTP számolás alapján)</div>
                </div>
                <div class="config-calc-row">
                    <div class="config-calc-label">Végsebesség:</div>
                    <div class="config-calc-data"><span id="topspeed">250</span> km/h</div>
                </div>
                <div class="config-calc-row">
                    <div class="config-calc-label">Gyorsulás:</div>
                    <div class="config-calc-data"><span id="acceleration">4,6</span> mp</div>
                    <div class="config-calc-desc">(0-100 km/h)</div>
                </div>
            </div>
        
            <div id="third-row-right">
            
            <?php if (isset($facilities)): ?>
            <div class="config-block" id="facility-block">
                <div class="config-block-top">
                    <div class="config-title">Felszereltség</div>
                    <div class="config-price"><span class="price">0</span> EUR</div>
                </div>
                <div class="config-block-desc">
                </div>

                <div class="config-options config-buttons">
                	<?php foreach ($facilities as $item) { ?>
                	  <div class="config-button" 
                	  data-price="<?php print $item['price']; ?>" 
                	  data-range="<?php print $item['range']; ?>"
                	  data-topspeed="<?php print $item['top_speed']; ?>"
                	  data-acceleration="<?php print $item['acceleration']; ?>"
                	  data-wrapper="facility">
                	  <?php print $item['title']; ?></div>
                	<?php } ?>
                </div>
            </div>
        	<?php endif; ?>

        	<?php if (isset($exteriors)): ?>
            <div class="config-block" id="exterior-block">
                <div class="config-block-top">
                    <div class="config-title">Külső szín</div>
                    <div class="config-price"><span class="price">0</span> EUR</div>
                </div>
                <div class="config-block-desc">
                    Mélykék metál fényezés
                </div>

                <div class="config-options config-berries berries-5">
                	<?php foreach ($exteriors as $item) { ?>
                		<div class="config-berry" 
                		data-title="<?php print $item['title']; ?>"
                		data-price="<?php print $item['price']; ?>"
                		data-wrapper="exterior">
                			<img src="<?php print file_create_url($item['image']) ?>">
                		</div>
                	<?php } ?>
                </div>
            </div>
            <?php endif; ?>

            <?php if (isset($exteriors)): ?>
            <div class="config-block" id="rim-block">
                <div class="config-block-top">
                    <div class="config-title">Felni</div>
                    <div class="config-price"><span class="price">0</span> EUR</div>
                </div>
                <div class="config-block-desc">
                    Mélykék metál fényezés
                </div>

                <div class="config-options config-berries berries-5">
                	<?php foreach ($rims as $item) { ?>
                		<div class="config-berry" 
                		data-title="<?php print $item['title']; ?>"
                		data-price="<?php print $item['price']; ?>"
                		data-wrapper="rim">
                			<img src="<?php print file_create_url($item['image']) ?>">
                		</div>
                	<?php } ?>
                </div>
            </div>
            <?php endif; ?>

            <?php if (isset($winter_wheels)): ?>
            <div class="config-block" id="winter-wheel-block">
                <div class="config-block-top">
                    <div class="config-title">Téli garnitúra Pirelli gumival</div>
                    <div class="config-price"><span class="price">0</span> EUR</div>
                </div>
                <div class="config-block-desc">
                    
                </div>

                <div class="config-options config-berries berries-5">
                	<?php foreach ($winter_wheels as $item) { ?>
                		<div class="config-berry" 
                		data-title="<?php print $item['title']; ?>"
                		data-price="<?php print $item['price']; ?>"
                		data-wrapper="winter-wheel">
                			<img src="<?php print file_create_url($item['image']) ?>">
                		</div>
                	<?php } ?>
                </div>
            </div>
            <?php endif; ?>

            <?php if (isset($winter_wheels)): ?>
            <div class="config-block" id="winter-wheel-block">
                <div class="config-block-top">
                    <div class="config-title">Téli garnitúra Pirelli gumival</div>
                    <div class="config-price"><span class="price">0</span> EUR</div>
                </div>
                <div class="config-block-desc">
                    
                </div>

                <div class="config-options config-berries berries-5">
                	<?php foreach ($winter_wheels as $item) { ?>
                		<div class="config-berry" 
                		data-title="<?php print $item['title']; ?>"
                		data-price="<?php print $item['price']; ?>"
                		data-wrapper="winter-wheel">
                			<img src="<?php print file_create_url($item['image']) ?>">
                		</div>
                	<?php } ?>
                </div>
            </div>
            <?php endif; ?>

            <?php if (isset($extras)): ?>
            <div class="config-block" id="extra-block">
                <div class="config-block-top">
                    <div class="config-title">Extra</div>
                    <div class="config-price"><span class="price">0</span> EUR</div>
                </div>
                <div class="config-block-desc">
                    
                </div>

                <div class="config-options config-berries berries-5">
                	<?php foreach ($extras as $item) { ?>
                		<div class="config-berry" 
                		data-title="<?php print $item['title']; ?>"
                		data-price="<?php print $item['price']; ?>"
                		data-wrapper="extra">
                			<img src="<?php print file_create_url($item['image']) ?>">
                		</div>
                	<?php } ?>
                </div>
            </div>
            <?php endif; ?>

            <?php if (isset($interiors)): ?>
            <div class="config-block" id="interior-block">
                <div class="config-block-top">
                    <div class="config-title">Belső szín</div>
                    <div class="config-price"><span class="price">0</span> EUR</div>
                </div>
                <div class="config-block-desc">
                    Mélykék metál fényezés
                </div>

                <div class="config-options config-berries berries-5">
                	<?php foreach ($interiors as $item) { ?>
                		<div class="config-berry" 
                		data-title="<?php print $item['title']; ?>"
                		data-price="<?php print $item['price']; ?>"
                		data-wrapper="interior">
                			<img src="<?php print file_create_url($item['image']) ?>">
                		</div>
                	<?php } ?>
                </div>
            </div>
            <?php endif; ?>

            <?php if (isset($seats)): ?>
            <div class="config-block" id="seat-block">
                <div class="config-block-top">
                    <div class="config-title">Felszereltség</div>
                    <div class="config-price"><span class="price">0</span> EUR</div>
                </div>
                <div class="config-block-desc">
                </div>

                <div class="config-options config-buttons">
                	<?php foreach ($seats as $item) { ?>
                	  <div class="config-button" 
                	  data-price="<?php print $item['price']; ?>" 
                	  data-range="<?php print $item['range']; ?>"
                	  data-topspeed="<?php print $item['top_speed']; ?>"
                	  data-acceleration="<?php print $item['acceleration']; ?>"
                	  data-wrapper="seat">
                	  <?php print $item['title']; ?></div>
                	<?php } ?>
                </div>
            </div>
        	<?php endif; ?>

            <?php if (isset($autopilot)): ?>
            <div class="config-block" id="autopilot-block">
                <div class="config-block-top">
                    <div class="config-title">Önvezetés</div>
                    <div class="config-price"><span class="price">87 425</span> EUR</div>
                </div>
                <div class="config-block-desc">
                </div>

                <div class="config-options config-buttons">
                	<?php foreach ($autopilots as $item) { ?>
                	  <div class="config-button" 
                	  data-price="<?php print $item['price']; ?>" 
                	  data-wrapper="autopilot">
                	  <?php print $item['title']; ?></div>
                	<?php } ?>
                </div>
            </div>
            <?php endif; ?>

            <div class="config-block" id="shipping-block">
                <div class="config-block-top">
                    <div class="config-title">Szállítás</div>
                    <div class="config-price price">990 EUR</div>
                </div>
            </div>
            <div class="config-block">
                <div class="config-block-top" id="tr-val-block">
                    <div class="config-title">Forgalomba helyezés</div>
                    <div class="config-price price">0 EUR</div>
                </div>
            </div>
            <div class="config-block">
                <div class="config-sum-price">
                    <div class="config-title">Brutto vételár</div>
                    <div class="config-price"><span id="sumprice">990</span> EUR</div>
                </div>
            </div>
            <div class="config-block config-block-with-button">
                <div class="red-button red-button-wide">
                    <a href="#" class="">Megrendelés véglegesítése</a>
                </div>
            </div>
            <div class="config-block">
                <span class="config-note">A konfigurátorral kiszámított vételár indikatív ajánlatnak minősül, ügyfél által történő kalkulációt követően a Magyar Autókereskedőház Zrt.-vel szerződésbe való foglalása esetén érvényes. Jelen konfiguráció a rendelkezésre álló piaci adatok feldolgozásának segítségével került előállításra, a Magyar Autókereskedőház Zrt. fenntartja a jogot annak módosítására.</span>
            </div>
        </div>
        </div>
    </div>