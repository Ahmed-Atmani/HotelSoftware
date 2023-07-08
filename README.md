Hotel reservation software
==========================


Explication des fichiers
------------------------

- Initialisation de la DB
    - **setupDB.php:** Initialise la DB et les tables person, reservations et rooms
    - **fillDB.php:** Remplis la DB avec un échantillon de données

- Initialisation des utilisateurs
    - **setup_users.php:** Initialise la table users dans la DB existante
    - **register.php:** Interface pour ajouter des utilisateurs (admins)

- Interface des utilisateurs
    - **login.php:** Interface login pour les utilisateurs registrés
    - **main_interface:** Interface d'accueil de l'utilisateur

- Interface des réservations
    - **add_reservation.php:** Interface pour ajouter une réservation
    - **show_reservations.php** Interface pour voir les réservations
    - **process_reservation.php:** Fichier qui va ajouter la réservation faite dans *show_reservations.php*


