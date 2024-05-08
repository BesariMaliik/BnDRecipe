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
   <title>BnD Books Recipe</title>

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
   <h3>Recipe Books</h3>
</div>

<section class="products">

   <div class="box-container">

   <?php
         $select_book = $conn->prepare("SELECT * FROM `book`");
         $select_book->execute();
         if($select_book->rowCount() > 0){
            while($fetch_book = $select_book->fetch(PDO::FETCH_ASSOC)){
      ?>
      <form action="" method="post" class="box">
         <input type="hidden" name="pid" value="<?= $fetch_book['id']; ?>">
         <input type="hidden" name="name" value="<?= $fetch_book['name']; ?>">
         <input type="hidden" name="price" value="<?= $fetch_book['price']; ?>">
         <input type="hidden" name="image" value="<?= $fetch_book['image']; ?>">
         <a href="quick_view2.php?pid=<?= $fetch_book['id']; ?>" class="fas fa-eye"></a>
         <button type="submit" class="fas fa-shopping-cart" name="add_to_cart"></button>
         <img src="uploaded_img/<?= $fetch_book['image']; ?>" alt="">
         <div class="name"><?= $fetch_book['name']; ?></div>
         <div class="flex">
            <div class="price"><span>RM </span><?= $fetch_book['price']; ?></div>
            <input type="number" name="qty" class="qty" min="1" max="99" value="1" maxlength="2">
         </div>
      </form>
      <?php
            }
         }else{
            echo '<p class="empty">No Books Added</p>';
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