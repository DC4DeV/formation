# Feedback du prof

## Test 1

### Enoncé

- Demander à l'utilisateur de rentrer un premier nombre dans une boite de dialogue.
- Demander à l'utilisateur de rentrer un 2e nombre dans une boite de dialogue.
- Additionner les deux nombres.
- Afficher le résultat dans #container.

### Notions

- [x] Utilisation d'un l'event listener sur `document` via l'event `DOMContentLoaded` et appel de la fonction init() d'un objet `var exo1 = { ... }`.
- [x] Utilisation de prompt pour saisir un nombre.
- [x] Usage de `Number()` (voire de `parseInt()`) pour convertir la saisie en type `number`.
- [x] Vérification que la saisie est bien un nombre via `isNan()`.
- [x] Addition des nombres.
- [x] Affichage de la somme dans le container.
- [x] (optionnel mais recommandé) Découpage de l'objet en fonctions.

### Commentaires

- :thumbsup:

## Test 2

### Enoncé

- L'utilisateur tape un nombre dans chaque input, puis clique sur OK.
- A la soumission du formulaire, on additionne les deux nombres,
  - et on affiche le résultat dans #result.

### Notions

- [x] Utilisation d'un l'event listener sur `document` via l'event `DOMContentLoaded` et appel de la fonction init() d'un objet `var exo2 = { ... }`.
- [x] Utilisation d'un l'event listener sur `container` (le form) via l'event `submit` ou `click` sur `button`.
- [x] Usage de `preventDefault()` pour interrompre la soumission du formulaire.
- [x] Usage de `document.getElementById()` our récupérer les valeurs des champs.
- [x] (optionnel) Placement des résulats dans des propriétés de l'objet, ie `exo2.userNumber1 = parseInt(...)`.
- [x] Usage de `Number()` (voire de `parseInt()`) pour convertir la saisie en type `number`.
- [x] Vérification que la saisie est bien un nombre via `isNan()`.
- [x] Addition des nombres.
- [x] Affichage de la somme dans le container.
- [x] (optionnel mais recommandé) Découpage de l'objet en fonctions.

### Commentaires

- Idem test 1 :wink:

## Test 3

### Enoncé

- L'utilisateur tape un nombre dans chaque input.
- Chaque fois que l'on tape au clavier dans l'un des deux input,
  - et si les deux inputs sont remplis, on additionne les deux nombres,
  - et on affiche le résultat dans #result.

### Notions

- [x] Utilisation d'un l'event listener sur `document` via l'event `DOMContentLoaded` et appel de la fonction init() d'un objet `var exo3 = { ... }`.
- [x] Utilisation d'un l'event listener sur `input` via l'event de clavier `keyup` et appel d'une fonction.
- [ ] Même chose que Test 2 pour les conversions et tests sur les nombres.
- [ ] (optionnel mais recommandé) Découpage de l'objet en fonctions.

### Commentaires

- Pourquoi dans cet exercice tu n'utilise pas aussi bien les objets qu'aux exos 1 et 2 ?
- D'ailleurs, ici, tu ne testes plus les valeurs saisies :/

## Test 4

### Enoncé

- Dans #container, affiche l'heure à la seconde près.
  - Sous le format : 11h 12m 06s.
- Chaque seconde, l'heure doit être actualisée.

### Notions

- [x] Utilisation d'un l'event listener sur `document` via l'event `DOMContentLoaded` et appel de la fonction init() d'un objet `var exo4 = { ... }`.
- [x] Utilisation de `Date()` pour récupérer l'heure.
- [x] Formatage de l'heure avec `getHours()`, `getMinutes()` et `getSeconds()`.
- [x] Utilisation de `setInterval()` pour afficher l'heure chaque seconde.
- [ ] (optionnel mais recommandé) Découpage de l'objet en fonctions.

### Commentaires

- Pourquoi cette fonction anonyme en bas du fichier JS ?

## Général

- [ ] Présence de commentaires dans le code.
- Qualité du code
  - [ ] indentation et lisibilité du code,
  - [x] découpage en fonctions,
  - [x] utilisation de propriétés.

### Commentaires

- Tous les tests sont OK, bien joué. Mais la qualité du code est à revoir.
- Dès que possible, utilise la structure objet, les propriétés et les méthodes.
- Indentation à revoir. Il va falloir bosser la dessus, c'est l'_image de marque_ de ton code

# Challenge : Récap JS

## Objectif

Voici un nouveau parcours en 4 étapes !

## Instructions

Directement dans chaque fichier JS :smiley:
