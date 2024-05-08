<?php

include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:admin_login.php');
};

if(isset($_POST['update'])){

   $pid = $_POST['pid'];
   $pid = filter_var($pid, FILTER_SANITIZE_STRING);
   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $price = $_POST['price'];
   $price = filter_var($price, FILTER_SANITIZE_STRING);

   $update_book = $conn->prepare("UPDATE `book` SET name = ?, price = ? WHERE id = ?");
   $update_book->execute([$name, $price, $pid]);

   $message[] = 'Books Updated';

   $old_image = $_POST['old_image'];
   $image = $_FILES['image']['name'];
   $image = filter_var($image, FILTER_SANITIZE_STRING);
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = '../uploaded_img/'.$image;

   if(!empty($image)){
      if($image_size > 2000000){
         $message[] = 'images size is too large!';
      }else{
         $update_image = $conn->prepare("UPDATE `book` SET image = ? WHERE id = ?");
         $update_image->execute([$image, $pid]);
         move_uploaded_file($image_tmp_name, $image_folder);
         unlink('../uploaded_img/'.$old_image);
         $message[] = 'image updated!';
      }
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Update Books Recipe</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>

<?php include '../components/admin_header.php' ?>

<!-- update product section starts  -->

<section class="update-product">

   <h1 class="heading">Update Book Recipe</h1>

   <?php
      $update_id = $_GET['update'];
      $show_book = $conn->prepare("SELECT * FROM `book` WHERE id = ?");
      $show_book->execute([$update_id]);
      if($show_book->rowCount() > 0){
         while($fetch_book = $show_book->fetch(PDO::FETCH_ASSOC)){  
   ?>
   <form action="" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="pid" value="<?= $fetch_book['id']; ?>">
      <input type="hidden" name="old_image" value="<?= $fetch_book['image']; ?>">
      <img src="../uploaded_img/<?= $fetch_book['image']; ?>" alt="">
      <span>Update Name</span>
      <input type="text" required placeholder="enter product name" name="name" maxlength="100" class="box" value="<?= $fetch_book['name']; ?>">
      <span>Update Price</span>
      <input type="number" min="0" max="9999999999" required placeholder="Enter Book Price" name="price" onkeypress="if(this.value.length == 10) return false;" class="box" value="<?= $fetch_book['price']; ?>">
      <span>Update Image</span>
      <input type="file" name="image" class="box" accept="image/jpg, image/jpeg, image/png, image/webp">
      <div class="flex-btn">
         <input type="submit" value="update" class="btn" name="update">
         <a href="book_admin.php" class="option-btn">Back</a>
      </div>
   </form>
   <?php
         }
      }else{
         echo '<p class="empty">No Book Added</p>';
      }
   ?>

</section>

<!-- update product section ends -->

<br>
<br>


<!-- custom js file link  -->
<script src="../js/admin_script.js"></script>

</body>
</html>