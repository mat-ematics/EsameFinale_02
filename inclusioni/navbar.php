<?php
require_once("strumenti.php");
use assets\strumenti;
$header = strumenti::leggiJSON("json/data.json", true)["header"];
?>

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
                        <div class="navItems" <?php if ($item == $data['page_title']) { ?> id="<?php echo strtolower($data['page_title']) ?>" <?php } ?>>
                            <a href="<?php echo $link ?>" title="<?php echo $item ?>"><?php echo $item ?></a>
                        </div>
                    <?php } ?>
                </div>
            </li>
        </ul>
    </nav>
</header>