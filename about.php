<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>About Us</title>

   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

   <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
	<link rel="apple-touch-icon" href="images/apple-touch-icon.png">

</head>
<body>
   
<!-- header section starts  -->
<?php include 'components/user_header.php'; ?>
<!-- header section ends -->

<div class="heading">
   <h3>About Us</h3>
</div>

<!-- about section starts  -->

<section class="about">

   <div class="row">

      <div class="image">
         <img src="images/img-about.jpeg" alt="">
      </div>

      <div class="content">
         <h1>We have the best food recipe in Indonesia</h1>
         <p>B&D Food Recipe has 2 founders, namely: Mochamad Jad Mustafa Besari Maliik (C30109200052) and Athallah Deiga Azhar (C30109200030)
         <br><br>
            B&D Food Recipe was founded in 2022 and has been active since 2023. Although it has only been 1
            year since the opening of B&D Food Recipe, In the years since the opening of B&D Food Recipe, we have 
            tried to become the best website in Indonesia in terms of features and design.
             <br><br>
            Many food recipes have patented recipes making it difficult for people who want to learn to cook to
            ask questions and even share known recipe secrets. Currently looking for typical Indonesian culinary
            recipes is very complicated, therefore we created a website with secret recipes for Indonesian
            specialties that are guaranteed to taste very good to eat.

      </div>

   </div>

</section>

<!-- about section ends -->

<!-- reviews section starts  -->



<!-- reviews section ends -->

<!-- footer section starts  -->


<!-- footer section ends -->=

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

<script>

var swiper = new Swiper(".reviews-slider", {
   loop:true,
   grabCursor: true,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
   },
   breakpoints: {
      0: {
      slidesPerView: 1,
      },
      700: {
      slidesPerView: 2,
      },
      1024: {
      slidesPerView: 3,
      },
   },
});

</script>

</body>
</html>