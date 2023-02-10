    <footer>
        <div class="link-flex">
            <ul class="link-category">
                <p>Firma</p>
                <a href=""><?= $dictionairy[$language.'_about']?></a>
                <a href=""><?= $dictionairy[$language.'_career']?></a>
                <a href=""><?= $dictionairy[$language.'_mobile']?></a>
                <a href=""><?= $dictionairy[$language.'_discover']?></a>
                <a href=""><?= $dictionairy[$language.'_how_we_work']?></a>            
                <?= $language == 'dk' ? '<a href="">Derfor vælger rejsende momondo</a><a href="">Bæredygtighed</a>' : ''; ?>      
                <a href=""><?= $dictionairy[$language.'_momondo_coupon_codes']?></a>
            </ul>

            <ul class="link-category">
                <p><?= $dictionairy[$language.'_contact']?></p>
                <a href=""><?= $dictionairy[$language.'_help_FAQ']?></a>
                <a href=""><?= $dictionairy[$language.'_press']?></a>
                <a href=""><?= $dictionairy[$language.'_affiliates']?></a>
                <?= $language == 'dk' ? '<a href="">Annoncér hos os</a>' : ''; ?>      
            </ul>

            <ul class="link-category">
                <p><?= $dictionairy[$language.'_more']?></p>
                <a href=""><?= $dictionairy[$language.'_airline_fees']?></a>
                <a href=""><?= $dictionairy[$language.'_airlines']?></a>
            </ul>
        </div>
        <div id="pickers">
            <h5 class="hide-on-mobile"><?= $dictionairy[$language.'_site']?> / <?= $dictionairy[$language.'_currency']?></h5>
            <div class="picker-row" onclick="toggleLanguage()">
                <div class="picker-text" >
                    <p class="picker-category"><?= $dictionairy[$language.'_site']?></p>
                    <p class="picker-current"><?= $dictionairy[$language.'_country']?></p>
                </div>
                <div><?= $rightArrowSVG ?></div>
            </div>
            <div class="picker-row">
                <div class="picker-text">
                    <p class="picker-category"><?= $dictionairy[$language.'_currency']?></p>
                    <p class="picker-current"><?= $dictionairy[$language.'_currency_value']?></p>
                </div>
                <div><?= $rightArrowSVG ?></div>
            </div>
        </div>
        
        <ul id="privacy-menu">
            <a href=""><?= $dictionairy[$language.'_privacy']?></a>
            <a href=""><?= $dictionairy[$language.'_terms_and_conditions']?></a>
            <a href=""><?= $dictionairy[$language.'_ad_choices']?></a>
            <span>@2022 momondo</span> 
        </ul>
        
        
    </footer>

    <script src="/momondo-clone/js_app.js"></script>
    <script src="/momondo-clone/validator.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>