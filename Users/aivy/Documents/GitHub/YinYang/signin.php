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
<?php if (isset($_GET["msg"]) && $_GET["msg"] == 'failed') {
          $loginError = "Wrong Username or Password";
      }
      $message = "";
    if (count($_POST) > 0) {
    $isSuccess = 0;
    $conn = mysqli_connect("localhost", "root", "", "user_authentication");
    $userName = $_POST['userName'];
    $sql = "SELECT * FROM users WHERE username= ?";
    $statement = $conn->prepare($sql);
    $statement->bind_param('s', $username);
    $statement->execute();
    $result = $statement->get_result();
    while ($row = $result->fetch_assoc()) {
        if (! empty($row)) {
            $hashedPassword = $row["password"];
            if (password_verify($_POST["password"], $hashedPassword)) {
                $isSuccess = 1;
            }
        }
    }
    if ($isSuccess == 0) {
        $message = "Invalid Username or Password!";
    } else {
        header("Location:  app.html");
    }
}
    ?>
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
        <h1>Sign In</h1>
        <h2>Welcome Back:</h2>
        <form style="font-weight: bold;" action="validatesignin.php" method="post">
          <label for="username">Username:</label>
          <input type="text" id="username" name="username" placeholder="Enter Username" required>
          <label for="password">Password:</label>
          <input type="password" id="password" name="password" placeholder="Enter Password" required><br>
          <span class="error">*<?php echo $loginError; ?></span>
          <br>
          <input class="submit" name="submit" type="submit" value="Sign In">
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
