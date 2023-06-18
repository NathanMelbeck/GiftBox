# GiftBox

ALEXANDRE Romain | MELBECK Nathan | BONIN Lucas

https://github.com/NathanMelbeck/GiftBox

Pour pouvoir installer le projet, suivez les étapes ci-dessous :

1. Clonez le projet depuis le dépôt git.
2. Créez un fichier `.env` à la racine du projet avec les informations requises suivantes :
   - `DB_ROOT_PASSWORD` : Mot de passe root de la base de données.
   - `DB_USER_NAME` : Nom d'utilisateur de la base de données.
   - `DB_USER_PASSWORD` : Mot de passe de l'utilisateur de la base de données.
   - `DB_NAME` : Nom de la base de données.
3. Créez un fichier `.ini` en utilisant la structure du fichier `.dist` situé dans le répertoire `gift.appli/src/conf/gift.db.conf.ini.dist`.
4. 4. Ouvrez le fichier `docker-compose.yml` présent dans le projet et exécutez-le.
5. Connectez-vous à la base de données en utilisant le port spécifié dans le fichier `docker-compose.yml`.
6. Importez les fichiers présents dans le dossier `sql` dans la base de données.
7. Une fois ces étapes terminées, vous pouvez accéder au projet via le port spécifié dans le docker-compose.


