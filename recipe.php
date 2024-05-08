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
   <title>Recipe</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<!-- header section starts  -->
<?php include 'components/user_header.php'; ?>
<!-- header section ends -->

<div class="heading">
   <h3>Recipe</h3>
</div>

<!-- menu section starts  -->

<section class="category">

   <div class="box-container">

      <a href="type.php?type=breakfast" class="box">
         <!-- <img src="images/cat-1.png" alt=""> -->
         <h3>Breakfast</h3>
      </a>

      <a href="type.php?type=lunch" class="box">
         <!-- <img src="images/cat-2.png" alt=""> -->
         <h3>Lunch</h3>
      </a>

      <a href="type.php?type=dinner" class="box">
         <!-- <img src="images/cat-3.png" alt=""> -->
         <h3>Dinner</h3>
      </a>

      <a href="type.php?type=snack" class="box">
         <!-- <img src="images/cat-3.png" alt=""> -->
         <h3>Snack</h3>
      </a>

   </div>

</section>

<section class="products">

   <div class="box-container">

      <?php
         $select_recipe = $conn->prepare("SELECT * FROM `recipe`");
         $select_recipe->execute();
         if($select_recipe->rowCount() > 0){
            while($fetch_recipe = $select_recipe->fetch(PDO::FETCH_ASSOC)){
      ?>
      <form action="" method="post" class="box">
         <input type="hidden" name="pid" value="<?= $fetch_recipe['id']; ?>">
         <input type="hidden" name="name" value="<?= $fetch_recipe['name']; ?>">
         <!-- <input type="hidden" name="description" value="<?= $fetch_recipe['description']; ?>"> -->
         <input type="hidden" name="image" value="<?= $fetch_recipe['image']; ?>">
         <a href="quick_view.php?pid=<?= $fetch_recipe['id']; ?>" class="fas fa-eye"></a>
         <img src="uploaded_img/<?= $fetch_recipe['image']; ?>" alt="">
         <a href="type.php?type=<?= $fetch_recipe['type']; ?>" class="cat"><?= $fetch_recipe['type']; ?></a>
         <div class="name"><?= $fetch_recipe['name']; ?></div>
         <!-- <div class="des"><?= $fetch_recipe['description']; ?></div> -->

      </form>
      <?php
            }
         }else{
            echo '<p class="empty">No Recipe added</p>';
         }
      ?>

   </div>

</section>


<!-- menu section ends -->
<br>
<br>

<!-- footer section starts  -->


<!-- footer section ends -->

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>