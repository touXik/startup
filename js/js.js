$(document).ready(function(){
  var typed = new Typed(".texte", {
      strings: ["Avez vous besoin d'Aide? ", "Cliquez iCi !","Pour consulter les étapes"],
      typeSpeed: 80,
      backSpeed: 60,
      loop: true
  });
});

//  --------------------------------------------------------------------------
clock();

function clock() {
  const date = new Date();
  const hours = ((date.getHours() + 11) % 12 + 1);
  const minutes = date.getMinutes();
  const seconds = date.getSeconds();
  const hour = hours * 30;
  const minute = minutes * 6;
  const second = seconds * 6;
  
  document.querySelector('.heure').style.transform = `rotate(${hour}deg)`;
  // document.querySelector('.heure').style.transform = 'rotate(${hour}deg)';

  document.querySelector('.minute').style.transform = `rotate(${minute}deg)`;

  // document.querySelector('.seconde').style.transform = `rotate(${second}deg)`;
  document.querySelector('.seconde').style.transform = `rotate(${second}deg)`;
}

setInterval(clock, 1000);


