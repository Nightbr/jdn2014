# Application jdnApp

Application développé pour organiser la Just Diplomed Night à l'IG2I.
Développeur :
    
* Titouan BENOIT - titouan.benoit@ig2i.fr
* Gaetan DELBART - gaetan.delbart@ig2i.fr

## 1. Installer le projet

    grunt install
    bower install

## 2. Lancer un serveur

    grunt serve

Note Importante : Sachant que le Basic Auth ne fonctionne pas avec php CGI utilisé par le module grunt-php, il faut mettre l'ensemble du projet dans un environnement de dev (WAMP, MAMP, LAMP, ...). Et du coup, plus besoin d'utiliser le grunt serve.

On ne se servira de grunt uniquement pour générer le dist, effectuer les tests, compiler le sass, ...

## 3. Dev note

1. Basic Auth ne fonctionne pas avec le module grunt-php... Il faut donc utiliser un serveur php de dev (WAMP, MAMP, LAMP, ...) Pour être sûre de ne pas avoir d'erreur lors de l'authentification : Invalid credentials Solution alternative à chercher...

2. Pour tester l'API REST, utiliser [POSTMAN](http://www.getpostman.com/) uniquement sur Chrome

## 4. Laravel

1. Pour voir la table de routage de l'appli :

    `php artisan route`

2. Pour installer la base de donnée :

    * configurer la connexion dans laravel/app/config/database.php
    * Créer les tables `php artisan migrate`
    * Créer les jeux de test `php artisan db:seed`

## 5. Compilation de la documentation

Soit vous pouvez visualiser les fichiers dans le dossier Docs/.
Soit vous pouvez compiler la documentation avec [MkDocs](http://www.mkdocs.org/)

1. Installer Python 2.7 et Pip 1.5
2. Installer MkDocs : `pip install mkdocs`
3. Compiler la doc : `mkdocs build` ou visualiser la doc : `mkdocs serve` à l'adresse http://localhost:8000