// preloader fucntion
// =================================
"use strict";

$(window).on("load", function () {
  $(".loader").fadeOut();
  $("#preloder").delay(400).fadeOut("slow");
});
// preloader fucntion end
// =================================
// wow js start
// ================================
if ($(".wow").length) {
  var wow = new WOW({
    boxClass: "wow",
    animateClass: "animated",
    offset: 0,
    mobile: true,
    live: true,
  });
  wow.init();
}
// wow js end
// ================================
// sticky start
// =====================================
window.onscroll = function () {
  scrollFunc();
};
let feature = document.getElementById("feature");
let mouse = document.getElementById("mouse");
let headerSticky = document.getElementById("headerSticky");
let sticky = feature.offsetTop;
function scrollFunc() {
  if (window.pageYOffset >= sticky) {
    headerSticky.classList.add("sticky");
  } else {
    headerSticky.classList.remove("sticky");
  }
}
// sticky end
// =====================================
// mobile tabs start
// ======================================
var mobileMenuBtn = document.getElementById("mobileMenuBtn");
var mobileMenu = document.getElementById("mobileMenu");
var mobileMenuClose = document.querySelectorAll("mobileMenuClose");
mobileMenuBtn.onclick = function (e) {
  mobileMenu.classList.toggle("activeMenu");
};
//
var mobileMenuBtn = document.getElementById("mobileMenuBtn");
var mobileMenu = document.getElementById("mobileMenu");
var mobileMenuClose = document.getElementById("mobileMenuClose");
mobileMenuClose.onclick = function (e) {
  mobileMenu.classList.remove("activeMenu");
};

function showMore(id) {
  document.getElementById(id).classList.toggle("showMore");
}
