<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>



</body>

<script src="js/script.js"></script>

</html>
<pre lang="PHP">
<style>
* {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}

.questionmenu {
    width: 100%;
    height: 80px;
    border: 10px solid blue;
}
.button {
    height: 100%;
    border: 10px solid red;
    color: black;
}
.button:hover {
    color: white;
    background-color: red;
}
</style>
<div class="questionmenu">
    <button onclick="myFunction(); scrollWin()" class="button">PUSH TO SCROLL</button>
</div>

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
<style>
* {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}

.questionbanner {
    width: 100%;
    height: 1000px;
    border: 10px solid green;
}
</style>
<div class="questionbanner"></div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<style>
* {
padding: 0;
margin: 0;
}
.column-left{
    float: left;
    width: 25%;
    height: 400px;
    border: 10px solid grey;
}
.column-center{
    float: left;
    width: 50%;
    height: 400px;
    border: 10px solid lightblue;
}
.column-right{
    float: left;
    width: 25%;
    height: 400px;
    border: 10px solid yellow;
}
</style>

<div class="container">
   <div class="column-left"></div>

   <div class="column-center">
       <p id="scrolluntil">SCROLL DOWN UNTIL THIS!</p>
   </div>

   <div class="column-right"></div>
</div>


