<?php
    session_start();
    $_page = "trips";
    require_once __DIR__.'/languages.php';
    require_once __DIR__.'/comp-header.php'
?>

<div id="content-menu-flex">
    <?php require_once __DIR__.'/comp-navigation.php'?>
    <div id="content">
        <div class="header-match-margin"></div>
        <main id="tripspage">
            <section id="hero">
                <div>
                    <div>
                        <h1 class="title"><?= $dictionairy[$language.'_trips_header']?></h1>
                        <h4><?= $dictionairy[$language.'_trips_explanation']?></h4>
                        <button type="button" class="btn pink-bg"><?= $dictionairy[$language.'_trips_login_btn']?></button>
                        <button type="button" class="btn"><?= $dictionairy[$language.'_trips_bookings_btn']?></button>
                    </div>
                    <div id="trips-img"></div>
                </div>
            </section>
        </main>
        <?php require_once __DIR__.'/comp-footer.php'?>
    </div>
</div>


10x13