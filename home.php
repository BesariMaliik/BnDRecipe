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
   <title>BnD Food Recipe</title>

   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

   <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
	<link rel="apple-touch-icon" href="images/apple-touch-icon.png">

</head>

<body>

<?php include 'components/user_header.php'; ?>

<section class="hero">

   <div class="swiper hero-slider">
      <div class="swiper-wrapper">
         <div class="swiper-slide slide">
            <div class="content">
            <div class="image">
               <img src="images/carousel/kue_putu_bambu.jpg" alt="">
            </div>
               <h3>Kue Putu</h3>
               <h2>Comes from China which was changed by the people of East Java.
						Usually used as a morning snack.</h2>
                  <br>
                  <a href="type.php?type=snack" class="btn"> See Recipe </a>
               

               
            </div>
         </div>

         <div class="swiper-slide slide">
            <div class="content">
            <div class="image">
               <img src="images/carousel/cireng.jpg" alt="">
            </div>
               <h3>Cireng</h3>
               <h2>Cireng comes from the Sunda region.
						Made from starch/tapioca flour whose dough is fried.</h2>
                  <a href="type.php?type=snack" class="btn"> See Recipe </a>
            </div>
            
         </div>

         <div class="swiper-slide slide">
            <div class="content">
            <div class="image">
               <img src="images/carousel/sate_ayam.jpg" alt="">
            </div>
               <h3>Sate Ayam Bumbu Kacang</h3>
               <h2>Chicken satay is a typical Indonesian food.
						Grilled over charcoal and served with peanut sauce or soy sauce.</h2>
                  <a href="type.php?type=dinner" class="btn"> See Recipe </a>
            </div>
            
         </div>

      </div>

      <div class="swiper-pagination"></div>

   </div>

</section>

<br>
<br>
<br>
<section class="products">
   <h1 class="title">Our Recipe</h1>
	<p>Here are the Indonesian food recipes:</p>
		<div class="box-container">
		   <?php
      		$select_recipe = $conn->prepare("SELECT * FROM `recipe` LIMIT 5");
         	$select_recipe->execute();
         	if($select_recipe->rowCount() > 0){
         	while($fetch_recipe = $select_recipe->fetch(PDO::FETCH_ASSOC)){
   		?>
   		<form action="" method="post" class="box">
            <input type="hidden" name="pid" value="<?= $fetch_recipe['id']; ?>">
         	<input type="hidden" name="name" value="<?= $fetch_recipe['name']; ?>">
         	<input type="hidden" name="description" value="<?= $fetch_recipe['description']; ?>">
         	<input type="hidden" name="image" value="<?= $fetch_recipe['image']; ?>">
         	<a href="quick_view.php?pid=<?= $fetch_recipe['id']; ?>" class="fas fa-eye"></a>
         	<!-- <button type="submit" class="fas fa-shopping-cart" name="add_to_cart"></button> -->
         	<img src="uploaded_img/<?= $fetch_recipe['image']; ?>" alt="">
         	<a href="type.php?type=<?= $fetch_recipe['type']; ?>" class="cat"><?= $fetch_recipe['type']; ?></a>
         	<div class="name"><?= $fetch_recipe['name']; ?></div>
         </form>
         <?php
            }
         }else{
            echo '<p class="empty">No Recipe Added</p>';
         }
         ?>
		</div>
      <div class="more-btn">
      <a href="recipe.php" class="btn">Veiw All Recipe</a>
   </div>
   </section>

   <br>
   <br>
   <section class="hero">
   <h1 class="title">Customer Review</h1>
   <h2>Here's a review from our customer that proves that we have the best Indonesian food recipes: </h2>

   <br>
   <br>
   <div class="swiper hero-slider">

      <div class="swiper-wrapper">


      <div class="swiper-slide slide">
            <div class="content">
            <div class="image2">
               <img src="images/customer/garnacho.jpg" alt="">
            </div>
               <span>Alejandro Garnacho</span>
               <br>
               <h3>Football Player</h3>
               <h2>With my busy life as a soccer player, I always wanted to try to cook Indonesian food, when I tried using the recipe from this website it turned out to be very delicious and nutritious.</h2>
            </div>
         </div>


         <div class="swiper-slide slide">
            <div class="content">
            <div class="image2">
               <img src="images/customer/jungkook.jpg" alt="">
            </div>
               <span>Jeon Jungkook</span>
               <br>
               <h3>Singer</h3>
               <h2>I'm from South Korea and want to try to cook Indonesian food, but I find the recipe difficult to make and not convincing. 
					When I saw this website and tried the recipe it turned out to be very easy and tastes delicious.</h2>
            </div>
         </div>


         <div class="swiper-slide slide">
            <div class="content">
            <div class="image2">
               <img src="images/customer/gdragon.jpg" alt="">
            </div>
               <span>Kwon Ji-yong</span>
               <br>
               <h3>Rapper, Fashion Designer</h3>
               <h2>With this website, I feel I can learn to cook Indonesian food easily and also when I cook with my abilities it turns out to be very tasty.</h2>
            </div>
         </div>
            
         </div>

      </div>

      <div class="swiper-pagination"></div>

   </div>

</section>



<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>

<script>

var swiper = new Swiper(".hero-slider", {
   loop:true,
   grabCursor: true,
   effect: "flip",
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
   },
});

</script>

</body>
</html>