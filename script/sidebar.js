// SideBar Icon Change
document.addEventListener("DOMContentLoaded", () => {
  const sideBarBtn = document.getElementById("sideBarBtn");
  const sideBarIcon = sideBarBtn.querySelector("i");

  sideBarBtn.addEventListener("click", () => {
    sideBarIcon.classList.add("fade-out");

    setTimeout(() => {
      if (sideBarIcon.classList.contains("fa-arrow-left-long")) {
        sideBarIcon.classList.remove("fa-arrow-left-long");
        sideBarIcon.classList.add("fa-bars");
      } else {
        sideBarIcon.classList.remove("fa-bars");
        sideBarIcon.classList.add("fa-arrow-left-long");
      }
      sideBarIcon.classList.remove("fade-out");
      sideBarIcon.classList.add("fade-in");

      setTimeout(() => {
        sideBarIcon.classList.remove("fade-in");
      }, 200);
    }, 200);
  });
});

// Side Bar
document.addEventListener("DOMContentLoaded", function () {
  const sidebar = document.getElementById("sideBar");
  const nav = document.querySelector("nav");

  if (sidebar.style.left === "7px" || sidebar.style.left === "") {
    nav.classList.remove("sidebar-hidden");
  } else {
    nav.classList.add("sidebar-hidden");
  }
});

// SideBar Toggle Function
document.getElementById("sideBarBtn").addEventListener("click", function () {
  const sidebar = document.getElementById("sideBar");
  const nav = document.querySelector("nav");

  if (sidebar.style.left === "7px" || sidebar.style.left === "") {
    sidebar.style.left = "-280px";
    nav.classList.add("sidebar-hidden");
  } else {
    sidebar.style.left = "7px";
    nav.classList.remove("sidebar-hidden");
  }
});

// Making the Dashboard Section Responsive
document.getElementById("sideBarBtn").addEventListener("click", function () {
  document.querySelector(".main-page").classList.toggle("sidebar-hidden");
});
