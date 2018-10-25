<?php
// header
include'view/page_top.php';
define('NOM', 'nom');
define('PRENOM', 'prenom');
define('MAIL', 'mail');
define('DESCRIPTION', 'description');
define('GROUPE', 'group1');
define('WHERE', 'where');

$nom_val = null;
$nom_est_valide = false;
$nom_err_msg = "le nom doit contenir au moin 2 lettre ";

$prenom_val = null;
$prenom_est_valide = false;
$prenom_err_msg = "le prenom doit contenir au moin 2 lettre ";

$mail_val = null;
$mail_est_valide = false;
$mail_err_msg = "your mail is invalid ";

$description_val = null;
$description_est_valide = false;
$description_err_msg = "your must write something ";

$groupe_val = null;
$groupe_est_valide = false;
$groupe_err_msg = "you have to choose ";

$where_val = null;
$where_est_valide = false;
$where_err_msg = "you have to selected ";


// validation


var_dump($_POST);
$reception = array_key_exists(NOM, $_POST) && array_key_exists(PRENOM, $_POST) &&
array_key_exists(MAIL, $_POST) && array_key_exists(DESCRIPTION, $_POST);

if ($reception) {
  $nom_val = filter_input(INPUT_POST,NOM,FILTER_SANITIZE_STRING);
  $nom_val = trim($nom_val);
  $nom_est_valide = (strlen($nom_val)>=2);
if ( !NOM == $nom_est_valide) {
  echo $nom_err_msg;
}
$prenom_val = filter_input(INPUT_POST,PRENOM,FILTER_SANITIZE_STRING);
$prenom_val = trim($prenom_val);
$prenom_est_valide = (strlen($nom_val)>=2);
if ( !PRENOM == $nom_est_valide) {
echo $prenom_err_msg;
}
$mail_val = filter_input(INPUT_POST,MAIL,FILTER_VALIDATE_EMAIL);
$mail_est_valide = (!False == $mail_val);

if (!MAIL==$mail_est_valide) {
echo $mail_err_msg;
};
$description_val = filter_input(INPUT_POST,DESCRIPTION,FILTER_SANITIZE_STRING);
$description_val = trim($description_val);
$description_est_valide = (strlen($description_val)>=10);
if (!DESCRIPTION == $description_est_valide) {
  echo $description_err_msg;
}
$groupe_est_valide = array_key_exists(GROUPE, $_POST);
if ($groupe_est_valide) {
  $groupe_val = $_POST[GROUPE];
}
else {
  echo $groupe_err_msg;
}
$where_est_valide =array_key_exists(WHERE, $_POST);
if ($where_est_valide) {
  $where_val = $_POST[WHERE];
}
else {
  echo $where_err_msg;
}
}
 ?>

  <body>
    <!-- header -->
<?php include"view/header.php" ?>
<!-- formulaire -->
<div class="row" >
  <form class="col s12" action="" method="post">
    <div class="row">
      <div class="input-field col s6">
        <input id="first_name" type="text" class="validate" name="prenom">
          <label for="first_name">First Name</label>
          <?php if ($reception && !$nom_est_valide) {?>
            <span class="error_case"><?= $nom_err_msg ?></span>
                      <?php                } ?>
          </div>

      <div class="input-field col s6">
          <input id="last_name" type="text" class="validate" name="nom">
          <label for="last_name">Last Name</label>
          <?php if ($reception && !$prenom_est_valide) {?>
            <span class="error_case"><?= $prenom_err_msg ?></span>
                      <?php                } ?>
        </div>
        </div>

        <div class="row">
       <div class="input-field col s12">
         <input id="email" type="email" class="validate" name="mail">
         <label for="email">Email</label>
         <?php if ($reception && !$mail_est_valide) {?>
           <span class="error_case"><?= $mail_err_msg ?></span>
                     <?php                } ?>
       </div>
     </div>

     <div class="row">

         <div class="input-field col s12">
  <select name="where">
    <option value="" disabled selected>Choose your option</option>
    <option value="1">Internet</option>
    <option value="2">Magazine</option>
    <option value="3">Salon</option>
    <option value="4">Friend</option>
    <option value="5">Other</option>
  </select>
  <label>where did you found us ?</label>
  <?php if ($reception && !$where_est_valide) {?>
    <span class="error_case"><?= $where_err_msg ?></span>
              <?php                } ?>
</div>
     </div>

     <div class="row">
        <div class="input-field col s12">
          <textarea id="textarea1" class="materialize-textarea" name="description"></textarea>
          <label for="textarea1">Tell us what do you want</label>
          <?php if ($reception && !$description_est_valide) {?>
            <span class="error_case"><?= $description_err_msg ?></span>
                      <?php                } ?>
        </div>
      </div>

</div>

    <div class="row">
      <div class="center-align">
        <p class="center-align">Do you want to know what are we doing and have some news from us ?</p>
        <input class="with-gap" name="group1" type="radio" id="yes" value="yes" />
      <label for="yes">yes</label>
      <input class="with-gap" name="group1" type="radio" id="no"  value="no"/>
      <label for="no">no</label>
      <?php if ($reception && !$groupe_est_valide) {?>
        <span class="error_case"><br/><?= $groupe_err_msg ?></span>
                  <?php                } ?>
      </div>
    </div>
    <div class="row">
      <div class="center-align">
        <button class="btn waves-effect waves-light" type="submit" name="action">Submit
    <i class="material-icons right"></i>
  </button>

      </div>

    </div>

  </form>
</div>
<!-- footer -->
<?php include"view/footer.php" ?>
