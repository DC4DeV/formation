/*
 * 1. Dans #container, affiche l'heure à la seconde près.
 *    Sous le format : 11h 12m 06s
 * 2. Chaque seconde, l'heure doit être actualisée
 *
 * Astuce : on peut avoir un objet de date en faisant : var now = new Date();
 * https://developer.mozilla.org/fr/docs/Web/JavaScript/Reference/Objets_globaux/Date
 */


 var app = {

  init: function() {
    app.timer;
  },

  timer: setInterval(function() {
       var now = new Date();

       function addZero(i) {
         if (i < 10) {
         i = "0" + i;
       }
       return i;
     }

       console.log('bip');
       document.getElementById('container').textContent=now.getHours()+'h '+ addZero(now.getMinutes())+'m '+ addZero(now.getSeconds())+'s';
     }, 1000),
}

 document.addEventListener('DOMContentLoaded', app.init);



(function(){
    document.getElementById('container').innerHTML = new Date().toLocaleTimeString();
}, 1000);
