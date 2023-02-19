"ECF - Le Quai Antique" 

Exécution en local :
    
    Le projet est coder en PHP:7.4, HTML5, CSS3.
    La communication avec la database se fait grace à PHP:PDO.
    Un serveur local est nécéssaire pour le fonctionnement de ce projet.
        XAMPP regroupera le serveur web ainsi que le serveur PhpMyAdmin pour la gestion BDD en mySQL.
        Clonez ce dépot dans le dossier htdocs de XAMPP.
    
    Depuis votre IDE :
    1 - Ouvrez le fichier 'confDB.php' et modifiez les constantes en fonction de votre environnement.
    2 - Assurez vous d'avoir un interpreteur PHP associé à votre IDE.
    3 - Ouvrez le fichier 'installLocalDB.php' pour lancer une interprétation.
            'Database successfully installed' s'affiche dans le terminal.
            La base de données est créer en local et vous permet d'utiliser la solution.
    Si une erreur survient, un fichier 'dblogs.log' se trouve dans le dossier 'db'.

En local, comme en distant, 3 utilisateur sont créer en base de données pour vous permettre de tester les différents 
paramètres.

    Administrateur
    e-mail : admin@lqa.fr
    mdp : 0202

    Client 1
    e-mail : gerard@dpd.fr
    mdp : 0202

    client 2
    e-mail : jean@mtl.fr
    mdp : 0202

Ces utilisateurs sont créer pour vous permettre de vérifier la complétion du formulaire de réservation ainsi que la 
récupération de leurs données pour l'affichage des réservations en page 'paramètres/réservations'.

Des réservations sont également insérées en BDD en date du 16 Février 2023 dans le but de controler la limite de clients
par service.