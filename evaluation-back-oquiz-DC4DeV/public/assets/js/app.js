var app = {
  init: function() {
    console.log('init');

    // J'intercepte l'event "submit" du formulaire de login
    $('#formLogin').on('submit', app.submitFormLogin);
    $('#formQuiz').on('submit', app.submitQuiz);
  },
  submitFormLogin: function(evt) {
    // Ne pas oublier d'annuler le fonctionnement par défaut
    evt.preventDefault();

    // Je récupère toutes les données du formulaire
    var formData = $(this).serialize();

    console.log(formData);

    // Appel Ajax
    $.ajax({
      url: BASE_PATH+'login', // URL appelée par Ajax
      dataType: 'json', // le type de donnée reçue
      method: 'POST', // la méthode HTTP de l'appel Ajax
      data: formData // Les données envoyés avec l'appel Ajax
    }).done(function(response) {
      console.log(response);
      if(response.code == 1) {
        //on renvoie a l url de reponse  -> ici la page home (TODO faire time out 2 seconde)
        window.location.href = response.url;
      }
      else {
        $('#alert').html('');
        // Si la reponse contient autre chose que code ==1, => renvoie des errorlist dans le dom
        response.errorList.forEach(function(value, index){
          $('#alert').append(value+'<br>');

        });
        $('#alert').show();

      }
    }).fail(function() {

    });
  },
  submitQuiz: function(evt){
    // Ne pas oublier d'annuler le fonctionnement par défaut
    evt.preventDefault();
    // bouton valider caché et rejouer devoilé
    $('#submit').hide();
    $('#reGame').show();


    // Je récupère toutes les données du formulaire
    var formData = $(this).serialize();
    var idQuiz = $(this).children().next().attr('id');

    $.ajax({

      url: BASE_PATH+'quiz/'+ID_QUIZ, // URL appelée par Ajax
      dataType: 'json', // le type de donnée reçue
      type: 'POST', // la méthode HTTP de l'appel Ajax
      data: formData

    }).done(function(response) {

      // transmissions des donnees a la methode  qui traitera l affichage de celles ci
        app.sendAnswer(response);

      }).fail(function() {

        });



  },
  sendAnswer: function(result){
    // arrayResult n est pas vraiment utile pour le moment, mais sert seulement pour log nos donnees
    var arrayResult = {};
    // variable pour le comptage des bonnes reponses
    var point = 0;

    for (var i = 0; i < result.return.length; i++) {

      var id = result.return[i][1];
      //remet les cartes dans l´etat d´origine du chargement du DOM
      $('#'+id+'').children().next().children().children().removeClass('good');
      $('#'+id+'').children().next().children().children().removeClass('wrong');
    }

    for (var i = 0; i < result.return.length; i++) {
      //Recupere les donnees qui seront utile au traitement du DOM
      var answer = result.return[i][0];
      var id = result.return[i][1];
      var anecdote = result.return[i][2];   //TODO remplacer les insertions php
      var wiki = result.return[i][3];       //TODO remplacer les insertions php
      var goodAnswer = result.return[i][4];
      var badAnswer = result.return[i][5];

      //Modification du DOM par ajout et suppression de classe
      if (answer == 'right') {

        $('#'+id+'').children().next().next().children().show();
        $('#'+id+'').children().first().addClass('alert-success').removeClass('alert-warning');
        $('#'+id+'').children().last().addClass('alert-success').removeClass('alert-warning');
        $('#'+id+'').children().next().find('.'+goodAnswer+'').addClass('good').removeClass('wrong');
        point++

      }else if(answer == 'wrong'){

        $('#'+id+'').children().next().next().children().show();
        $('#'+id+'').children().first().addClass('alert-warning').removeClass('alert-success');
        $('#'+id+'').children().last().addClass('alert-warning').removeClass('alert-success');
        $('#'+id+'').children().next().find('.'+goodAnswer+'').addClass('good').removeClass('wrong');
        $('#'+id+'').children().next().find('.'+badAnswer+'').addClass('wrong').removeClass('good');

      }
      //  Tableau a loger pour comprendre la structure des donnees
      arrayResult = {answer, id, anecdote, wiki, goodAnswer, badAnswer};
      // console.log(arrayResult);


    }
    // affichage d une div avec le score
    $('#score').text('Votre score est de '+point+'/10 ').show();
    // ecoute sur le nouveau bouton
    $('#reGame').on('submit', app.submitQuiz);


  }
};

$(app.init);
