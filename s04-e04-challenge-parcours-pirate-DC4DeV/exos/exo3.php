<?php
/*
 * On doit afficher un formulaire pour s'identifier !
 * Ce formulaire se trouve dans le fichier "templates/exo3.php",
 * tu dois l'inclure ci dessous.
 */
etapeFinale($_POST);
include 'templates/exo3.php';
/*
 * Une fois que le formulaire est affiché, il va faloir saisir le bon
 * login / mot de passe. Ce sont ceux que tu as trouvé à l'exercice précédent !
 * Tu remplis le formulaire avec les bonnes données et tu le valide. Pour ça
 * on modifie le template pour faire les "echo" du login et du mot de passe
 * directement dans les champs du formulaire.
 */



/*
 * On doit maintenant récupérer les données du formulaire. Donc
 * on récupère ce qui se trouve dans $_POST (et on récupère bien tout
 * car il n'y a pas juste le login + mot de passe...).
 *
 * On transmet ces données en un seul paramètre à la fonction "etapeFinale".
 *
 * ATTENTION : Pour que tout fonctionne bien, il faut placer le code qui
 * récupère les informations du formulaire et qui exécute la fonction "etapeFinale"
 * au bon endroit dans ce fichier... ;) Faut essayer de comprendre pourquoi !
 *
 * Si on a bien fait les choses, on devrait voir apparaitre le "Yeah !" ;)
 */
