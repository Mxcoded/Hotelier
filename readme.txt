a propos : application web de présentation de la vie scolaire de l'ESI. 
il s'agit spécifiquement de permettre aux enseignants, aux étudiants de publier des activités ou des annonces qui a un rapport avec la vocation de l'ESI.
Cette plateforme permettrait aussi aux cordonateurs des différentes promotion de publier les programmes de cours afin de 
permettre aux enseignants et étudiants d'avoir des informations precises.

// mettre en marche l'application
1 dezipper l'application,
2 creer la base de donnees et faite la configiration dans le fichier .env
3 tapper les commande suivantes :
                                composer install
                                composer update
                                php artisan migrate --seed
                                php artisan key:generate


4 et lancer le serveur par cette commande : php artisan serve

