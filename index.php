<?php
// Importo strumenti e dati dal JSON
require_once("inclusioni/strumenti.php");
use assets\strumenti;
$data = strumenti::leggiJSON("json/data.json", true)["index"];
/* strumenti::stampaArray($data);
exit; */
?>

<!DOCTYPE html>
<html lang="en">
    <!-- Head incluso da inclusioni/head.php -->
    <?php require_once("inclusioni/head.php") ?> 
    <body>
        <!-- Barra di navigazione inclusa da navbar.php -->
        <?php require_once('inclusioni/navbar.php') ?>
        <main>
            <!-- Introduzione di me stesso -->
            <div id="columnWrapper">
                <div id="title" class="mainColumns">
                    <h1>
                        <?php foreach ($data['main']['title'] as $line) { ?>
                        <span><?php echo $line ?></span>
                        <?php } ?>
                    </h1>
                    <?php foreach ($data['main']['subtitle'] as $line) { ?>
                        <p><?php echo $line ?></p>
                    <?php } ?>
                </div>
                <div id="image" class="mainColumns">
                    <!-- Logo -->
                    <h1 id="<?php echo $data['main']['logo']['id'] ?>"><?php echo $data['main']['logo']['image'] ?></h1>
                </div>
            </div>
            <!-- Bottone per scorrere sotto -->
            <div id="button"> 
                <button type="button" id="down" onclick="location.href='<?php echo $data['main']['button_down']['location'] ?>'">
                        <span><?php echo $data['main']['button_down']['content']['text'] ?></span>
                        <i class="<?php echo $data['main']['button_down']['content']['icon']['style'] . " " . $data['main']['button_down']['content']['icon']['symbol'] ?>" id="arrowDown"></i>
                </button>
            </div>
        </main>
        <!-- Sezione Progetti Recenti -->
        <h1 class="title" id="workSection"><?php echo $data['work_section']['section_title'] ?></h1>
        <div id="worksWrapper">
            <div class="works">
                <?php foreach ($data['work_section']['cards'] as $card) { ?>
                    <!-- Singola Card progetto -->
                    <div class="cards">
                        <img src="<?php echo $card['card_image']['link'] ?>" alt="<?php echo $card['card_image']['alt_text'] ?>">
                        <!-- Overlay-on-hover -->
                        <div class="overlay">
                            <h2><?php echo $card['card_title'] ?></h2>
                            <p><?php echo $card['card_description'] ?></p>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <!-- Footer importato da footer.php -->
        <?php require_once("inclusioni/footer.php") ?>
    </body>
</html>    