document.addEventListener("DOMContentLoaded", function () {
  const sidebar = document.getElementById("sideBar");
  const toggleButton = document.getElementById("toggleButton");

  toggleButton.addEventListener("click", function () {
    sidebar.classList.toggle("expanded");

    const main = document.querySelector("main");
    const sections = document.querySelectorAll("section");
    const nav = document.querySelector("nav");

    if (sidebar.classList.contains("expanded")) {
      main.style.left = "240px";
      main.style.width = "calc(100% - 240px)";

      sections.forEach((section) => {
        section.style.left = "10px";
        section.style.width = "calc(100% - 10px)";
      });

      nav.style.left = "250px";
      nav.style.width = "calc(100% - 250px)";
    } else {
      main.style.left = "50px";
      main.style.width = "calc(100% - 50px)";

      sections.forEach((section) => {
        section.style.left = "20px";
        section.style.width = "calc(100% - 20px)";
      });

      nav.style.left = "70px";
      nav.style.width = "calc(100% - 70px)";
    }
  });
});
