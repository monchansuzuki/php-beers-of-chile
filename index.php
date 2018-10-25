<?php
require_once('defines.php');
define('PAGE_TITLE', 'Accueil');
require_once(ROOT_DIR . 'views/page_top.php');
?>

<main class="roundedbox">
    <p>Bienvenue sur le site de la librairie<br><span class="nom_librairie"><?= SITE_NAME ?></span></p>
</main>
<?php
require_once(ROOT_DIR . 'views/page_bottom.php');
