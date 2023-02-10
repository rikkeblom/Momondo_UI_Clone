<?php
    session_start();
    $_page = "404";
    require_once __DIR__.'/languages.php';
    require_once __DIR__.'/comp-header.php';
?>

<div id="content-menu-flex">
    <?php require_once __DIR__.'/comp-navigation.php'?>
    <div id="content">
        <main>
        <div class="s0rO-main-container">
            <div class="Kugv-container">
                <span class="Kugv-char Kugv-char--large">
                    <span class="Kugv-char-top"></span>
                    <span class="Kugv-char-split"></span>
                    <span>:</span>
                </span>
                <span class="Kugv-char Kugv-char--large">
                    <span class="Kugv-char-top"></span>
                    <span class="Kugv-char-split"></span>
                    <span>-</span>
                </span>
                <span class="Kugv-char Kugv-char--large">
                    <span class="Kugv-char-top"></span>
                    <span class="Kugv-char-split"></span>
                    <span>(</span>
                </span>
            </div>
            <div>
                <div class="s0rO-error-message"><?= $dictionairy[$language.'_no_page'] ?></div>
                <div>
                    <a href="/momondo-clone/"><?= $dictionairy[$language.'_home'] ?></a>
                    <a href=""><?= $dictionairy[$language.'_feedback'] ?></a>
                </div>
            </div>
        </div>
        </main>
        <?php require_once __DIR__.'/comp-footer.php'?>
    </div>
</div>