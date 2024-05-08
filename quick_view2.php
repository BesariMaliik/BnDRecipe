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
   <title>View Books</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'components/user_header.php'; ?>

<section class="quick-view2">

   <h1 class="title">View Books</h1>

   <?php
      $pid = $_GET['pid'];
      $select_book = $conn->prepare("SELECT * FROM `book` WHERE id = ?");
      $select_book->execute([$pid]);
      if($select_book->rowCount() > 0){
         while($fetch_book = $select_book->fetch(PDO::FETCH_ASSOC)){
   ?>
  <form action="" method="post" class="box">
      <input type="hidden" name="pid" value="<?= $fetch_book['id']; ?>">
      <input type="hidden" name="name" value="<?= $fetch_book['name']; ?>">
      <input type="hidden" name="des" value="<?= $fetch_book['des']; ?>">
      <input type="hidden" name="price" value="<?= $fetch_book['price']; ?>">
      <input type="hidden" name="image" value="<?= $fetch_book['image']; ?>">
      <img src="uploaded_img/<?= $fetch_book['image']; ?>" alt="">
      <div class="name"><?= $fetch_book['name']; ?></div>
      <div class="des"><?= $fetch_book['des']; ?></div>
      <div class="flex">
         <div class="price"><span>RM </span><?= $fetch_book['price']; ?></div>
         <input type="number" name="qty" class="qty" min="1" max="99" value="1" maxlength="2">
      </div>
      <button type="submit" name="add_to_cart" class="cart-btn">Add to Cart</button>
   </form>
   <?php
         }
      }else{
         echo '<p class="empty">No Books Added</p>';
      }
   ?>

</section>




<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>


</body>
</html>