<?php
    session_start();

    $_page = "admin";
    require_once __DIR__.'/languages.php'; 
    require_once __DIR__.'/comp-header.php';

    if( ! isset( $_SESSION['user_name']) ){
        header("Location: /flights/$language");
        exit();
      }
?>

<div id="content-menu-flex">
    <?php require_once __DIR__.'/comp-navigation.php'?>
    <div id="content">
    <main id="admin">
        <div class="header-match-margin"></div>
        <div class="title-container">
            <h1 class="title"><?= $dictionairy[$language.'_hello'].' '.$_SESSION['user_name']; ?></h1>
        </div>
        <section id="imageUpload">
            <p class="header"><?= $dictionairy[$language.'_select_image'] ?></p>
            <form id="image-upload-form" onsubmit="uploadImage(); return false">
                <input type="file" name="item_image" id="fileToUpload">
                <input class="btn pink-bg" type="submit" value="<?= $dictionairy[$language.'_upload_image'] ?>" name="submit">
            </form>
            <p  id="image-upload-message"></p>
        </section>
        <section id="flightManagement">
            <div onclick="loadInFlights()" id="flightManagementTitle"><h3  class="header" ><?= $dictionairy[$language.'_manage_flights'] ?></h2><p class="header" > > </p></div>
            <div class="hide" id="flights-container">
            </div>
        </section>
    </main>

    <?php require_once __DIR__.'/comp-footer.php'?>
    </div>
</div>

