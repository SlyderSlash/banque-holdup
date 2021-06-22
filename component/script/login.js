let emailInput = document.getElementById('email');
let passwordInput = document.getElementById('password');
let btnSubmit = document.getElementById('btnSubmit');


// check mail validity

function testMail() {
  let email = emailInput.value;
  let regexMail = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
  let mailRegTest = regexMail.test(email)
  if (email === "" ||
    email.length > 50 ||
    !mailRegTest) {
    return false
  } return true
}

// check password validity
function testPass() {
  // weak password list
  const notAllowedPasses =
    [
      "abc123",
      "qwerty123",
      "1q2w3e4r",
      "password1",
      "123qwe",
      "1qaz2wsx",
      "1q2w3e4r5t",
      "aa123456",
      "passw0rd",
      "1qaz2wsx",
      "trustno1",
      "zaq1zaq1",
      "admin123",
      "picture1",
      "qqww1122"
    ];
  let password = passwordInput.value;
  let regXPass = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;

  if (password === "" ||
    password.length > 50 ||
    !(regXPass.test(password)) ||
    notAllowedPasses.includes(password.toLowerCase())) {

    return false
  } return true
}

// check if testPass or testMail return false if it is -> stop submit form
btnSubmit.addEventListener('click', function (event) {
  if (!testMail() || !testPass()) {
    event.preventDefault();
    event.stopPropagation();
  }
  else {
    document.forms["logInForm"].submit();
  }
})