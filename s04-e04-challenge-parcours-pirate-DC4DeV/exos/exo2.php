<?php

/*
 * On passe à l'étape suivante qui consiste à trouver le
 * login / mot de passe de l'administrateur !
 *
 * Pour ça, on a fait appel à nos (in)formateurs afin
 * qu'ils nous communiquent une liste de comptes succeptibles
 * de contenir le bon...
 *
 * Cette fameuse liste se trouve en session, pour la récupérer,
 * il suffit de prendre ce qui se trouve dans $_SESSION['accounts'].
 * On peut faire un petit "var_dump" de cette liste pour voir ce
 * qu'il y a dedans...
 */



/*
 * Une fois la liste obtenue, on va devoir trouver le bon login / mot de passe !
 * Heureusement, on peut faire appel à la fonction "checkAccount" pour ça. Il suffit
 * de lui passer en paramètre un login et un mot de passe et ça nous retourne "true"
 * si c'est le bon compte, sinon ça nous retourne "false"
 *
 * exemple : $isGoodAccount = checkAccount('monLogin', 'monPassword');
 *
 * Le seul hic, c'est que dans notre liste des comptes, le login et le mot de passe
 * sont dans la même chaine de caractère... (sisi, regarde ton "var_dump" !)
 *
 * Note : là y'a de la boucle et du traitement de chaine de caractères, facile !
 */



 /*
  * Une fois que tu as trouvé le bon compte, il suffit d'appeler la méthode
  * "saveAccount" en lui passant le bon login et le bon mot de passe !
  */



/*
 * Une fois qu'on a trouvé le bon compte, on peut passer à l'exercice suivant !
 *
 * Si c'est trop difficile, on s'accroche et on essaie de prendre le problème
 * d'une autre manière. On hésites pas non plus à demander de l'aide !
 */

$session = $_SESSION['accounts'];

foreach ($session as $value) {
    list($user, $pass) = explode("/", $value);
    // echo $user. '  mdp   '.$pass.'<br />';
    if(checkAccount($user, $pass))
        return saveAccount($user, $pass);
}
