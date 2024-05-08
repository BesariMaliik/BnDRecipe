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
   // $price = $_POST['price'];
   // $price = filter_var($price, FILTER_SANITIZE_STRING);
   $type = $_POST['type'];
   $type = filter_var($type, FILTER_SANITIZE_STRING);
   $description = $_POST['description'];
   $description = filter_var($description, FILTER_SANITIZE_STRING);

   $update_recipe = $conn->prepare("UPDATE `recipe` SET name = ?, type = ?, description = ? WHERE id = ?");
   $update_recipe->execute([$name, $type, $description, $pid]);

   $message[] = 'Recipe Updated!';

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
         $update_image = $conn->prepare("UPDATE `recipe` SET image = ? WHERE id = ?");
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
   <title>BnS Update Recipe</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>

<?php include '../components/admin_header.php' ?>

<!-- update product section starts  -->

<section class="update-product">

   <h1 class="heading">Update Recipe</h1>

   <?php
      $update_id = $_GET['update'];
      $show_recipe = $conn->prepare("SELECT * FROM `recipe` WHERE id = ?");
      $show_recipe->execute([$update_id]);
      if($show_recipe->rowCount() > 0){
         while($fetch_recipe = $show_recipe->fetch(PDO::FETCH_ASSOC)){  
   ?>
   <form action="" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="pid" value="<?= $fetch_recipe['id']; ?>">
      <input type="hidden" name="old_image" value="<?= $fetch_recipe['image']; ?>">
      <img src="../uploaded_img/<?= $fetch_recipe['image']; ?>" alt="">
      <span>Update Name</span>
      <input type="text" required placeholder="enter recipe name" name="name" maxlength="100" class="box" value="<?= $fetch_recipe['name']; ?>">
      <!-- <span>update price</span>
      <input type="number" min="0" max="9999999999" required placeholder="enter product price" name="price" onkeypress="if(this.value.length == 10) return false;" class="box" value="<?= $fetch_products['price']; ?>"> -->
      <span>Update Type</span>
      <select name="type" class="box" required>
         <option selected value="<?= $fetch_recipe['type']; ?>"><?= $fetch_recipe['type']; ?></option>
         <option value="breakfast">Breakfast</option>
         <option value="lunch">Lunch</option>
         <option value="dinner">Dinner</option>
         <option value="snack">Snack</option>
      </select>
      <span>Update Description</span>
      <textarea type="text" required placeholder="enter Description" name="description" maxlength="10000" class="box" value="<?= $fetch_recipe['description']; ?>"></textarea>
      <span>Update Image</span>
      <input type="file" name="image" class="box" accept="image/jpg, image/jpeg, image/png, image/webp">
      <div class="flex-btn">
         <input type="submit" value="update" class="btn" name="update">
         
         <a href="recipe.php" class="option-btn">Go Back</a>
      </div>
   </form>
   <?php
         }
      }else{
         echo '<p class="empty">No Recipe Added</p>';
      }
   ?>

</section>

<!-- update product section ends -->

<br>
<br>


<!-- custom js file link  -->
<script src="../js/admin_script.js"></script>

<script>
        document.getElementById('description').addEventListener('input', function () {
            var lines = this.value.split('\n');
            for (var i = 0; i < lines.length; i++) {
                lines[i] = (i + 1) + '. ' + lines[i];
            }
            this.value = lines.join('\n');
        });
    </script>

</body>
</html>