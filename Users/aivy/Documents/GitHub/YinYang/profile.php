<?php
 session_start();
 $id = $_SESSION['id'];
 $username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="icon" type="image/x-icon" href="images/favicon.ico">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="app.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Thasadith&display=swap" rel="stylesheet">
    <script src="app.js"></script>
    <title>Yin Yang App</title>
</head>
<body>
<?php
require('./config/db.php');

// where userID = 1 where friendID = 1 DEFAULT
$sql = "SELECT f.*, u.username FROM users u INNER JOIN ( SELECT userID, friendID FROM friends WHERE userID = '{$id}' UNION SELECT friendID, userID FROM friends WHERE friendID = '{$id}' ) f ON f.friendID = u.id";
$result = mysqli_query($conn, $sql);
mysqli_close($conn);
?>
  <div class="col-12 headerbuttons">
    <div id="menu" class="col-1 menu" onclick="menuToggle(this), menuList()">
      <div class="menu1"></div>
      <div class="menu2"></div>
      <div class="menu3"></div>
    <div id="myLinks">
    <a href="app.html">App</a><br>
    <a href="profile.php">Profile</a><br>
    <a href="calendar.html">Calendar</a><br>
    <a href="settings.html">Settings</a>
    </div>
  </div>
    <h1 id="date"></h1>
  </div>
<div class="col-12 app-container">
  <div class="col-12 content">
    <div class="profile">
    <div class="accordion">PROFILE:
    <div class="panel"><?php echo $_SESSION['username'];?></div>
    </div>
    <div class="accordion">FRIENDS:
    <div class="panel" id="friends-list">
      <input type="text" id="addFriend" placeholder="Enter friend name...">
      <button onclick="addFriend()" class="addBtn">Add</button>
      <?php
                // LOOP TILL END OF DATA
                while($rows=$result->fetch_assoc())
                {
            ?>
                <!-- FETCHING DATA FROM EACH
                    ROW OF EVERY COLUMN -->
                <div class="friends" id="friend"><?php echo $rows['username'];?></div>
            <?php
                }
            ?>
      </div>
              </div>
    <div class="accordion">PUBLIC GROUPS:
      <div class="panel">Place information here!</div>
    </div>
    <div class="accordion">PRIVATE GROUPS:
      <div class="panel">Place information here!</div>
    </div>
</div>
  </div>
<script>
    var menu = document.getElementById("menu");
    menu.addEventListener("click", menuList());
    function menuToggle(x) {
    x.classList.toggle("change");
    }
    function menuList() {
    var x = document.getElementById("myLinks");
    if (x.style.display === "none") {
      x.style.display = "block";
    } else {
      x.style.display = "none";
    }
   }</script>
   <script>
      var nodeList = document.getElementsByClassName("friends");
    var i;
    for (i = 0; i < nodeList.length; i++) {
    var span = document.createElement("SPAN");
    var txt = document.createTextNode("\u00D7");
    span.className = "close";
    span.appendChild(txt);
    nodeList[i].appendChild(span);
  }
  var close = document.getElementsByClassName("close");
  var i;
  for (i = 0; i < close.length; i++) {
  close[i].onclick = function() {
    var div = this.parentElement;
    div.style.display = "none";
  }
  } 
  </script>
    </div>
  <button><a href="logout.php">Logout</a></button>
</body>
</html>
