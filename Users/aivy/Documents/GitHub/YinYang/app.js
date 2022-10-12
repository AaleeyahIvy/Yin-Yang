
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
   }
//This does not save when changing pages, learn how to keep session information.
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
  } /*SELECT f.*, u.username FROM users u INNER JOIN ( SELECT userID, friendID FROM friends WHERE userID = 1 UNION SELECT friendID, userID FROM friends WHERE friendID = 1 ) f ON f.friendID = u.id; 
  $sql = "SELECT f.*, u.username\n"
  
      . "FROM users u \n"
  
      . "INNER JOIN (\n"
  
      . "  SELECT userID, friendID FROM friends WHERE userID = 1\n"
      */
    function addFriend(){ //add friend then store information in local storage
      var friend = document.createElement("div");
      friend.setAttribute('id','friend');
      friend.setAttribute('class', 'friends');
      var friendValue = document.getElementById("addFriend").value;
      var value = document.createTextNode(friendValue);
      friend.appendChild(value);
      if(friendValue===""){
        alert("Don't you want to add a friend?");
      } else {
        if (window.localStorage){
        var friend = document.getElementById("friends-list").appendChild(friend);//Add friend to friends-list
        friend.value = localStorage.getItem('friend');
        friend.addEventListener('input',function(){//Data Saved
          localStorage.setItem('friend',friend.value)
        }, false);
      }
        console.log(localStorage.getItem('friend'));
      }
      document.getElementById('addFriend').value = "";//null
  
      var span = document.createElement("SPAN");
      var txt = document.createTextNode("\u00D7");
      span.className = "close";
      span.appendChild(txt);
      friend.appendChild(span);
  
      for (i = 0; i < close.length; i++) {
      close[i].onclick = function() {
      var div = this.parentElement;
      div.style.display = "none";
      }
    }
  }
  function showFriends(){
    let friend = localStorage.getItem("friend");
    if(friend=""){
      alert("Test friends are being shown, not user input friends!")
  }else {
    document.getElementById("friends-list").appendChild(friend.value);
  }
  }
  
