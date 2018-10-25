<?php
require_once('defines.php');
define('PAGE_TITLE', 'Contact');

define('FN_NOM',        'fn_nom');
define('FN_COURRIEL',   'fn_courriel');
define('FN_MESSAGE',    'fn_message');
define('FN_RAISON',     'fn_raison');

define('ATTR_CHECKED',   ' checked="cheched"');

//var_dump($_POST);

require_once(ROOT_DIR . 'views/page_top.php');
?>
    <main class="roundedbox">
        <form name="contact_form" method="post">
            <div class="form-line">
                <label for="nom">Nom :</label><!--
        --><input type="text" name="<?= FN_NOM ?>" id="<?= FN_NOM ?>" value=""/>

            </div>

            <div class="form-line">
                <label for="courriel">Courriel :</label><!--
        --><input type="text" name="<?= FN_COURRIEL ?>" id="<?= FN_COURRIEL ?>" value=""/>
            </div>

            <div class="form-line">
                <label for="message">Message :</label><!--
        --><input type="text" name="<?= FN_MESSAGE ?>" id="<?= FN_MESSAGE ?>" value=""/>
            </div>

            <div class="form-line">
                <fieldset>
                    <legend>Raison de votre prise de contact :</legend>
                    <input type="radio" name="<?= FN_RAISON ?>" id="r_renc" value="r_renc"
                    /><label for="r_renc">Nous rencontrer</label>
                    <input type="radio" name="<?= FN_RAISON ?>" id="r_conn" value="r_conn"
                    /><label for="r_conn">Connaître notre action</label>
                    <input type="radio" name="<?= FN_RAISON ?>" id="r_trav" value="r_trav"
                    /><label for="r_trav">Travailler avec nous</label>
                    <input type="radio" name="<?= FN_RAISON ?>" id="r_sout" value="r_sout"
                    /><label for="r_sout">Nous Soutenir</label>
                </fieldset>
            </div>

            <div class="form-line">
                <input type="submit" value="Soumettre" name="soumettre">
            </div>
        </form>
    </main>
<?php
require_once(ROOT_DIR . 'views/page_bottom.php');
