<?php

include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:admin_login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Dashboard</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>

<?php include '../components/admin_header.php' ?>

<!-- admin dashboard section starts  -->
<br>
<section class="dashboard">

   <div class="box-container">

   <div class="box">
      <h3>Admin</h3>
      <p><?= $fetch_profile['name']; ?></p>
      <a href="update_profile.php" class="btn">Update Profile</a>
   </div>

   <div class="box">
      <?php
         $select_recipe = $conn->prepare("SELECT * FROM `recipe`");
         $select_recipe->execute();
         $numbers_of_recipe = $select_recipe->rowCount();
      ?>
      <h3><?= $numbers_of_recipe; ?></h3>
      <p>Recipe Added</p>
      <a href="recipe.php" class="btn">See Recipe</a>
   </div>

   <div class="box">
      <?php
         $total_pendings = 0;
         $select_pendings = $conn->prepare("SELECT * FROM `orders` WHERE payment_status = ?");
         $select_pendings->execute(['pending']);
         while($fetch_pendings = $select_pendings->fetch(PDO::FETCH_ASSOC)){
            $total_pendings += $fetch_pendings['total_price'];
         }
      ?>
      <h3><span>IDR</span><?= $total_pendings; ?><span>/-</span></h3>
      <p>Total Pendings</p>
      <a href="placed_orders.php" class="btn">See Orders</a>
   </div>

   <div class="box">
      <?php
         $total_completes = 0;
         $select_completes = $conn->prepare("SELECT * FROM `orders` WHERE payment_status = ?");
         $select_completes->execute(['completed']);
         while($fetch_completes = $select_completes->fetch(PDO::FETCH_ASSOC)){
            $total_completes += $fetch_completes['total_price'];
         }
      ?>
      <h3><span>IDR</span><?= $total_completes; ?><span>/-</span></h3>
      <p>Total Completes</p>
      <a href="placed_orders.php" class="btn">See Orders</a>
   </div>

   <div class="box">
      <?php
         $select_orders = $conn->prepare("SELECT * FROM `orders`");
         $select_orders->execute();
         $numbers_of_orders = $select_orders->rowCount();
      ?>
      <h3><?= $numbers_of_orders; ?></h3>
      <p>Total Orders</p>
      <a href="placed_orders.php" class="btn">See Orders</a>
   </div>

   <div class="box">
      <?php
         $select_book = $conn->prepare("SELECT * FROM `book`");
         $select_book->execute();
         $numbers_of_book = $select_book->rowCount();
      ?>
      <h3><?= $numbers_of_book; ?></h3>
      <p>Books Added</p>
      <a href="book_admin.php" class="btn">See Books</a>
   </div>

   <div class="box">
      <?php
         $select_users = $conn->prepare("SELECT * FROM `users`");
         $select_users->execute();
         $numbers_of_users = $select_users->rowCount();
      ?>
      <h3><?= $numbers_of_users; ?></h3>
      <p>Users Accounts</p>
      <a href="users_accounts.php" class="btn">See Users</a>
   </div>

   <div class="box">
      <?php
         $select_admins = $conn->prepare("SELECT * FROM `admin`");
         $select_admins->execute();
         $numbers_of_admins = $select_admins->rowCount();
      ?>
      <h3><?= $numbers_of_admins; ?></h3>
      <p>Admins</p>
      <a href="admin_accounts.php" class="btn">See Admins</a>
   </div>

   <div class="box">
      <?php
         $select_messages = $conn->prepare("SELECT * FROM `messages`");
         $select_messages->execute();
         $numbers_of_messages = $select_messages->rowCount();
      ?>
      <h3><?= $numbers_of_messages; ?></h3>
      <p>New Messages</p>
      <a href="messages.php" class="btn">See messages</a>
   </div>

   </div>

</section>

<br>
<br>
<br>


<!-- admin dashboard section ends -->
<!-- custom js file link  -->
<script src="../js/admin_script.js"></script>

</body>
</html>