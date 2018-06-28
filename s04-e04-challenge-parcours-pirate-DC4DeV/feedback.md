## :wave: feedback :eyeglasses:
Bon travail dans l'ensemble :) Bien la mise en place des bonnes pratiques cependant n'oublie pas de tester tes variables et à utiliser les boucles les plus appropriées à tes traitements. Continue comme ça tu es sur la bonne voie !

    - Code propre et bien indenté
    - Les commentaires sont des mémos synthétiques et généralement court qui indiquent / décrivent une action précise ou une fonction.
    Cela permet, grace à leur lecture, une reprise du code plus facile par un autre développeur ou sois même.
    - Pense à supprimer les traces de debug après le developpement (echo, print_r, var_dump(), die() et code non utilisé mis en commentaire)
    - Ne pas oublier de tester ses variables (type et/ou contenu) pour éviter les effets de bord (erreurs et/ou comportements inattendus)
    - Usage des inclusions à compléter : https://github.com/O-clock-Alumnis/fiches-recap/blob/master/php/fonctions-utiles.md
    - A chaque type de boucle, son usage : https://github.com/O-clock-Alumnis/fiches-recap/blob/master/php/boucles.md

#### test 1

    - Super l'utilisation des syntaxes racourcies :+1:
    - ✅  ok le retour de fonction
    - ✅  bien l'utilisation des fonctions utilisateur
    - L'usage de la boucle for est a destination d'itérer *obligatoirement un certain nombre de fois* dans notre fonction.
    - La boucle while répondrai mieux a notre besoin puisque l'on ne souhaite pas poursuivre l'execution de notre boucle une fois le résultat trouvé.

#### test 2

    - ✅ bien l'utilisation du tableau de session
    - ✅ Utilisation de foreach
    - ✅ bien l'utilisation de la fonction utilisateur
    - ✅ Nickel l'utilisation d'explode()

#### test 3

    - ✅ usage du POST
    - ✅ usage de include
    - Comme nous incluons le template et que nous en avons besoin une seule fois et si l'on souhaite utiliser include on utilisera include_once.
    Mais dans la mesure où ce template est obligatoire pour notre traitement (et au niveau des best practices) require_once serait préférable car il génère une erreur fatale à l'execution du script si il ne le trouve pas.
    - Empty() te permet de tester si ta variable est settée et non vide : http://php.net/manual/fr/function.empty.php
    Ce test peux être pratique lorsque tu reçois des données de la part de GET ou POST car l'envoie de données est contextuel.
    - Penses à prévoir les différents cas d'utilisation de ton application ici 2 cas sont possibles :

     1 - j'arrive la premiere fois et je n'ai pas encore envoyé mon formulaire,
     2 - J'ai déjà envoyé mon formulaire.
