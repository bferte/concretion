
  /***********************************************************************************/
/* ******************************* DONNEES GLOBALES ********************************/
/***********************************************************************************/


const error = document.querySelector('#erreurForm');
const username = document.querySelector('.usernameField');
const password = document.querySelector('.passwordField');
const formulaire = document.querySelector('form');


/***********************************************************************************/
/* ********************************** FONCTIONS ************************************/
/***********************************************************************************/

// Verifie si input vide

function validationNoEmpty() {
  if (username.value == "" || password.value == "") {

      error.innerHTML = "Veuillez remplir tout les champs";
      error.style.color = 'red';
      return false
  }
  else
  {
       
    return true;
      
  }
  
}


/************************************************************************************/
/* ******************************** CODE PRINCIPAL **********************************/
/************************************************************************************/





formulaire.addEventListener("submit", function(event){
  
  
if (validationNoEmpty() == false) {

  event.preventDefault();

}else if(validationNoEmpty() == true){

  console.log(validationNoEmpty());
  formulaire.submit();
}

});