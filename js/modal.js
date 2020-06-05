/***********************************************************************************/
/* ******************************* DONNEES GLOBALES ********************************/
/***********************************************************************************/

let modal = document.getElementById("myModal");
let span = document.getElementsByClassName("close")[0];


/************************************************************************************/
/* ******************************** CODE PRINCIPAL **********************************/
/************************************************************************************/



// enleve le modal par le bouton
span.onclick = function() {
  modal.style.display = "none";
}

// enleve le modal en cliquant ailleurs
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}