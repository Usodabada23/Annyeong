const input = document.getElementById("pwd");
const errorMessage = document.getElementById("error-message");
input.addEventListener("input", (e) => {
  const password_input = input.value.trim();
  const pwd_regex =
    /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{7,}$/;
  if (!pwd_regex.test(password_input)) {
    errorMessage.textContent =
      "Password must contain at least 8 characters, one uppercase letter, one lowercase letter, one number, and one special character.";
    errorMessage.style.color = "red";
  } else {
    errorMessage.textContent = "Valid password";
    errorMessage.style.color = "green";
  }
});
const confirm_input = document.getElementById("confPwd");
const confMessage = document.getElementById("confirm-error");

confirm_input.addEventListener("input", (e) => {
  const password_input = input.value.trim();
  const confirm_password = confirm_input.value.trim();

  if (confirm_password !== password_input) {
    confMessage.textContent = "Passwords do not match.";
    confMessage.style.color = "red";
  } else if (confirm_password === "") {
    confMessage.textContent = "";
  } else {
    confMessage.textContent = "Passwords match!";
    confMessage.style.color = "green";
  }
});
