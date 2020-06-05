/***********************************************************************************/
/* ******************************* DONNEES GLOBALES ********************************/
/***********************************************************************************/



let slide = new Array("img/diapo1.1.svg", "img/diapo2.1.svg", "img/diapo3.1.svg", "img/diapo4.1.svg");
let numero = 0;

const $nextBtn = document.getElementById("nextBtn");
const $previousBtn = document.getElementById("previousBtn");




 
/***********************************************************************************/
/* ********************************** FONCTIONS ************************************/
/***********************************************************************************/

// diapo suivante
function next() {
    numero = numero + 1;
    if (numero < 0)
        numero = slide.length - 1;
    if (numero > slide.length - 1)
        numero = 0;
    document.getElementById("slide").src = slide[numero];
    
}

//diaper precedente
function previous() {
    numero = numero - 1;
    if (numero < 0)
        numero = slide.length - 1;
    if (numero > slide.length - 1)
        numero = 0;
    document.getElementById("slide").src = slide[numero];
    
}



/************************************************************************************/
/* ******************************** CODE PRINCIPAL **********************************/
/************************************************************************************/

// changement des diapo auto
setInterval(next, 5000);

// changement des diapo avec les boutons
$nextBtn.addEventListener('click', next);
$previousBtn.addEventListener('click', previous);


