//Collapsible script start:
const collapsibles = document.querySelectorAll(".collapsible");
collapsibles.forEach((item) =>
  item.addEventListener("click", function () {
    this.classList.toggle("collapsible--expanded");
  })
);

//Collapsible script end

//Dropdown script start:
const toggle = document.querySelector(".toggle");
const menu = document.querySelector(".menu");
const items = document.querySelectorAll(".item");

/* Toggle mobile menu */
function toggleMenu() {
  if (menu.classList.contains("active")) {
    menu.classList.remove("active");
    toggle.querySelector("a").innerHTML = "<i class='fas fa-bars'></i>";
  } else {
    menu.classList.add("active");
    toggle.querySelector("a").innerHTML = "<i class='fas fa-times'></i>";
  }
}

/* Activate Submenu */
function toggleItem() {
  if (this.classList.contains("submenu-active")) {
    this.classList.remove("submenu-active");
  } else if (menu.querySelector(".submenu-active")) {
    menu.querySelector(".submenu-active").classList.remove("submenu-active");
    this.classList.add("submenu-active");
  } else {
    this.classList.add("submenu-active");
  }
}

/* Close Submenu From Anywhere */
function closeSubmenu(e) {
  let isClickInside = menu.contains(e.target);

  if (!isClickInside && menu.querySelector(".submenu-active")) {
    menu.querySelector(".submenu-active").classList.remove("submenu-active");
  }
}
/* Event Listeners */
toggle.addEventListener("click", toggleMenu, false);
for (let item of items) {
  if (item.querySelector(".submenu")) {
    item.addEventListener("click", toggleItem, false);
  }
  item.addEventListener("keypress", toggleItem, false);
}
document.addEventListener("click", closeSubmenu, false);
//Dropdown script end
//scroll script start 
$(document).ready(function () {
  // Read the cookie and if it's defined scroll to id
  var scroll = $.cookie('scroll');
  if(scroll){
      scrollToID(scroll, 1000);
      $.removeCookie('scroll');
  }

  // Handle event onclick, setting the cookie when the href != #
  $('.page-scroll').click(function (e) {
      e.preventDefault();
      var id = $(this).data('id');
      var href = $(this).attr('href');
      if(href === '#'){
          scrollToID(id, 1000);
      }else{
          $.cookie('scroll', id);
          window.location.href = href;
      }
  });

  // scrollToID function
  function scrollToID(id) {
      
      var offSet = 20;
      var obj = $('#' + id);
      
      
      if(obj.length){
        var offs = obj.offset();
        var targetOffset = offs.top - offSet;
        $('html,body').animate({ scrollTop: targetOffset  }, 2500);
      }
  }
});
//scroll script end

