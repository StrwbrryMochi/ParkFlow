// Sliding animation toggle for Sign in and Sign up form
const loginContainer = document.getElementById("login-container");
const registerBtn = document.getElementById("register");
const loginBtn = document.getElementById("login");

registerBtn.addEventListener("click", () => {
  loginContainer.classList.add("active");
});

loginBtn.addEventListener("click", () => {
  loginContainer.classList.remove("active");
});
