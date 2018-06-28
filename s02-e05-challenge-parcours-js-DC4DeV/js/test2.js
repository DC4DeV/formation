/*
 * 1. L'utilisateur tape un nombre dans chaque input, puis clique sur OK
 * 2. A la soumission du formulaire, on additionne les deux nombres
 *    Et on affiche le résultat dans #result
 */

 // Objet app
 var app = {
/* Ici les fonctions de calcul de l'objet*/
      init:function(){
        var btn= document.getElementById('btn').addEventListener('click' , app.sum);
      },

      sum: function ( evt ){

         app.resultat = app.param1() + app.param2();
         app.page();
         evt.preventDefault();
       },

/* Ici la saisi et le controle du premier chiffre*/
   param1: function (){
     // var userNumber1;
     do {
       var input1 = document.getElementById('input1').value;
      //input1 = prompt('Nombre numero 1');
       var error = false;

       error = !input1
       || isNaN(Number(input1))
       || !Number.isInteger(Number(input1));

       if (error) {
         console.log('Veuillez entrer un nombre dans l\'input 1');
       }
     }
     while(error);
     return Number(input1);
   },
/* Ici la saisi et le controle du second chiffre*/
   param2: function (){

     do {
       var input2 = document.getElementById('input2').value;
       // input2 = prompt('Nombre numero 2');
       var error = false;

       error = !input2
       || isNaN(Number(input2))
       || !Number.isInteger(Number(input2));
       if (error){
         console.log('Veuillez entrer un nombre dans l\'input 2');
       }
     }
     while(error);
     return Number(input2);
   },
/* Ici l'initialisation du contenu et l'affichage dans le container*/
   page: function () {
     var result = document.getElementById('result');
     var p = document.createElement('p');
     p.textContent = 'le resultat de l\'addition est :' + app.resultat;
     result.appendChild( p );
   },
 }
 //Une fois le DOM chargé, la fonction init de l'objet app est exécutée
 document.addEventListener('DOMContentLoaded', app.init);
