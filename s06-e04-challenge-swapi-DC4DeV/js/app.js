var app = {
    init: function(){
        // Ecouteur sur le bouton
        app.getLists();
    },
    /////////////////////////////////////////////////////////////////////////////
    //////////////////////////Requetes//////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////

    // recuperation de l'objet de la requete
    getLists: function(){

      $.ajax({
        // ! IMPORTANT ! récup. template au format text en non html
         url: '../template/ticket.html',
         dataType: 'text',
         success: function(template){
          app.template(template);
           // lecture des données de remplissage
           // On crée un objet XHR
          $.ajax('https://swapi.co/api/people/?format=json', {
                 // dataType: 'json'
             })
             .done(function (data) {

                 // On peut ici manipuler notre objet data en JS..
                 // app.personnageList(data);
                 app.personnageStats(data);

             })
             .fail(function() {
                 console.log('fail');
                 alert('Système cassé :/');
            });
         }
       });

       $.ajax('https://swapi.co/api/starships/', {

       }).done(function (dataShip) {

         app.shipData(dataShip);

       })
       .fail(function() {
           console.log('fail');
           alert('Système cassé :/');
       });

       $.ajax('https://swapi.co/api/planets/', {

       }).done(function (dataPlanets) {

         app.planetData(dataPlanets);

       })
       .fail(function() {
           console.log('fail');
           alert('Système cassé :/');
       });
    },

    /////////////////////////////////////////////////////////////////////////////
    //////////////////////////Templates////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////

    // Moteur de notre template
    template: function(template){
      var html = template;
      $( "#game" ).load( "/template/ticket.html");
    },
    /////////////////////////////////////////////////////////////////////////////
    //////////////////////////Personnages////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////

    // Rangememt de chacun des heros dans un tableau
    personnageStats: function(param){
      var arrayStat = {};
      for (var i = 0; i < param.results.length; i++) {
        var name = param.results[i].name;
        var height = param.results[i].height;
        var genre = param.results[i].gender;
        var weight = param.results[i].mass;
        var specs = param.results[i].species; //TODO fonction recuperations des races
        var eyes = param.results[i].eye_color;
        var planet = param.results[i].homeworld;//TODO fonction recuperations des planetes
        var ship = param.results[i].starships;//TODO fonction recuperations des vaisseaux
        var hero = {name, height, genre, weight, specs, eyes, planet, ship};
        arrayStat[i] = hero;
      }
      console.log(param);
      console.log(arrayStat);
      app.personnageList(arrayStat);
      app.arrayStat = arrayStat;
    },

    // Affiche la liste de mes heros
    personnageList:  function(param){

      var ul = $('<ul>');
      console.log(param);
      var test = Object.values(param);

      for (var i = 0; i < test.length; i++) {

        var li = $('<li>');
        li.append(test[i].name);
        li.on('click',app.heroStats);
        ul.append(li);
      }

      $('.charList').append(ul);
    },

    // Creation de la carte du joueur
    heroStats: function(){

      var hero = $(this).eq();
      var nameHero = hero.prevObject["0"].innerText;
      var i = 0;
      while (nameHero != app.arrayStat[i].name) {
        i++;
      }
      $('.characterName').text(nameHero);
      $('.characterSpecies').text(app.arrayStat[i].specs);//TODO
      $('.characterEyes').text(app.arrayStat[i].eyes);
      $('.characterGenre').text(app.arrayStat[i].genre);
      $('.characterHeight').text(app.arrayStat[i].height);
      $('.characterWeight').text(app.arrayStat[i].weight);
      $('.characterePlanet').text(app.arrayStat[i].planet);//TODO
      $('.charactereShip').text(app.arrayStat[i].ship);//TODO
    },

    /////////////////////////////////////////////////////////////////////////////
    //////////////////////////Planetes///////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////

    // Rangememt de chacune des planetes dans un tableau
    planetData: function(param) {

      var arrayPlanet = {};
      for (var i = 0; i < param.results.length; i++) {
        var planetName = param.results[i].name;
        var planetRotation = param.results[i].rotation_period;
        var planetOrbital = param.results[i].orbital_period;
        var planetDiamete = param.results[i].diameter;
        var planetClimat = param.results[i].climate;
        var planetPeople = param.results[i].population;
        var planetGravity = param.results[i].gravity;
        var planete = {planetName, planetRotation, planetOrbital, planetDiamete, planetClimat, planetPeople, planetGravity};
        arrayPlanet[i] = planete;
       }
       app.arrayPlanet = arrayPlanet;

       console.log(arrayPlanet);
       app.planetList(arrayPlanet);
     },

     //affiche la liste des planetes
    planetList: function(param) {
      var ul = $('<ul>');
      var test = Object.values(param);

      for (var i = 0; i < test.length; i++) {

        var li = $('<li>');
        li.append(test[i].planetName);
        li.on('click',app.planetWiever);
        ul.append(li);
      }
      $('.planetList').append(ul);
    },

    //Creation de la carte de la planete
    planetWiever: function(){

      var planet = $(this).eq();
      var namePlanet = planet.prevObject["0"].innerText;
      var i = 0;
      while (namePlanet != app.arrayPlanet[i].planetName) {
        i++;
      }
      $('.planetName').text(app.arrayPlanet[i].planetName);
      $('.planetRotation').text(app.arrayPlanet[i].planetRotation);
      $('.planetOrbital').text(app.arrayPlanet[i].planetOrbital);
      $('.planetDiameter').text(app.arrayPlanet[i].planetDiamete);
      $('.planetClimat').text(app.arrayPlanet[i].planetClimat);
      $('.planetPeople').text(app.arrayPlanet[i].planetPeople);
      $('.planetGravity').text(app.arrayPlanet[i].planetGravity);
    },

    /////////////////////////////////////////////////////////////////////////////
    //////////////////////////Vaisseaux//////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////

    shipData: function(param){

    },
    shipList: function(param){

    },
    shipWiever: function(){

    },


    /////////////////////////////////////////////////////////////////////////////
    //////////////////////////Jeux///////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////
};

// Quand le DOM et son contenu est chargé, on éxécute app.init
$(app.init);
