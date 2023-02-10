<?php
    session_start();
    $_page = "flightsearch";
    require_once __DIR__.'/languages.php';
    require_once __DIR__.'/comp-header.php'
?>

<div id="content-menu-flex">
    <?php require_once __DIR__.'/comp-navigation.php'?>
    <div id="content">
        <div class="header-match-margin"></div>
        <main class="subpage" id="flightsearch">
            <section id="hero">
                <p>language: <?= $language ?></p>
                <h1 class="title"><?= $dictionairy[$language.'_flight_search'] ?></h1>
                <p>Flights from: <?= $_GET['from_input']?>, to: <?= $_GET['to_input']?></p>
            </section> 
        </main>
        <?php require_once __DIR__.'/comp-footer.php'?>
    </div>
</div>