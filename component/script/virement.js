let newTransaction = document.getElementById('newTransaction')
let addBeneficiary = document.getElementById('addBeneficiary')

// AFFICHAGE DE L'AJOUT DE BENEFICIAIRES

let goToAddBeneficiary = document.getElementById('goToAddBeneficiary')
goToAddBeneficiary.addEventListener('click', ()=>{
    newTransaction.classList.toggle('d-none')
    addBeneficiary.classList.toggle('d-none')
})

// DEMANDE CONFIRMATION AJOUT IBAN

let addIbanBtn = document.getElementById('addIbanBtn')
let confirmNewIban = document.getElementById('confirmNewIban')
let newIban = document.getElementById('newIban')
let showNewIban = document.getElementById('showNewIban')

    // vérification du format de l'iban
    
let error = ''

function validIban(value){
    let regex = /^[a-zA-Z]{2}[0-9]{25}/
    if(!regex.test(value)){
        return 'Veuillez saisir un IBAN valide. \n'
    } 
    return ''
}

function askIbanConfirmation(){
    error =''
    error += validIban(newIban.value)
    if (error != ''){
        alert(error)
    } else {
        confirmNewIban.classList.toggle('opacity')
        confirmNewIban.classList.toggle('d-md-block')
        confirmNewIban.classList.toggle('d-none')

        showNewIban.textContent = newIban.value
        addIbanBtn.removeEventListener('click', askIbanConfirmation)
    }
}

addIbanBtn.addEventListener('click', askIbanConfirmation)

// VALIDATION IBAN -- SOUMISSION FORMULAIRE

let addBenefForm = document.getElementById('addBenefForm')

addBenefForm.addEventListener('submit', function(e){
    error =''
    error += validIban(newIban.value)
    if (error != ''){
        alert(error)
        e.preventDefault()
    }
})



//------------------------------------------

// AFFICHAGE DEMANDE CONFIRMATION DE VIREMENT

let confirmTransaction = document.getElementById('confirmTransaction')
let transactionEntry = document.querySelectorAll('.transactionEntry')

    // pour affichage montant et bénéficiaire

let transactionAmount = document.getElementById('transactionAmount')
let showTransactionAmount = document.getElementById('showTransactionAmount')
let chosenBeneficiary = document.getElementById('chooseBeneficiary')
let showBeneficiaryAccount = document.getElementById('beneficiaryAccount')

let goToConfirmTransation = document.getElementById('goToConfirmTransation')

    // vérification des champs

function validBeneficiary(value){
    if(value === ''){
        return 'Veuillez sélectionner un bénéficiaire.\n'
    }
    return ''
}

function validAmount(value){
    if(value === ''){
        return 'Veuillez saisir un montant.\n'
    } else if(isNaN(value)){
        return 'Veuillez saisir un montant valide.\n'
    } else if(value>3000 && value<1000000){
        return 'Vous dépassez le plafond autorisé.\n'
    } else if(value>=1000000){
        return 'Vous êtes beaucoup trop pauvre pour ça. MOUAHAHAH!\n'
    }
    return ''
}

goToConfirmTransation.addEventListener('click', ()=>{
    error =''
    error += validBeneficiary(chosenBeneficiary.value)
    error += validAmount(transactionAmount.value)
    if (error !=''){
        alert(error)
    }
    else {
        confirmTransaction.classList.toggle('d-none')
        transactionEntry.forEach(element => {
            element.classList.toggle('d-none')
            element.classList.toggle('d-xl-flex')

        });
        showTransactionAmount.textContent = transactionAmount.value
        showBeneficiaryAccount.textContent = chosenBeneficiary.value
    }
})


// VALIDATION DE LA TRANSACTION

let transactionForm = document.getElementById('transactionForm')

transactionForm.addEventListener('submit', function(e){
    error =''
    error += validBeneficiary(chosenBeneficiary.value)
    error += validAmount(transactionAmount.value)
    if (error !=''){
        alert(error)
        e.preventDefault()
    }
})


