<?php
require_once "db/_data_categories.php";
require_once 'db/_data_products.php';
// header
require_once 'view/page_top.php';
 ?>

  <body>
    <!-- header -->
<?php include"view/header.php" ?>
<!-- catalogue -->
<div class="categorie row">
  <
  <h1 class="orange-text text-darken-2">Our different kind of beer</h1>
<ul>
  <?php
  foreach ($categories as $key => $value) {?>
  <li class="col s4">
    <a class="product_link"href="genre.php?prod_id=<?=$key?>">

      <img src="images/<?=$value[CAT_IMG]?>">
      <h2 class="orange-text text-darken-2"><?= $value[CAT_NAME] ?></h2>
      <p><?=$value[CAT_DESC]?></p>
    </a>
  </li>
  <?php  }?>
  </ul>

</div>
<!-- footer -->
<?php include"view/footer.php" ?>
