document.addEventListener("DOMContentLoaded", function () {
  const sidebar = document.getElementById("sideBar");
  const sidebarToggle = document.getElementById("sidebarToggle");
  const logoToggle = document.getElementById("logoToggle");
  const dividers = document.querySelectorAll(".divider");

  // Initial setup to ensure the logoToggle is hidden
  logoToggle.style.opacity = "0";
  logoToggle.style.visibility = "hidden";

  // Toggle to expand the sidebar
  sidebarToggle.addEventListener("click", function () {
    sidebar.classList.add("expanded");

    sidebarToggle.style.opacity = "0";
    sidebarToggle.style.visibility = "hidden";
    logoToggle.style.opacity = "1";
    logoToggle.style.visibility = "visible";
    dividers.forEach((divider) => {
      divider.style.display = "none";
    });

    // Expanded Layout (Adjust Positioning)
    adjustLayout("expanded");
  });

  // Toggle to collapse the sidebar
  logoToggle.addEventListener("click", function () {
    sidebar.classList.remove("expanded");

    sidebarToggle.style.opacity = "1";
    sidebarToggle.style.visibility = "visible";
    logoToggle.style.opacity = "0";
    logoToggle.style.visibility = "hidden";
    dividers.forEach((divider) => {
      divider.style.display = "block";
    });

    // Collapsed Layout (Adjust Positioning)
    adjustLayout("collapsed");
  });

  function adjustLayout(state) {
    const main = document.querySelector("main");
    const sections = document.querySelectorAll("section");
    const nav = document.querySelector("nav");
    const profileSnippet = document.querySelector(".profile-snippet");

    if (state === "expanded") {
      main.style.left = "240px";
      main.style.width = "calc(100% - 240px)";
      sections.forEach((section) => {
        section.style.left = "10px";
        section.style.width = "calc(100% - 10px)";
        profileSnippet.style.left = "21.1%";
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
      profileSnippet.style.left = "11.7%";
    }
  }
});
