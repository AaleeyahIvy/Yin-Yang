<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <link rel="icon" type="image/x-icon" href="images/favicon.ico">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://www.googleapis.com/calendar/v3/calendars/calendarId">
    <link rel="stylesheet" href="app.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Thasadith&display=swap" rel="stylesheet">
    <title>Yin Yang App</title>
</head>
<body>
  <div class="col-12 headerbuttons">
    <div id="menu" class="col-1 menu" onclick="menuToggle(this), menuList()">
      <div class="menu1"></div>
      <div class="menu2"></div>
      <div class="menu3"></div>
    
    <div id="myLinks">
    <a href="app.html">App</a><br>
    </div>
  </div>
    <h1 id="date"></h1>
  </div>
<div class="col-12 app-container">
  <!--Display date for app, we should track dates of messages, images, and posts added to app so they can browse those as memories-->
  <div class="col-12 content">
    <div class="col-8 main">
    </div>
  </div>
  <footer class="col-4">
  </footer>
</div>
<script>
  var menu = document.getElementById("menu");
  menu.addEventListener("click", menuList());
  document.getElementById("date").innerHTML = showDate();
  function showDate(){
    var d = new Date(),
    months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'],
    days = ['Sun','Mon','Tue','Wed','Thu','Fri','Sat'];
    return months[d.getMonth()]+' &#x262F; '+d.getDate()+' &#x262F; '+d.getFullYear();
  }
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
}
  </script>
</body>
</html>