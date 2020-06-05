/***********************************************************************************/
/* ******************************* DONNEES GLOBALES ********************************/
/***********************************************************************************/

const error = document.querySelector('#erreurForm');
const email = document.querySelector('.emailField');
const username = document.querySelector('.usernameField');
const password = document.querySelector('.passwordField');
const formulaire = document.querySelector('form');

let expressionReguliere = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;







/***********************************************************************************/
/* ********************************** FONCTIONS ************************************/
/***********************************************************************************/


//verifie si format email est valide
function validationEmail() {

    if (expressionReguliere.test(email.value)) {

        formulaire.submit();
    
    }
    else
    {
        
        error.innerHTML = "L'adresse mail n'est pas valide";
        error.style.color = 'red';
                
    }  
}



// verifie si input vide
function validationNoEmpty() {
    if (email.value == "" || username.value == "" || password.value == "") {

        error.innerHTML = "Veuillez remplir tout les champs";
        error.style.color = 'red';
    }
    else
    {
        validationEmail();
    }
    
}



/************************************************************************************/
/* ******************************** CODE PRINCIPAL **********************************/
/************************************************************************************/


  formulaire.addEventListener("submit", function(event){
    event.preventDefault();
    validationNoEmpty();
  });

