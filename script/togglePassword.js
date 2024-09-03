// For Sign Up Form
const toggleSignUpPassword = document.querySelector("#toggleSignUpPassword");
const signUpPassword = document.querySelector("#signUpPassword");

toggleSignUpPassword.addEventListener("click", function () {
  const type =
    signUpPassword.getAttribute("type") === "password" ? "text" : "password";
  signUpPassword.setAttribute("type", type);
  this.classList.toggle("fa-eye-slash");
});

// For Sign In Form
const toggleSignInPassword = document.querySelector("#toggleSignInPassword");
const signInPassword = document.querySelector("#signInPassword");

toggleSignInPassword.addEventListener("click", function () {
  const type =
    signInPassword.getAttribute("type") === "password" ? "text" : "password";
  signInPassword.setAttribute("type", type);
  this.classList.toggle("fa-eye-slash");
});
