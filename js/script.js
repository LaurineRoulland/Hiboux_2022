var sidenav = document.getElementById("mySidenav");
var openBtn = document.getElementById("openBtn");
var closeBtn = document.getElementById("closeBtn");

openBtn.onclick = openNav;
closeBtn.onclick = closeNav;


function openNav() {
  sidenav.classList.add("active");}

function closeNav() {
  sidenav.classList.remove("active");}




/*  Script Mo  */

document.addEventListener("DOMContentLoaded", function() {
    var burger_menu = document.querySelector("openBtn");
    var nav = document.querySelector("nav");
    burger_menu.addEventListener("click", function(evt){
        evt.preventDefault();
        nav.classList.toggle("show");
    });

});