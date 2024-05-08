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
   <title>View Recipe</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'components/user_header.php'; ?>

<section class="quick-view">

   <h1 class="title">View Recipe</h1>

   <?php
      $pid = $_GET['pid'];
      $select_recipe = $conn->prepare("SELECT * FROM `recipe` WHERE id = ?");
      $select_recipe->execute([$pid]);
      if($select_recipe->rowCount() > 0){
         while($fetch_recipe = $select_recipe->fetch(PDO::FETCH_ASSOC)){
   ?>
   <form action="" method="post" class="box">
      <input type="hidden" name="pid" value="<?= $fetch_recipe['id']; ?>">
      <input type="hidden" name="name" value="<?= $fetch_recipe['name']; ?>">
      <input type="hidden" name="description" value="<?= $fetch_recipe['description']; ?>">
      <input type="hidden" name="image" value="<?= $fetch_recipe['image']; ?>">
      <img src="uploaded_img/<?= $fetch_recipe['image']; ?>" alt="">
      <a href="type.php?type=<?= $fetch_recipe['type']; ?>" class="cat"><?= $fetch_recipe['type']; ?></a>
      <div class="name"><?= $fetch_recipe['name']; ?></div>
      <br><br>
      <div class="des">
  <?php
    $lines = explode("\n", $fetch_recipe['description']);
    foreach ($lines as $line) {
      echo trim($line) . "<br>";
    }
  ?>
</div>

   </form>
   <?php
         }
      }else{
         echo '<p class="empty">No Recipe added</p>';
      }
   ?>

</section>




<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>

<script>
function myFunction() {
  var elmnt = document.getElementById("scrolluntil");
  elmnt.scrollIntoView();
}
</script>

<script>
function scrollWin() {
  window.scrollBy(0, 800);
}
</script>

<script>
        document.getElementById('description').innerHTML= var lines = this.value.split('\n');
            for (var i = 0; i < lines.length; i++) {
                lines[i] = (i + 1) + '. ' + lines[i];
            }
            this.value = lines.join('\n');
           
    </script>


</body>
</html>