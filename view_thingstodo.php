<?php
    session_start();
    $_page = "thingstodo";
    require_once __DIR__.'/languages.php';
    require_once __DIR__.'/comp-header.php'
?>

<div id="content-menu-flex">
    <?php require_once __DIR__.'/comp-navigation.php'?>
    <div id="content">
        <div class="header-match-margin"></div>
        <main class="subpage" id="thingstodo">
            <section id="hero">
                <h1 class="title"><?= $dictionairy[$language.'_thingstodo']?></h1>
            </section> 
        </main>
        <?php require_once __DIR__.'/comp-footer.php'?>
    </div>
</div>