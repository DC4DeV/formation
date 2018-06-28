/*
 * 1. Demander à l'utilisateur de rentrer un premier nombre dans une boite de dialogue
 * 2. Demander à l'utilisateur de rentrer un 2e nombre dans une boite de dialogue
 * 3. Additionner les deux nombres
 * 4. Afficher le résultat dans #container
  */

  //Objet app
  var app = {
/* Ici les fonctionc de calcul de l'objet*/
    init: function (){
      app.resultat;
      if(!app.resultat){
        var first = app.param1();
        var sec = app.param2();
        console.log(first, sec);
        app.resultat = first + sec;
        console.log(app.resultat);
        app.page();
        }
      },
/* Ici la saisi et le controle du premier chiffre*/
    param1: function (){
      var userNumber1;
      var error = false;
      do {

        userNumber1 = prompt('Nombre numero 1');
        error = !userNumber1
        || isNaN(Number(userNumber1))
        || !Number.isInteger(Number(userNumber1));

        if (error) {
          alert('Veuillez entrer un nombre');
        }
      }
      while(error);
      return Number(userNumber1);
    },
/* Ici la saisi et le controle du second chiffre*/
    param2: function (){

      do {
        userNumber2 = prompt('Nombre numero 2');
        var error = false;

        error = !userNumber2
        || isNaN(Number(userNumber2))
        || !Number.isInteger(Number(userNumber2));
        if (error)
          alert('Veuillez entrer un nombre')

      }
      while(error);
      return Number(userNumber2);
    },
/* Ici l'initialisation du contenu et l'affichage dans le container*/
    page: function () {
      var container = document.getElementById('container');
      var p = document.createElement('p');
      p.textContent = 'le resultat de l\'addition est :' + app.resultat;
      container.appendChild( p );
    },
  }
  //Une fois le DOM chargé, la fonction init de l'objet app est exécutée
  document.addEventListener('DOMContentLoaded', app.init);
