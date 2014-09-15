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
| /categorie/{id}/guest | GET   | Récupère les guests de la catégorie {id} |                | json      |
| /categorie/{id}   | DELETE    | Supprime la catégorie {id}        |                       | json      |

-----------------

Exemple de retour json :

    GET api/laravel/public/v1/categorie/1

    {"error":false,"categorie":[{"id":1,"title":"test","isInternal":0}]}

    PUT api/laravel/public/v1/categorie/1?isInternal=sqdq

    {"error":true,"messages":{"isInternal":["validation.boolean"]}}


## Service Tables

Les Tables correspondent aux tables pour faciliter la création du plan de table.

voici les requêtes http pour récupérer/modifier une ou plusieurs Tables.

| URI           | Méthode   | Action                    | Paramètre                                         | Retour    |
|-------------  |---------  |-------------------------- |-------------------------------------------------- |--------   |
| /table        | GET       | Récupère tous les tables  |                                                   | json      |
| /table        | POST      | Ajoute une table          | title, max_chairs, is_Full                        | json      |
| /table/{id]   | GET       | Rècupère le table {id}    |                                                   | json      |
| /table/{id}   | PUT       | Modifie la table {id}     | title, max_chairs, is_Full                        | json      |
| /table/{id]   | DELETE    | Supprime la table {id}    |                                                   | json      |


## Service Guests

Les Guests correspondent aux invités qui se sont inscrit pour la jdn.

voici les requêtes http pour récupérer/modifier un ou plusieurs Guests.

| URI         	| Méthode 	| Action                   	| Paramètre                                        	| Retour 	|
|-------------	|---------	|--------------------------	|--------------------------------------------------	|--------	|
| /guest      	| GET     	| Récupère tous les guests 	|                                                  	| json   	|
| /guest      	| POST    	| Ajoute un guest          	| firstname, lastname, email, isPaid, categorie_id 	| json   	|
| /guest/{id] 	| GET     	| Rècupère le guest {id}   	|                                                  	| json   	|
| /guest/{id} 	| PUT     	| Modifie le guest {id}    	| firstname, lastname, email, isPaid, categorie_id 	| json     	|
| /guest/{id]   | DELETE    | Supprime le guest {id}    |                                                   | json      |


## Authentification

L'API utilise la méthode Basic Auth pour gérer les utilisateurs qui y ont accés.
L'utilisateur de l'API a un rôle **api**

## Sécurité

Il se trouve que toutes les actions ne sont pas possible pour des raisons de sécurités. En effet, il n'est pas possible de supprimer une catégorie ou un guest depuis l'API, on doit passer par le panel Admin.

Mais on peut choisir ce qu'on souhaite avoir comme action via le fichier `routes.php` qui se trouve dans le dossier `api/laravel/app` :

    /* Groupe de routes pour le versioning d'API */
    Route::group(array('prefix' => 'v1', 'before' => 'auth.basic'), function()
    {
        Route::resource('categorie', 'CategorieController', array('only' => array('index', 'show', 'showGuest')));
        Route::get("categorie/{id}/guest", array("uses" => "CategorieController@showGuest"));
        Route::resource('table', 'TableController', array('only' => array('index', 'show', 'showGuest')));
        Route::get("table/{id}/guest", array("uses" => "TableController@showGuest"));
        Route::resource('guest', 'GuestController', array('only' => array('index', 'show', 'store')));
    });


Grâce au paramètre `only` on peut définir un tableau avec les actions voulues.