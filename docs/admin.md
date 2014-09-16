# Panel d'administration

Voici la liste des actions réalisables avec le panel d'administration de l'application JdnApp.

## Localisation du panel

Le panel se situe à l'adresse `api/laravel/public/admin`.

## Accés au panel

Pour accéder au panel d'adminstration, il faut disposer d'un compte utilisateur disposant du rôle **admin**.

Pour avoir les comptes par défaut, se réferrer à la partie [Sécurité](security.md).

![paneladmin](/img/admin.jpg)

## Fonctionnalités du panel

Pour chaque service, il est possible de réaliser les fonctions CRUD de base :

* Affichage des données présentes dans la base de données
* Création d'un service ( l'ensemble des informations de ce service sont demandées)
* Modification d'un service ( seules les informations à changer sont demandées)
* Suppression d'un service.

Il est également possible de filtrer et trier l'affichage, selon les critéres affichés.

## Service Categories

Les Categories correspondent aux différentes années à l'école (promo L1, promo L2, ... promo 2014).

Toutes les informations de chaque Categorie sont affichées.

## Service Tables

Les Tables correspondent aux tables pour faciliter la création du plan de table.

Toutes les informations de chaque Tables sont affichées.

## Service Guests

Les Guests correspondent aux invités qui se sont inscrit pour la jdn.

Les informations sur la date de création et de modification ne sont pas affichés dans le panel d'administration.

## Service Users

Les Users correspondent aux utilisateurs qui peuvent accéder à l'application (API ou panel administration).

Seules les informations Username, Role, date de création et de modification sont affichées.

le role `admin` donne accès au panel admin et le role `api` donne accès à l'API.

Il est conseillé de changer le mot de passe par defaut des utilisateurs après la mise en ligne de l'application.