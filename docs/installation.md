# Installation de l'application


## Prérequis

* Gestionnaire de dépendance php pour Laravel : [composer](https://getcomposer.org/download/)

Pour la doc :

* Python 2.7.x + pip 1.5.x et Mkdocs : [MkDocs](http://www.mkdocs.org/)

Pour le dev :

* NodeJs (pour Grunt) : [NodeJs](http://nodejs.org/)
* WAMP/LAMP/MAMP avec bdd MySQL
* Postman pour tester l'API rest : [Postman](http://www.getpostman.com/)

## 1. Installation des dépendances php

Dans le dossier de laravel : `app/api/laravel`, ouvrir une console et entrer :

    composer.phar install

## 2. Installation de la base de données

* configurer la connexion dans `laravel/app/config/database.php`
* Créer les tables : dans le dossier de laravel : `app/api/laravel`, ouvrir une console et entrer : `php artisan migrate`
* Créer les données de base : dans le dossier de laravel : `app/api/laravel`, ouvrir une console et entrer : `php artisan db:seed`

## 3. Version de production : distribuable 

Pour générer le dist, il faut au préalable avoir installé les modules avec `npm update` puis executer la commande :

    grunt build

Un dossier `dist` sera créé avec l'application prête à être déployée sur un serveur (css et js minifiés, optimisation des images, ...).