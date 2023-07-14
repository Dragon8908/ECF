Pour installer le projet en local et le lancer sur sa machine:

1) Télécharger ou cloner le dépôt
2) Avoir composer installé avec au moins la version 2, php à la version 8 au moins et avoir XAMPP, MAMPP ou WAMPP d'installé
3) Faire un composer update pour récuperer les dépendances
4) Dans le fichier .env modifier #DATABASE_URL et #MAILER_DSN si besoin
5) Créer la base de données avec php bin/console doctrine:database:create et faire les migrations avec php bin/console doctrine:migrations:diff et php bin/console doctrine:migrations:migrate
6) Ajouter les données avec  php bin/console doctrine:fixtures:load
7) Lancer le serveur avec symfony serve
