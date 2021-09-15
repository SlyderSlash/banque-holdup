//Select all buttons with id = category
var buttons = document.querySelectorAll('#category');
//Iterate by loop
for (let i = 0; i < buttons.length; i++) {
    // iteration
    buttons[i].addEventListener('click', function () {
        //Print the name value of the clicked button
        console.log(buttons[i].name);

        let button = document.getElementsByName(buttons[i].name);
        console.log(button);
        if (button[0].name ==='account_creation') {
          document.getElementById('globalSection').classList.add('d-none');
          document.getElementById('account_creation').classList.toggle('d-none');
        }
        if (button[0].name ==='account_beneficiaries') {
          document.getElementById('globalSection').classList.add('d-none');
          document.getElementById('account_beneficiaries').classList.toggle('d-none');
        }
        if (button[0].name ==='account_deletion') {
          document.getElementById('globalSection').classList.add('d-none');
          document.getElementById('account_deletion').classList.toggle('d-none');
        }
    });
}