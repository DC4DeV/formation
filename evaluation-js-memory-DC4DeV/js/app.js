var app = {
  // initialisation de quelques variables globales
  table: null,
  level: null,
  nbPicture:18,
  nbCards:14,
  selectedPairs: [],
  loop: -1,
  temp: '',
  loop2: 0,
  amountCard: 28,

  // Demarage de notre application
  init: function(){
    app.pictureCard();
    app.selectionCard(app.nbCards, app.nbPicture);
    app.createBoard();
  },

  // creation de ma planche <table> ajouté à la div#board qui possedera 4 lignes
  createBoard: function(){
     app.table = $('<table>');
     $('#board').append(app.table);

     for (var line = 0; line < 4; line++) {
      // On crée une ligne de cartes (on l'appelera autant de fois le nombre d'itteration)
      app.createCard();
    }
    // Definition de l'état par defaut de nos cartes
    $('.cache').show();
    $('.image').hide();

  },

  // Generation des 28 cartes
  createCard: function (){
    var tr = $('<tr>');

    // Creation des cartes dans une ligne
    for (var column = 0; column < 7; column++) {
      // Ici 7 cartes par ligne
      // création d'une balise <td> qui sera notre carte
      var td = $('<td>');

      // Tirage au hasard d'une carte parmis les 28 de selectedPairs
      app.temp =  Math.floor(Math.random() * app.selectedPairs.length);

      // On fabrique notre td card
      td.addClass('card');

      // Création des enfants de cette <td> "carte" qui seront deux div de class differente 'cache'et 'image'
      td.append('<div class="cache">');
      td.append('<div class="image '+app.selectedPairs[app.temp]+'">');

      // Recuperation de la position du background depuis le ableau selectedPairs
      td.children('.image').css("background-position","0 -"  +app.selectedPairs[app.temp]+"px");

      // td.data('model', currrentModelCard);

      // Ecoute du click sur la carte
      td.on("click", app.returnCard);

      // on ajoute la carte sur la ligne
      $(tr).append(td);

      // Suppression de la carte dans le tableau pour eviter les doublons
      app.selectedPairs.splice(app.temp, 1);

    }
    // Une fois toutes les cartes de cette ligne crée on les ajoutes au tableau
    $(app.table).append(tr);
  },

  // Fonction qui decoupe l'image de backrgound en position de 100
  pictureCard: function() {
    app.set = [];
    app.trId = [];
    for (var picture = 0; picture < app.nbPicture; picture++) {

      app.set.push(picture * 100);

    }
  },

  // Selection de 14 images sur les 18 disponibles, et rangement dans un tableau
  selectionCard: function(param1, param2) {
    // Recuperation du nombre de carte à selectionner
    for (var i = 0; i < param1; i++) {
      // je prends un chiffre et je le range dans element
      var element = Math.floor(Math.random() * Math.floor(param2));

      // je cherche si il existe dans le tableau
      var idx = app.selectedPairs.lastIndexOf(app.set[element]);

      // si mon chiffre n'est pas dans le tableau je l'ajoute
      if(idx === -1){
        // JE remplis deux fois la meme valeur dan mon tableaux
        app.selectedPairs.push(app.set[element]);
        app.selectedPairs.push(app.set[element]);
      }
      // Sinon je supprime cette itteration
      else {
        i--;
      }
    }
  },

  // fonction qui gere le retournement de la carte
  returnCard: function() {
    app.selectedCard;

    // ciblage de la div .cache
    $(this).children().hide();

    // ciblage de la div .image
    $(this).children().next().show();

    // recuperation de cette carte sous forme d'objet
    app.selectedCard = $(this).children().next().eq();

    // incrementation du compteur de carte retourné
    app.loop2++;

    // creation de deux variables pour contenir nos cartes
    app.idCard1;
    app.idCard2;

    // Une condition qui ecoute le nombre de carte retourné
    if (app.loop2 === 1) {

      // assignation de l'objet de la carte dans une variable
      app.idCard1 = Object.entries(app.selectedCard);
      // desactivation du click sur cette carte
      $(this).off('click');
    }
    else if(app.loop2 === 2) {

      // assignation de l'objet de la carte dans une variable
      app.idCard2 = Object.entries(app.selectedCard);
      // remise a zero du nombre de carte retourné
      app.loop2 = 0;
      // desactivation du click sur cette carte
      $(this).off('click');
      app.currrentModelCard(app.idCard1,app.idCard2);

    }
  },

  // Fonction de comparaison des cartes tirées
  currrentModelCard: function(param1, param2){
    // Recuperation des classe de nos cartes
    var id1 = param1[1][1]["0"].className;
    var id2 = param2[1][1]["0"].className;

    // Comparaison des classes de nos deux cartes
    if(id2.valueOf() != id1.valueOf()){

      // si elles sont differente on appele la fonction isNotAPairs
      app.isNotAPairs();
    }
    else {

      // sinon elle sont paire est donc nous appelons isAPairs
      app.isAPairs();
    }


  },

  // Si les cartes ne sont pas paire on desactive le click sur tout le plateau et on lance un timer
  isNotAPairs: function() {
    $('.card').off('click');
    // le timer appelera la fonction de reinitialisation des cartes
    timeoutID = window.setTimeout(app.resetPair, 1000);
  },

  // Si les cartes ne sont pas paire on les retourne avec cette fonction
  resetPair: function(){
    $('.cache').show();
    $('.image').hide();
    $('.card').on('click', app.returnCard);
  },

  // Si les deux cartes tirées sont paire on entre dans cette foction
  isAPairs: function (){

    //recuperationb de la div .cache
    var tmp = app.idCard1[1][1].prevObject["0"];
    var tmp1 = app.idCard2[1][1].prevObject["0"];
    app.amountCard -= 2;

    // suppression de la div .cache
    tmp.remove(1);
    tmp1.remove(1);

    // Suppression de la classe image et ajout de la classe pair
    app.idCard1[1][1]["0"].classList.remove('image');
    app.idCard1[1][1]["0"].classList.add('pair');

    // Suppression de la classe image et ajout de la classe pair
    app.idCard2[1][1]["0"].classList.remove('image');
    app.idCard2[1][1]["0"].classList.add('pair');

    // suppression du click sur la class pair
    $('.pair').off('click');
    // Si le nombre de cartes cache atteind 0 c'est la victoire
    if(app.amountCard === 0){
      timeoutID = window.setTimeout(app.victory, 0500);
    }
  },

  // Fonction de reset de la partie suite à une victoire
  victory: function(){
    // on affiche une alerte de victoire
    alert("Vous avez Gagnéééééééééééééé !");
    // On efface le plateau
    $("table").remove();
    // et on relance un jeux
    app.init();

  }
};

// On crée l'écoute qui va nous prévenir
// que la page est correctement chargée
$(app.init);
