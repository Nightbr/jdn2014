# API REST

Voici la liste compète des services qu'offre l'API REST de l'application JdnApp.

## localisation de l'API

L'api se situe à l'adresse `api/laravel/public/v1/`

## Service Categories

Les catégories correspondent aux différentes années à l'école (promo L1, promo L2, ... promo 2014).

voici les requêtes http pour récuperer/modifier une ou plusieurs catégories.

| URI               | Méthode   | action                            | Paramètre             | Retour    |
|-----------------  |---------  |--------------------------------   |-------------------    |--------   |
| /categorie        | GET       | récupère toutes les catégories    |                       | json      |
| /categorie        | POST      | Ajoute une catégorie              | title, isInternal     | json      |
| /categorie/{id}   | PUT       | Modifie la catégorie {id}         | title, isInternal     | json      |
