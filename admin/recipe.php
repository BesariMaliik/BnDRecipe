<?php

include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:admin_login.php');
};

if(isset($_POST['add_recipe'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $description = $_POST['description'];
   $description = filter_var($description, FILTER_SANITIZE_STRING);
   $type = $_POST['type'];
   $type = filter_var($type, FILTER_SANITIZE_STRING);

   $image = $_FILES['image']['name'];
   $image = filter_var($image, FILTER_SANITIZE_STRING);
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = '../uploaded_img/'.$image;

   $select_recipe = $conn->prepare("SELECT * FROM `recipe` WHERE name = ?");
   $select_recipe->execute([$name]);

   if($select_recipe->rowCount() > 0){
      $message[] = 'Recipe name already exists';
   }else{
      if($image_size > 2000000){
         $message[] = 'image size is too large';
      }else{
         move_uploaded_file($image_tmp_name, $image_folder);

         $insert_recipe = $conn->prepare("INSERT INTO `recipe`(name, type, description, image) VALUES(?,?,?,?)");
         $insert_recipe->execute([$name, $type, $description, $image]);

         $message[] = 'New Recipe added';
      }

   }

}

if(isset($_GET['delete'])){

   $delete_id = $_GET['delete'];
   $delete_recipe_image = $conn->prepare("SELECT * FROM `recipe` WHERE id = ?");
   $delete_recipe_image->execute([$delete_id]);
   $fetch_delete_image = $delete_recipe_image->fetch(PDO::FETCH_ASSOC);
   unlink('../uploaded_img/'.$fetch_delete_image['image']);
   $delete_recipe = $conn->prepare("DELETE FROM `recipe` WHERE id = ?");
   $delete_recipe->execute([$delete_id]);
   $delete_cart = $conn->prepare("DELETE FROM `cart` WHERE pid = ?");
   $delete_cart->execute([$delete_id]);
   header('location:recipe.php');

}

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
   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>

<?php include '../components/admin_header.php' ?>

<!-- add products section starts  -->

<section class="add-products">

   <form action="" method="POST" enctype="multipart/form-data">
      <h3>Add Recipe</h3>
      <input type="text" required placeholder="enter recipe name" name="name" maxlength="100" class="box">
      <textarea type="text" required placeholder="enter description name" name="description" maxlength="10000" class="box"></textarea>
      <select name="type" class="box" required>
         <option value="" disabled selected>select type --</option>
         <option value="breakfast">Breakfast</option>
         <option value="lunch">Lunch</option>
         <option value="dinner">Dinner</option>
         <option value="snack">Snack</option>
      </select>
      <input type="file" name="image" class="box" accept="image/jpg, image/jpeg, image/png, image/webp" required>
      <input type="submit" value="add recipe" name="add_recipe" class="btn">
   </form>

</section>

<!-- add products section ends -->

<!-- show products section starts  -->

<section class="show-products" style="padding-top: 0;">

   <div class="box-container">

   <?php
      $show_recipe = $conn->prepare("SELECT * FROM `recipe`");
      $show_recipe->execute();
      if($show_recipe->rowCount() > 0){
         while($fetch_recipe = $show_recipe->fetch(PDO::FETCH_ASSOC)){  
   ?>
   <div class="box">
      <img src="../uploaded_img/<?= $fetch_recipe['image']; ?>" alt="">
      <div class="flex">
        
         <div class="type"><?= $fetch_recipe['type']; ?></div>
      </div>
      <div class="name"><?= $fetch_recipe['name']; ?></div>
      <div class="flex-btn">
         <a href="update_recipe.php?update=<?= $fetch_recipe['id']; ?>" class="option-btn">Update</a>
         <a href="recipe.php?delete=<?= $fetch_recipe['id']; ?>" class="delete-btn" onclick="return confirm('delete this recipe?');">Delete</a>
      </div>
   </div>
   <?php
         }
      }else{
         echo '<p class="empty">No Recipe Added</p>';
      }
   ?>

   </div>

</section>

<br>
<br>
<!-- show products section ends -->

<!-- custom js file link  -->
<script src="../js/admin_script.js"></script>

</body>
</html>