<?php
require_once("inclusioni/strumenti.php");
use assets\strumenti;
$data = strumenti::leggiJSON("json/data.json", true)["single_work"];
/* strumenti::stampaArray($data);
exit; */
?>
<!DOCTYPE html>
<html lang="en">
    <!-- Head incluso da inclusioni/head.php -->
    <?php require_once("inclusioni/head.php") ?>
    <body>
         <!-- Barra di Navigazione -->
         <?php require_once("inclusioni/navbar.php") ?>
    </body>
    <main>
        <!-- Immagine Progetto Principale -->
        <div class="preview">
                <!-- Overlay dell'immagine - bottone -->
                <div class="overlay">
                    <button id="visitProject">Visit <?php echo $data["project_title"] ?></button>
                </div>
                <!-- Immagine progetto placeholder -->
                <img src="<?php echo $data["image"]['link'] ?>" alt="<?php echo $data["image"]['alt_text'] ?>">
            </div>
            <!-- Info Progetto -->
            <div class="projectInfo">
                <!-- Titolo -->
                <h1><?php echo $data['project_title'] ?></h1>
                <!-- Descrizione -->
                <p><?php echo $data["project_description"] ?></p>
                <!-- Linguaggi usati -->
                <p>Languages: <?php echo $data["langs"] ?></p>
                <!-- Data del Progetto -->
                <h1>Project Date: <?php echo $data["project_date"] ?></h1>
            </div>
        <!-- Footer -->
        <?php require_once("inclusioni/footer.php") ?>
    </main>
</html>