<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

include 'components/add_cart.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Type</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'components/user_header.php'; ?>

<section class="products">

   <h1 class="title">Recipe</h1>

   <div class="box-container">

   <?php
         $type = $_GET['type'];
         $select_recipe = $conn->prepare("SELECT * FROM `recipe` WHERE type = ?");
         $select_recipe->execute([$type]);
         if($select_recipe->rowCount() > 0){
            while($fetch_recipe = $select_recipe->fetch(PDO::FETCH_ASSOC)){
      ?>
      <form action="" method="post" class="box">
         <input type="hidden" name="pid" value="<?= $fetch_recipe['id']; ?>">
         <input type="hidden" name="name" value="<?= $fetch_recipe['name']; ?>">
         <input type="hidden" name="description" class="des" maxlength="10000" value="<?= $fetch_recipe['description']; ?>">
         <input type="hidden" name="image" value="<?= $fetch_recipe['image']; ?>">
         <a href="quick_view.php?pid=<?= $fetch_recipe['id']; ?>" class="fas fa-eye"></a>
         <img src="uploaded_img/<?= $fetch_recipe['image']; ?>" alt="">
         <div class="name"><?= $fetch_recipe['name']; ?></div>
      </form>
      <?php
            }
         }else{
            echo '<p class="empty">no products added yet!</p>';
         }
      ?>

   </div>

</section>




















<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>


</body>
</html>