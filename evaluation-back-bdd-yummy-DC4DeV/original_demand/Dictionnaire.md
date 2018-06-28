|Nom|Type|Description|Entité|
|-|-|-|-|
|id|int|ID de la recette|Recipe|
|title|string|Nom de la recette|Recipe|
|picture|varchar|photo de la recette|Recipe|
|description|text|un resume de cette recette|Recipe|
|instruction|text|Instruction de la recette|Recipe|
|origin|varchar|Origine de la recette|Recipe|
|>|||<|
|id|int|ID du menu|Menu|
|title|string|Nom du menu|Menu|
|description|text|un resume de ce menu|Menu|
|origin|string|origine du menu|Menu|
|>|||<|
|id|int|ID de l'ingredient|Ingredient|
|name|string|Nom de l'ingredient|Ingredient|
|firm|string|Nom du revendeur/ packagin|Ingredient|
|price|int|Prix/Unite |Ingredient|
|>|||<|
|id|int|ID de L'user|User|
|nick|varchar|pseudo de L'user|User|
|first|string|prenom de L'user|User|
|last|string|nom de L'user|User|
|age|int|age de L'user|User|
|adress|string|adresse de L'user|User|
|zip|int|zipcode de L'user|User|
|town|string|ville de L'user|User|
|country|string|pays de L'user|User|
|phone|varchar|telephone de L'user|User|
|>|||<|
|id|int|ID de l'unite de mesure|Unit|
|name|varchar|Unite de mesure|Unit|
|>|||<|
|id|int|ID du package|Package|
|name|varchar|Type du pakage|Package|
|>|||<|
|id|int|ID du theme|Theme|
|name|varchar|Type du theme|Theme|
|>|||<|
|id|int|ID du Type|Type|
|name|varchar|Type|Type|
|>|||<|
|id|int|ID de l'allergen|Allergen|
|name|varchar|nom de l'allergen|Allergen|
|>|||<|
|id|int|ID de la nature|Nature|
|name|varchar|nature de l'ingredient|Nature|

* les prix des menus et des recettes sont calcules par rapport au prix des ingredients.

* L'entite Package, serait pour connaitre les volumes des contenants, et diviser le nombre d'unite de l'ingredient.
* L'entite Allergen, sert a savoir si un ingredient contient un agent allergen (Pour les menus sans gluten par exemple)
* L'entite Nature sert a connaitre l origine de l ingredient (Origine animale ou vegetale)
