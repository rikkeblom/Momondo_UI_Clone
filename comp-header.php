<?php
    require_once __DIR__.'/languages.php';
    require_once __DIR__.'/svg-library.php';
    require_once __DIR__.'/_x.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="API, MySQL, PHP, Javascript, HTML, CSS">
    <meta name="author" content="Rikke Blom">
    <meta name="description" content="This is a copy of momondo made for educational purposes during the course Web Development at Copenhagen School of Design and Technology by Rikke Blom in 2022.">
    <link rel="stylesheet" href="/momondo-clone/mobile">
    <link rel="stylesheet" href="/momondo-clone/tablet">
    <link rel="stylesheet" href="/momondo-clone/desktop">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <title>Momondo: <?= $dictionairy[$language.'_'.$_page]?></title>
</head>
<body oncontextmenu="toggleMenu(); return false">
    <header>
        <div id="logo-burger-flex">
            <?= $burgerSVG ?>
            <a id="main-logo" href="/momondo-clone/flights/<?= $language ?>"><div></div></a>
        </div>
        <div id="header-icons">
            <?php if($_SESSION){
                $link = '<a class="fat-with-orange-hover" href="/momondo-clone/admin/'.$language.'">Admin</a>';
                echo $link;
            }
            ?>
            <a class="fat-with-orange-hover" href="/momondo-clone/trips/<?= $language ?>">Trips</a>
            <div id="signin-button"  <?= $_SESSION ? 'onclick="logout()"' : 'onclick="openSigninModal()"' ?>>
                <?= $profileSVG ?>
                <span class="hide-on-mobile"><?= $_SESSION ? $dictionairy[$language.'_signout'] : $dictionairy[$language.'_signin'] ?></span>
            </div>
            <span onclick="toggleLanguage()" class="language hide-on-mobile"><span class="countryflag <?= $language == 'dk' ? 'dk-flag' : 'us-flag' ?>">&nbsp;</span> <?= $language == 'dk' ? 'Kr' : 'USD' ?></span>
        </div>
    </header>
