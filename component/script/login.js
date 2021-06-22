let btnSubmit = document.getElementById('lgbtnSubmit');


// check if testPass or testMail return false if it is -> stop submit form
btnSubmit.addEventListener('click', function (event) {
  const email = document.getElementById('lgemail').value
  const password = document.getElementById('lgpassword').value

  const regXPass = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/
  const regexMail = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/

  if(email === "" ||
  email.length > 50 ||
  !regexMail.test(email)){
    alert("L'adresse email est incorrect")
  }
  else if (password === "" ||
  password.length > 50 ||
  !regXPass.test(password)){
    alert("Le mot de passe est incorrect")
  }
  else {
    document.forms["logInForm"].submit();
  }
})