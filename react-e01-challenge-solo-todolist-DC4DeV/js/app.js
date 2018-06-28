/**
 * Todolist
 */
var app = {
  init: function() {

    app.todoList();

  },

  todoList: function(){
    //recuperation de la div container
    var container = document.getElementById('todo');
    //Creation d' un formulaire
    var form = document.createElement('form');
    // creation d'un input de type placeHolder
    var placeHolder = document.createElement('input');
    // set des attributs et classes du placeholder
    placeHolder.setAttribute('type','text');
    placeHolder.setAttribute('class','input');
    placeHolder.setAttribute('placeholder','Ajouter une tache');
    // creation d'un bouton pour l jout de taches
    var add = document.createElement('button');
    // set des attributs du bouton
    add.setAttribute('type','submit');
    add.innerHTML = 'add';
    add.addEventListener('click',app.addTask);
    // creation d un titre h3
    var nbTask = document.createElement('h3');
    nbTask.innerHTML = 'aucunes taches en cours';
    //creation d une div qui contiendra toutes nos taches et ajout du titre en h3
    var allTask = document.createElement('div');
    allTask.setAttribute('class','board');
    allTask.appendChild(nbTask);
    // distibue les entfants de form ===> le placeHolder et et le bouton
    form.appendChild(placeHolder);
    form.appendChild(add);
    // distribue les enfants de la div parent
    container.appendChild(form);
    container.appendChild(allTask);
  },

  addTask: function(){
    //Blocage du comportement du navigateur par defaut ( au submit)
    event.preventDefault();
    //recuperation de la valeur de l input
    var input = document.getElementsByClassName('input');
    // creer un input de type checkbox
    var box = document.createElement('input');
    box.setAttribute('type','checkbox');
    // on assigne la valeur de l input a la balise p fraichement creer
    var value = document.createElement('p');
    value.innerHTML = input["0"].value;
    // creation de la div de la tache en cours
    var myTask = document.createElement('div');
    myTask.setAttribute('class','task');
    // donne les enfants checkbox et p a la task
    myTask.appendChild(box);
    myTask.appendChild(value);
    // recuperation de la div  board et ajout de la tache
    var allTask = document.querySelector('.board');
    allTask.appendChild(myTask);
    // recuperation de toutes les taches en cours
    var nbTask = document.querySelectorAll('.task');
    nbTask = Array.from(nbTask);
    // recuperation du h3 et modification de celui ci avec le nombres de taches en cours
    var compteur = document.querySelector('h3');
    compteur.innerHTML = nbTask.length+' taches en cours';
  }
};


// Chargement du DOM
document.addEventListener('DOMContentLoaded', app.init);
