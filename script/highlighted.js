// Highlighted Buttons for their Specific Links
document.addEventListener("DOMContentLoaded", function () {
  var currentUrl = window.location.pathname.split("/").pop();
  var links = document.querySelectorAll(".sidebar-text ul li a");
  links.forEach(function (link) {
    if (link.getAttribute("href") === currentUrl) {
      link.parentElement.classList.add("highlighted");
    } else {
      link.parentElement.classList.remove("highlighted");
    }
  });
});
