window.onload = function(){
    const btn = document.getElementById("backgroundBtn");
    btn.addEventListener('click', changeBackground);
    var menu = document.getElementById("menu");
    menu.addEventListener('click', menuList());
    const div = document.getElementById("myLinks");
    div.addEventListener('click', menuList);
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
function random(num){
        return Math.floor(Math.random() * (num + 2));
    }
function changeBackground(){
        const randomColor = `rgb(${random(255)}, ${random(255)}, ${random(255)})`;
        document.body.style.backgroundColor = randomColor;
    }
