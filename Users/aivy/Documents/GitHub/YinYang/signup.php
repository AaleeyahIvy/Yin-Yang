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
    <title>Yin Yang App</title>
</head>
    <body onload="myFunction()" style="margin:0;">
      <nav class="col-12 nav">
        <a href=index.html>Home</a>
        <a href="about.html">About</a>
        <a href="contact.html">Contact</a>
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
      <h1>Sign Up</h1>
      <h2>Get Started:</h2>
      <form style="font-weight: bold;" action="verification/validatesignup.php" method="post">
        <label for="fullname">Full Name:</label>
        <input type="text" id="fullname" name="fullname" placeholder="Enter First Last Name" required>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" placeholder="Enter Email" required>
        <label for="phonenumber">Phone:</label>
        <input type="tel" id="phone" name="phone" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" placeholder="Enter Phone Number" required><br>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" placeholder="Create Username" required>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" placeholder="Create Password" required><br>
        <br>
        <label for="submit">Get Started!!!!</label>
        <input class="submit" name="submit" type="submit" value="Sign-up">
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
</script>
    </body>
</html>
