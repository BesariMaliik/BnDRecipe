<?php

include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:admin_login.php');
};

if(isset($_POST['add_product'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $price = $_POST['price'];
   $price = filter_var($price, FILTER_SANITIZE_STRING);
   $des = $_POST['des'];
   $des = filter_var($des, FILTER_SANITIZE_STRING);

   $image = $_FILES['image']['name'];
   $image = filter_var($image, FILTER_SANITIZE_STRING);
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = '../uploaded_img/'.$image;

   $select_book = $conn->prepare("SELECT * FROM `book` WHERE name = ?");
   $select_book->execute([$name]);

   if($select_book->rowCount() > 0){
      $message[] = 'Book Name Already Exists';
   }else{
      if($image_size > 2000000){
         $message[] = 'image size is too large';
      }else{
         move_uploaded_file($image_tmp_name, $image_folder);

         $insert_book = $conn->prepare("INSERT INTO `book`(name, des, price, image) VALUES(?,?,?,?)");
         $insert_book->execute([$name, $des, $price, $image]);

         $message[] = 'New Book Added';
      }

   }

}

if(isset($_GET['delete'])){

   $delete_id = $_GET['delete'];
   $delete_book_image = $conn->prepare("SELECT * FROM `book` WHERE id = ?");
   $delete_book_image->execute([$delete_id]);
   $fetch_book_image = $delete_book_image->fetch(PDO::FETCH_ASSOC);
   unlink('../uploaded_img/'.$fetch_delete_image['image']);
   $delete_book = $conn->prepare("DELETE FROM `book` WHERE id = ?");
   $delete_book->execute([$delete_id]);
   $delete_cart = $conn->prepare("DELETE FROM `cart` WHERE pid = ?");
   $delete_cart->execute([$delete_id]);
   header('location:book_admin.php');

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Books</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>

<?php include '../components/admin_header.php' ?>

<!-- add products section starts  -->

<section class="add-products">

   <form action="" method="POST" enctype="multipart/form-data">
      <h3>Add Books</h3>
      <input type="text" required placeholder="Enter Book Name" name="name" maxlength="100" class="box">
      <input type="number" min="0" max="9999999999" required placeholder="Enter Price Book" name="price" onkeypress="if(this.value.length == 10) return false;" class="box"></textarea>
      <textarea type="text" required placeholder="enter description Book" name="des" maxlength="100" class="box"></textarea>
      <input type="file" name="image" class="box" accept="image/jpg, image/jpeg, image/png, image/webp" required>
      <input type="submit" value="Add Book" name="add_product" class="btn">
   </form>

</section>


<!-- add products section ends -->

<!-- show products section starts  -->

<section class="show-products" style="padding-top: 0;">

   <div class="box-container">

   <?php
      $show_book = $conn->prepare("SELECT * FROM `book`");
      $show_book->execute();
      if($show_book->rowCount() > 0){
         while($fetch_book = $show_book->fetch(PDO::FETCH_ASSOC)){  
   ?>
   <div class="box">
      <img src="../uploaded_img/<?= $fetch_book['image']; ?>" alt="">
      <div class="flex">
         <div class="price"><span>IDR</span><?= $fetch_book['price']; ?><span>/-</span></div>
      </div>
      <div class="name"><?= $fetch_book['name']; ?></div>
      <div class="flex-btn">
         <a href="update_book.php?update=<?= $fetch_book['id']; ?>" class="option-btn">update</a>
         <a href="book_admin.php?delete=<?= $fetch_book['id']; ?>" class="delete-btn" onclick="return confirm('delete this book?');">delete</a>
      </div>
   </div>
   <?php
         }
      }else{
         echo '<p class="empty">no books added</p>';
      }
   ?>

   </div>

</section>

<!-- show products section ends -->

<br>
<br>


<!-- custom js file link  -->
<script src="../js/admin_script.js"></script>

</body>
</html>