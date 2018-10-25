<?php
require_once 'db/_data_categories.php';
require_once 'db/_data_products.php';

// header
require_once "detail.php";
$prod_id = '';

if(array_key_exists("prod_id",$_GET) && array_key_exists($_GET["prod_id"],$products) ) {

    $prod_id = $_GET["prod_id"];

}else {
    header('Location:index.php');
    exit('VALEUR DES CAT_ID REJETE -> EXIT');

}
var_dump($prod_id);
$prod = $products[$prod_id];
require_once 'view/page_top.php';

 ?>

  <body>
    <!-- header -->
<?php include"view/header.php" ?>
<!-- catalogue -->
<div class="row">
  <h1 class="orange-text text-darken-2"> <?=$prod[PROD_NAME];?> </h1>
  <img src="images/<?=$prod[PROD_IMG]?>" alt="<?=$prod[PROD_IMG]?>" class="col s6">
  <div class="col s6">
    <h2><?=$prod[BOOK_PRIX]?> /6 bottles</h2>
    <p><?=$prod[PROD_DESC]?></p>
    <p class="red-text text-darken-4"><?=$prod[ID]?></p>

  </div>

</div>
<!-- footer -->
<?php include"view/footer.php" ?>
