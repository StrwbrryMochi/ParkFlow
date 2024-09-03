document.addEventListener("DOMContentLoaded", function () {
  const image = document.querySelector(".intro-img img");
  image.classList.remove("loaded");

  setTimeout(function () {
    image.classList.add("loaded");
  }, 100);
});
