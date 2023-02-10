<?php
    require_once __DIR__.'/languages.php';
    require_once __DIR__.'/svg-library.php';
?>

<nav  id="global-nav">
    <a class="global-nav-login-btn <?= $_page == 'admin' ? 'activeGlobalNav' : ''; ?>" 
        <?php
            if ($_SESSION){
                if(isset($_GET['language'])){
                    echo 'href="/admin/'.$_GET['language'].'"';
                } else {
                    echo 'href="/admin/en"';
                }
            } else {
                echo  'onclick="openSigninModal()"';
            }
        ?>
    >
        <?= $profileSVG ?>
        <p class="hide-menu-text-desktop"><?= $_SESSION ? 'Admin' : $dictionairy[$language.'_signin'] ?></p>
    </a>
    <div>
        <a class="<?= $_page == 'flights' ? 'activeGlobalNav' : ''; ?>"  href="/flights/<?= $_GET['language'] ?? 'en'?>">
            <?= $planeSVG ?>
            <p class="hide-menu-text-desktop"><?= $dictionairy[$language.'_flights']?></p>
        </a>

        <a class="<?= $_page == 'stays' ? 'activeGlobalNav' : ''; ?>"  href="/stays/<?= $_GET['language'] ?? 'en'?>">            
            <?= $staysSVG ?>
            <p class="hide-menu-text-desktop"><?= $dictionairy[$language.'_stays']?></p>
        </a>

        <a class="<?= $_page == 'carrental' ? 'activeGlobalNav' : ''; ?>"  href="/carrental/<?= $_GET['language'] ?? 'en'?>"">
            <?= $carRentalSVG ?>
            <p class="hide-menu-text-desktop"><?= $dictionairy[$language.'_carrental']?></p>
        </a>

        <a class="<?= $_page == 'thingstodo' ? 'activeGlobalNav' : ''; ?>"  href="/thingstodo/<?= $_GET['language'] ?? 'en'?>"">
            <?= $todoSVG ?>
            <p class="hide-menu-text-desktop"><?= $dictionairy[$language.'_thingstodo']?></p>
        </a>

        <a class="<?= $_page == 'packages' ? 'activeGlobalNav' : ''; ?>"  href="/packages/<?= $_GET['language'] ?? 'en'?>"">
            <?= $packagesSVG ?>
            <p class="hide-menu-text-desktop"><?= $dictionairy[$language.'_packages']?></p>
        </a>

        <a class="<?= $_page == 'ferries' ? 'activeGlobalNav' : ''; ?>"  href="/ferries/<?= $_GET['language'] ?? 'en'?>"">
            <?= $ferrySVG ?>
            <p class="hide-menu-text-desktop"><?= $dictionairy[$language.'_ferries']?></p>
        </a>
    </div>
    <div>
        <a class="<?= $_page == 'explore' ? 'activeGlobalNav' : ''; ?>"  href="/explore/<?= $_GET['language'] ?? 'en'?>"">
            <?= $exploreSVG ?>
            <p class="hide-menu-text-desktop"><?= $dictionairy[$language.'_explore']?></p>
        </a>

        <a class="<?= $_page == 'travelrestrictions' ? 'activeGlobalNav' : ''; ?>"  href="/travelrestrictions/<?= $_GET['language'] ?? 'en'?>">
            <?= $travelRestrictionsSVG ?>
            <p class="hide-menu-text-desktop"><?= $dictionairy[$language.'_travelrestrictions']?></p>
        </a>
    </div>
    <div>
        <a class="<?= $_page == 'trips' ? 'activeGlobalNav' : ''; ?>"  href="/trips/<?= $_GET['language'] ?? 'en'?>">
            <?= $tripsSVG ?>
            <p class="hide-menu-text-desktop"><?= $dictionairy[$language.'_trips']?></p>
        </a>
    </div>
</nav>