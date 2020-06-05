/***********************************************************************************/
/* ******************************* DONNEES GLOBALES ********************************/
/***********************************************************************************/

const $myVideo = document.getElementById("myVideo");
const $progressBar = document.querySelector('progress');
const $progressLabel = document.getElementById("progressLabel");

 
/***********************************************************************************/
/* ********************************** FONCTIONS ************************************/
/***********************************************************************************/

//lecture video
function playVideo()
{
    
      $myVideo.play();  
      console.log($myVideo.duration)
      console.log($myVideo.currentTime)
      
      let stopVid = $myVideo.duration - 0.2
      console.error(stopVid)
      
      if ($myVideo.currentTime >= stopVid) {

        envoiValidation()

      hide();
      mute();
        modal.style.display = "block";  /*  Modal */


        console.log(envoiValidation())
        
        
      }
}


function pauseVideo()
{
    $myVideo.pause();
}


//////  Validation de la formation video


function envoiValidation() {

  $.post(
    '../controllers/validation_training_video.php' ,

    {

        
      
    },


    function(data){ 
      if(data == 'Success'){
        $("#resultat").html("<p>Vous avez Validé la formation !</p>");
       }
      else{

        $("#resultat").html("<p>Erreur lors de la connexion...</p>");
          }
    },
    'text' 
    
    );


}

function hide() {

  $myVideo.classList.add('hide');
  $progressBar.classList.add('hide')
  $progressLabel.classList.add('hide')

  
}

function mute() {

  $myVideo.muted = true;

}

/// faire evoluer attribut barre de progression

function progressAttribut(att,value) {
$progressBar.setAttribute(att,value)

}






/************************************************************************************/
/* ******************************** CODE PRINCIPAL **********************************/
/************************************************************************************/



//////////////////////// Controles de la video





/// touche multiple pour play video

let keysPressed = {};



document.addEventListener('keyup', (event) => {
  delete keysPressed[event.key];
  pauseVideo();
});


document.addEventListener('keypress',(event) => {
  keysPressed[event.key] = true;
  console.log(keysPressed);
  console.log($myVideo.ended);
if (keysPressed['a'] && keysPressed['s'] && keysPressed['l'] && keysPressed['p'] ) {
  playVideo();
  progressAttribut("max",$myVideo.duration)
  progressAttribut("value",$myVideo.currentTime)

  
}


});






