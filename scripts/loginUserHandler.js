const formLogin = document.querySelector("#form-login");

// ADD A SUBMIT EVENT FOR THE LOGIN FORM
formLogin.addEventListener("submit", e => {
  e.preventDefault();
  const formInputs = document.querySelectorAll(".form-control");

  // THIS SUBMITS THE FORM DATA TO THE LOGIN USER ENDPOINT
  axios
    .post(
      "./server/loginUser.php",
      JSON.stringify({
        username: formInputs[0].value,
        pwd: formInputs[1].value
      })
    )
    .then(res => handleLogin(res.data))
    .catch(err => console.error(err));
});

const handleLogin = data => {
  if (data.error) {
    alert(data.message);
  } else {
    alert(data.message);
    window.location = "./index.php";
  }
};
