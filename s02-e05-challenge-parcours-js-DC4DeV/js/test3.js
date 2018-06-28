/*
 * 1. L'utilisateur tape un nombre dans chaque input
 * 2. Chaque fois que l'on tape au clavier dans l'un des deux input
 *    et si les deux inputs sont remplis, on additionne les deux nombres
 *    et on affiche le résultat dans #result
 */



var app = {
      init: function(){
                 document.getElementById('container').addEventListener('change' , function() {
                   var nb1 = Number(document.getElementById('input1').value);
                   var nb2 = Number(document.getElementById('input2').value);
                   var total = Number(nb1) + Number(nb2);
                   if (!input1.value  || !input2.value ) {

                   }
                   else
                   document.getElementById('result').textContent = Number(total);
                 });
               }
             }
document.addEventListener('DOMContentLoaded', app.init);
