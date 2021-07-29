//TODO Bloquer page suivante en mobile si tous les champs ne sont pas rempli



// GESTION DE L'AFFICHAGE

  // variables pour gérer l'input file carte d'identité
  let idCard = document.getElementById('iD')
  let idCardInput = document.getElementById('idCard')
  let selectedFile = document.getElementById('selectedFile')

  // variables pour gérer la version mobile
  let identityBtn = document.getElementById('identityBtn')
  let identificationBtn = document.getElementById('identificationBtn')

  // variables pour choix connexion / inscription
  let signIn = document.getElementById('signin')
  let login = document.getElementById('logIn')
  let signInBtn = document.getElementById('signinBtn')


  // gestion affichage : connexion / inscription
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



// VÉRIFICATION DES ENTRÉES FORMULAIRE INSCRIPTION

  // Variables 
  let passwordId = document.getElementById('passwordId');
  let passwordCheck = document.getElementById('passwordCheck');
  let form = document.querySelector('#signInForm')
  


  let regX = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;

  let error = '';

  // fonctions de vérification des champs
  function validName(value) {
    if (value === '') {
      return 'Votre nom est obligatoire\n';
    }
    if (value.length > 50){
      return 'Votre nom doit contenir moins de 50 caractères.\n'
    }
  
    return '';
  }
  function validFirstName(value) {
    if (value === '') {
      return 'Votre prénom est obligatoire\n';
    }
    if (value.length > 50){
      return 'Votre prénom doit contenir moins de 50 caractères.\n'
    }
  
    return '';
  }
  
  function validDate(value){
    if(value === ''){
      return 'Veuillez entrer votre date de naissance.\n'
    }
    return ''
  }

  function validGender(value){
    if(value ===''){
      return 'Veuillez sélectionner votre genre.\n'
    }
    return ''
  }



  function validIdCard(value){
    let imageType = /.*\.(jpe?g|png|pdf)$/igm

    if(!imageType.test(value)){
      return 'Veuillez sélectionner un fichier valide.\n'
    }  
    // il faudrait vérifier le poids du fichier !

   return ''  
   
  }

  function validStreet(value){
    if(value ===''){
      return 'Veuillez entrer un nom de rue.\n'
    }
    return ''
  }

  function validPostalCode(value){
    let postalCodeRgx = /^(F-)?((2[A|B])|[0-9]{2})[0-9]{3}$/
      if(!postalCodeRgx.test(value)){
      return 'Veuillez entrer un code postal valide.\n'
    }
    return ''
  }

  function validTown(value){
    let validTownName = /^([a-zA-Z\u0080-\u024F]+(?:. |-| |'))*[a-zA-Z\u0080-\u024F]*$/

    if(!validTownName.test(value) || value ===''){
      return 'Veuillez entrer un nom de ville valide.\n'
    }
    return ''
  } 

  function validEmail(value) {  
    let emailRgx =  /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
    if(!emailRgx.test(value)){
      return 'Veuillez entrer une adresse email valide.\n'
    }
    return ''
  }



  function passwordType(password) {
    if (!regX.test(password)) {
      return 'Le mot de passe devra contenir plus de 8 lettres, une majuscule, un chiffre et une minuscule\n'
    }
  
    return '';
  }
  
  function validPassword(password, passwordCheck) {
    if (password !== passwordCheck) {
      return 'Les 2 mots de passe doivent être identiques\n'
    }
  
    return '';
  }

  function validCgv(value){
    if(!value.checked){
      return 'Vous devez accepter les Conditions Générales de Vente\n'
    }
  
    return '';
  }

  // VERSION MOBILE - AFFICHAGE ET VALIDATION DES ÉTAPES

    // gestion inscription version mobile
    identificationBtn.addEventListener('click', (e)=>{
      error = ''
      
      for(var count=0; count<form.elements.length; count++) {
        switch (form.elements[count].name) {
          case 'email' :
            error += validEmail(form.elements[count].value)
            break
          case 'password':
            error += passwordType(form.elements[count].value)
            break
        }
      }
          
      error += validPassword(passwordId.value, passwordCheck.value)
      if (error !== '') {
        alert(error)
        e.preventDefault()
      } else {
        document.querySelector('#identity').classList.toggle('d-none')
        document.querySelector('#identification').classList.toggle('d-none')
      }
  
    })
  
    identityBtn.addEventListener('click', (e)=>{
      error = ''
      
      for(var count=0; count<form.elements.length; count++) {
        switch (form.elements[count].name) {
          case 'name':
            error+= validName(form.elements[count].value)
            break;
          case 'firstname':
            error += validFirstName(form.elements[count].value)
            break; 
          case 'birthDate':
            error += validDate(form.elements[count].value)
            break
          case 'gender':
            error += validGender(form.elements[count].value)
            break
          case 'idCard':
            error += validIdCard(form.elements[count].value)
            break
        }
      }
          
      error += validPassword(passwordId.value, passwordCheck.value)
      if (error !== '') {
        alert(error)
        e.preventDefault()
      } else {
        document.querySelector('#identity').classList.toggle('d-none')
        document.querySelector('#adress').classList.toggle('d-none')
        document.querySelector('#cgv').classList.toggle('d-none')
        document.querySelector('#cgv').classList.toggle('d-flex')
        document.querySelector('#submit').classList.toggle('d-none')
      }
    })
  
  


  // VALIDATION DU FORMULAIRE
  form.addEventListener('submit', (event) => {
    error = ''
    
    for(var count=0; count<form.elements.length; count++) {
      switch (form.elements[count].name) {
        case 'name':
          error+= validName(form.elements[count].value)
          break;
        case 'firstname':
          error += validFirstName(form.elements[count].value)
          break; 
        case 'birthDate':
          error += validDate(form.elements[count].value)
          break
        case 'gender':
          error += validGender(form.elements[count].value)
          break
        case 'idCard':
          error += validIdCard(form.elements[count].value)
          break
        case 'street':
          error += validStreet(form.elements[count].value)
          break
        case 'postalCode' :
          error += validPostalCode(form.elements[count].value)
          break
        case 'town' :
          error += validTown(form.elements[count].value)
          break
        case 'email' :
          error += validEmail(form.elements[count].value)
          break
        case 'password':
          error += passwordType(form.elements[count].value)
          break
        case 'cgv':
          error += validCgv(form.elements[count])
          break
      }
    }
        
    error += validPassword(passwordId.value, passwordCheck.value)
    if (error !== '') {
      alert(error)
      event.preventDefault()
    }
  })