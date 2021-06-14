let idCard = document.getElementById('iD')
let idCardInput = document.getElementById('idCard')
let selectedFile = document.getElementById('selectedFile')
let identityBtn = document.getElementById('identityBtn')
let identificationBtn = document.getElementById('identificationBtn')
let signIn = document.getElementById('signin')
let login = document.getElementById('login')
let signInBtn = document.getElementById('signinBtn')

// gestion connexion / inscription
signInBtn.addEventListener('click', ()=>{
  signIn.classList.toggle('d-none')
  login.classList.toggle('d-none')

})

// ajout de la pièce d'identité + affichage du nom de fichier
idCard.addEventListener('click', ()=>{
    idCardInput.click()
})

idCardInput.addEventListener('change', addFile);

function addFile() {
  const curFiles = idCardInput.files[0];
  selectedFile.textContent = curFiles.name    
  }

// gestion inscription version mobile
identificationBtn.addEventListener('click', (e)=>{
document.querySelector('#identity').classList.toggle('d-none')
document.querySelector('#identification').classList.toggle('d-none')

})

identityBtn.addEventListener('click', ()=>{
  document.querySelector('#identity').classList.toggle('d-none')
  document.querySelector('#adress').classList.toggle('d-none')
  document.querySelector('#cgv').classList.toggle('d-none')
  document.querySelector('#cgv').classList.toggle('d-flex')
  document.querySelector('#submit').classList.toggle('d-none')
})