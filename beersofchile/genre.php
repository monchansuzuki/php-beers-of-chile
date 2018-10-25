<?php
require_once 'db/_data_categories.php';
require_once 'db/_data_products.php';

// header
require_once "genre.php";
$cat_id = '';
// var_dump($_GET);
if(array_key_exists('prod_id',$_GET) && array_key_exists($_GET['prod_id'],$categories)){
//
    $cat_id =$_GET['prod_id'];
}else {

    exit('VALEUR DES CAT_ID REJETE -> EXIT');
}
require_once 'view/page_top.php';
 ?>

  <body>
    <!-- header -->
<?php include"view/header.php" ?>
<!-- catalogue -->
<div class="row">

<ul>
<?php
  foreach ($products as $key => $value) {
    # code...

    if ($value[PROD_CAT]== $cat_id) {?>

        <li class="col s3"><a href="detail.php?prod_id=<?=$key?>">
          <h3 class="orange-text text-darken-2"> <?=$value[PROD_NAME]?></h2>
          <img src="images/<?= $value[PROD_IMG] ?>" alt="Biere mon amie">
          <p class="flow-text green-text text-lighten-2"><?=$value[PROD_DESC]?></p>
        </a></li>
        <?php }} ?>
      </ul>
      </div>
<!-- footer -->
<?php include"view/footer.php" ?>
