# API REST

Voici la liste complète des services qu'offre l'API REST de l'application JdnApp.

## localisation de l'API

L'api se situe à l'adresse `api/laravel/public/v1/`

## Service Categories

Les Categories correspondent aux différentes années à l'école (promo L1, promo L2, ... promo 2014).

voici les requêtes http pour récuperer/modifier une ou plusieurs Categories.

| URI               | Méthode   | action                            | Paramètre             | Retour    |
|-----------------  |---------  |--------------------------------   |-------------------    |--------   |
| /categorie        | GET       | Récupère toutes les catégories    |                       | json      |
| /categorie        | POST      | Ajoute une catégorie              | title, isInternal     | json      |
| /categorie/{id}   | GET       | Récupère la catégorie {id}        | 					    | json      |
| /categorie/{id}   | PUT       | Modifie la catégorie {id}         | title, isInternal     | json      |

## Service Guests

Les Guests correspondent aux invités qui se sont inscrit pour la jdn.

voici les requêtes http pour récupérer/modifier un ou plusieurs Guests.

| URI         	| Méthode 	| Action                   	| Paramètre                                        	| Retour 	|
|-------------	|---------	|--------------------------	|--------------------------------------------------	|--------	|
| /guest      	| GET     	| Récupère tous les guests 	|                                                  	| json   	|
| /guest      	| POST    	| Ajoute un guest          	| firstname, lastname, email, isPaid, categorie_id 	| json   	|
| /guest/{id] 	| GET     	| Rècupère le guest {id}   	|                                                  	| json   	|
| /guest/{id} 	| PUT     	| Modifie le guest {id}    	| firstname, lastname, email, isPaid, categorie_id 	| json     	|

## Authentification

L'API utilise la méthode Basic Auth pour gérer les utilisateurs qui y ont accés.