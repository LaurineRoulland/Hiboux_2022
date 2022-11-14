var sidenav = document.getElementById("mySidenav");
var openBtn = document.getElementById("openBtn");
var closeBtn = document.getElementById("closeBtn");

openBtn.onclick = openNav;
closeBtn.onclick = closeNav;

/* Set the width of the side navigation to 250px */
function openNav() {
  sidenav.classList.add("active");
}

/* Set the width of the side navigation to 0 */
function closeNav() {
  sidenav.classList.remove("active");
}




/*  Script Mo  */

document.addEventListener("DOMContentLoaded", function() {
    var burger_menu = document.querySelector("openBtn");
    var nav = document.querySelector("nav");
    burger_menu.addEventListener("click", function(evt){
        evt.preventDefault();
        nav.classList.toggle("show");
    });

});