<?php
    session_start();
    $_page = "stays";
    require_once __DIR__.'/comp-header.php'
?>

<div id="content-menu-flex">
    <?php require_once __DIR__.'/comp-navigation.php'?>
    <div id="content">
        <div class="header-match-margin"></div>
        <main class="subpage" id="stays">
            <section id="hero">
                <h1 class="title"><?= $dictionairy[$language.'_stays']?></h1>
            </section> 
            <section class="current-destinations">
                <div class="flex">
                    <div>
                    <h2 class="title"><?=$dictionairy[$language.'_top_8_cities']?></h2>
                    <p><?=$dictionairy[$language.'_top_8_cities_text']?></p>
                    </div>
                    <button class="btn"><?=$dictionairy[$language.'_see_all']?></button>
                </div>

                <div class="medium-card-container">
                    <div class="arrow-flex">
                        <div class="card-arrow ca-left hide">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200" class="JRE_-arrow-svg" role="img" cleanup="">
                                <path d="M120.002 160a4.987 4.987 0 0 1-3.702-1.637l-50-55a5 5 0 0 1 0-6.727l50-55a5 5 0 0 1 7.4 6.727L76.757 100l46.943 51.637a5 5 0 0 1-3.698 8.363z"></path>
                            </svg>
                        </div>
                        <div class="card-arrow ca-right">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200" class="JRE_-arrow-svg" role="img" cleanup="">
                                <path d="M79.999 160a5 5 0 0 1-3.698-8.363L123.243 100L76.3 48.363a5 5 0 0 1 7.399-6.727l50 55a5.002 5.002 0 0 1 0 6.727l-50 55a4.986 4.986 0 0 1-3.7 1.637z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="medium-card">
                        <div class="bg <?= $language == 'dk' ? 'kobenhavn-img' : 'lasvegas-img' ?>">
                            <div class="tag hide"><?=$dictionairy[$language.'_open']?></div>
                        </div>
                        <div>
                            <p class="city-name-on-card"><?=$dictionairy[$language.'_top_8_cities_card1_header']?></p>
                            <p class="info-on-card">
                                <?=$dictionairy[$language.'_top_8_cities_card1_text']?>
                            </p>
                        </div>
                    </div>
                    <div class="medium-card show-on-tablet">
                        <div class="bg <?= $language == 'dk' ? 'aarhus-img' : 'newyork-img' ?>">
                            <div class="tag hide"><?=$dictionairy[$language.'_open']?></div>
                        </div>
                        <div>
                            <p class="city-name-on-card"><?=$dictionairy[$language.'_top_8_cities_card2_header']?></p>
                            <p class="info-on-card">
                                <?=$dictionairy[$language.'_top_8_cities_card2_text']?>
                            </p>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <?php require_once __DIR__.'/comp-footer.php'?>
    </div>
</div>