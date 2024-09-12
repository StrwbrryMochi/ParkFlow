// Dark Mode Function
document.getElementById("darkModeBtn").addEventListener("click", darkMode);

function darkMode() {
  var bodyelement = document.body;
  var navelement = document.querySelector("nav");
  var sideBar = document.getElementById("sideBar");
  var sidebarLinks = document.querySelectorAll(".sidebar-text ul li a");
  var mainPage = document.querySelectorAll(".main-page");
  var middle = document.querySelectorAll(".middle");
  var profileModal = document.querySelectorAll(".profile-modal");
  var notifModal = document.querySelectorAll(".notif-modal");
  var parkingTable = document.querySelector(".parking-table");
  var parkingtableTh = document.querySelector(".parking-table th");
  var parkingtableTd = document.querySelector(".parking-table td");
  var parkingtableTr = document.querySelector(".parking-table tr");
  var actionContainer = document.querySelector(".actionButton button");
  var tableContainer = document.querySelector(".table-container-parking");

  // Buttons
  var sideBarBtn = document.getElementById("sideBarBtn");
  var darkModeBtn = document.getElementById("darkModeBtn");
  var notifBtn = document.getElementById("notifBtn");
  var userBtn = document.getElementById("userBtn");

  bodyelement.classList.toggle("darkMode");
  navelement.classList.toggle("darkMode");

  sideBar.classList.toggle("darkMode");
  sideBarBtn.classList.toggle("darkMode");
  darkModeBtn.classList.toggle("darkMode");
  notifBtn.classList.toggle("darkMode");
  userBtn.classList.toggle("darkMode");

  sidebarLinks.forEach(function (link) {
    link.classList.toggle("darkMode");
  });

  //Change Dark Mode Icon
  var iconElement = darkModeBtn.querySelector("i");
  changeIcon(iconElement);

  //Change Icon Function
  function changeIcon(icon) {
    if (icon.classList.contains("fa-moon")) {
      icon.classList.remove("fa-moon");
      icon.classList.add("fa-sun");
    } else {
      icon.classList.remove("fa-sun");
      icon.classList.add("fa-moon");
    }
  }

  // Highlight the Sidebar button to their respective page
  var currentUrl = window.location.pathname.split("/").pop();
  sidebarLinks.forEach(function (link) {
    if (link.getAttribute("href") === currentUrl) {
      link.parentElement.classList.add("highlighted");
    } else {
      link.parentElement.classList.remove("highlighted");
    }
  });
}
