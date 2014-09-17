# Sécurité

## API Rest

### Authentification

L'API utilise la méthode Basic Auth pour gérer les utilisateurs qui y ont accés.
L'utilisateur de l'API a un rôle **api**.

Les utilisateurs sont enregistrés dans la base de données et peuvent être géré depuis le panel Admin.

Il est conseillé de changer le mot de passe par defaut des utilisateurs après la mise en ligne de l'application.

### Sécurité

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

### Accès à l'API

Voici un exemple de JavaScript pour s'authentifier à l'API :

    var api_url = "http://localhost/jdn2014/app/api/laravel/public/v1/";
    var username = "apiuser1";
    var password = "gogogo";
    var api_key = btoa(username + ":" + password);


    //login api
    $.ajax({
        url: api_url+"categorie/1",
        type: 'get',
        //username: username,
        //password: password,
        headers: {
           "Authorization": "Basic " + api_key
        },
        success: function()
        {
          //code de l'application
        }
    });

Pour plus de sécurité et ne pas avoir l'username et le password dans le code, on peut juste remplacer `api_key` par sa valeur en générant un requête avec Postman par exemple et en récupérant simplement le token du Basic Auth.

## Panel admin

Pour accéder au panel d'adminstration, il faut disposer d'un compte utilisateur disposant du rôle **admin**.

Il est conseillé de changer le mot de passe par defaut des utilisateurs après la mise en ligne de l'application.

## Comptes utilisateurs par défaut

Voici les comptes utilisateurs par défaut dans la base de données lors d'une nouvelle installation de l'application :

    User::create(array(
      'username' => 'adminjdn',
      'password' => 'jdnadmindede',
      'email'    => 'dede@example.com',
      'role'     => 'admin'
    ));

    User::create(array(
      'username' => 'apiuser1',
      'password' => 'gogogo',
      'email'    => 'roo@example.com',
      'role'     => 'api'
    ));

Soit pour le panel Admin `http://localhost/jdn2014/app/api/laravel/public/admin` :

* utilisateur : adminjdn
* mot de passe : jdnadmindede

Soit pour l'api `http://localhost/jdn2014/app/api/laravel/public/v1` :

* utilisateur : apiuser1
* mot de passe : gogogo