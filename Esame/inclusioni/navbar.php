<?php
require_once("strumenti.php");
use assets\strumenti;
$header = strumenti::leggiJSON("json/data.json", true)["header"];
?>
<style>
    div#<?php echo strtolower($data['page_title']) ?> {
    color: white;
    border-bottom: 2px solid rgb(0, 162, 255);
}
</style>
<header>
<!-- Barra di navigazione -->
    <nav>
        <ul id="navBar">
            <li>
                <!-- Logo -->
                <div id="navLogo">
                    <a href="<?php echo $header["logo"]['link']  ?>"><?php echo $header['logo']['image'] ?></a>
                </div>
            </li>
            <li id="navSections">
                <div id="navMenu">
                    <?php foreach ($header['navbar'] as $item => $link) { ?>
                        <div class="navItems" id="<?php echo $item == $data['page_title'] ? strtolower($data['page_title']) : "" ?>">
                            <a href="<?php echo $link ?>"><?php echo $item ?></a>
                        </div>
                    <?php } ?>
                </div>
            </li>
        </ul>
    </nav>
</header>