document.addEventListener("DOMContentLoaded", () => {
  const section1 = document.getElementById("section1");
  const section2 = document.getElementById("section2");

  document.addEventListener("keydown", (event) => {
    if (event.key === "F2") {
      event.preventDefault();
      toggleSections();
    }
  });

  function toggleSections() {
    const isSection1Visible =
      section1.style.opacity === "1" || section1.style.opacity === "";

    if (isSection1Visible) {
      section1.style.opacity = "0";
      section2.style.opacity = "1";
      section2.style.pointerEvents = "auto";
    } else {
      section1.style.opacity = "1";
      section2.style.opacity = "0";
      section2.style.pointerEvents = "none";
    }
  }
});
