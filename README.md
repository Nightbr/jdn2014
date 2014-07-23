JDN app
====================

1. Installer le projet :
---------------------------------

    grunt install
    bower install

2. Lancer un serveur :
--------------------------------

    grunt serve


3. Dev note :
-----------------------------

1 - Basic Auth ne fonctionne pas avec le module grunt-php...
    Il faut donc utiliser un serveur php de dev (WAMP, MAMP, LAMP, ...)
    Pour être sûre de ne pas avoir d'erreur lors de l'authentification :
    Invalid credentials
    Solution alternative à chercher...

2 - Pour tester l'API REST, utiliser (POSTMAN)[http://www.getpostman.com/] uniquement sur Chrome

Laravel :
-----------------------------

1 - Pour voir la table de routage de l'appli :

    php artisan route