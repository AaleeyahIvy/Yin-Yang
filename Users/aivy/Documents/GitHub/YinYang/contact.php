<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="icon" type="image/x-icon" href="images/favicon.ico">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
    <link rel="stylesheet" href="main2.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Thasadith&display=swap" rel="stylesheet">
    <script type="text/javascript" src="main.js"></script>
    <title>Yin Yang App</title>
</head>
<body onload="myFunction()" style="margin:0;">
  <nav class="col-12 nav">
      <a href=index.html>Home</a>
      <a href="about.html">About</a>
      <a href="contact.php">Contact</a>
      <a href="signin.php">Sign In</a>
    </nav>
<div id="loader">
  <svg class="background-layer" viewBox='-14 -7 28 14' xmlns='http://www.w3.org/2000/svg'>
      <circle r='6' />
      <path d='M0 6
      A6 6 0 0 1 0-6
      A3 3 0 0 1 0 0
      A3 3 0 0 0 0 6
      M0 2
      A1 1 0 0 1 0 4
      A1 1 0 0 1 0 2' fill='#fff' />
      <circle r='1' cy='-3' />
  </svg>
</div>
<div style="display:none;" id="myDiv" class="col-12 animate-bottom">
  <h1>Need help with something?</h1>
  <form action="verification/emailInquiry.php" method="post">
    <label for="name">Name:</label>
    <input type="text" name="name" id="name">
    <label for="username">Username:</label>
    <input type="text" name="username" id="username">
    <label for="email">Email:</label>
    <input type="email" name="email" id="email">
    <br>
    <label for="inquiry"></label>
    <textarea id="inquiry" name="inquiry" placeholder="Tell or Ask us something..." style="height:110px;width:635px;"></textarea>
    <br>
    <input type="submit" value="submit">
  </form>
</div>
<script>
var myVar;
function myFunction() {
 myVar = setTimeout(showPage, 5000);
}
function showPage() {
 document.getElementById("loader").style.display = "none";
 document.getElementById("myDiv").style.display = "inline-block";
}
   var path = anime.path('.background-layer');
   anime.timeline({ loop: false })
       .add({
           targets: '.background-layer',
           rotate: 560,
           duration: 5000,
           loop: 1
       })
</script>
    <footer>
        Created By: Aaleeyah Ivy & Austin Kilgore using Anime.Js, HTML, JS, CSS, and etc.
    </footer>
</body>
</html>