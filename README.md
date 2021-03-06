# BlogLaravel

## Résumé
Blog d'articles réalisé avec le framework PHP [*"Laravel"*](https://laravel.com/) dans le cadre d'une UE Web Serveur.  
Site simpliste pour permettre la découverte du framework. Avec l'ajout de fonctionnalités selon notre choix.

## Guide d'installation

### Base Projet
1. Cloner ce répertoire `git clone url`
2. `composer update`
3. Linux : `sudo apt-get install php-curl`
3. Windows : Download le fichier [*"cacert.pem"*](https://curl.haxx.se/docs/caextract.html)
    1. Déplacer ce fichier dans votre répertoire PHP :  
    Si Wamp -> `pathWamp\bin\php\phpVersion\extras\ssl\cacert.pem`  
    Sinon -> `php\phpVersion\extras\ssl\cacert.pem`
    2. Modifier et Décommenter la ligne du fichier *php.ini* avec ce path:  
    ```
    [curl]
    curl.cainfo = "yourPath" 
    ```
    3. Décommenter la ligne du fichier *php.ini* :  
    `extension=php_curl.dll`
4. `php artisan config:clear` et `php artisan cache:clear`
5. `php artisan migrate --seed`
6. Si problème avec le seeding : `composer dump-autoload` et `php artisan migrate:fresh --seed`
7. `php artisan serve`
8. `http://127.0.0.1:8000`

### BotMan
#### Requis Techniques
* PHP >= 7.1.3

## Guide d'utilisation

Sur ce projet, il vous sera demandé de créer, au minimum, un compte. Vous pourrez utiliser une fausse adresse email mais utilisez un nom correct, pour une bonne expérience. Tous les boutons présents sur nos pages sont fonctionnels.  
Enjoy !

* Utilisation générale -> Fonctionnelle :
    * Page Principale (Home)
    * Page Articles / Page détail Article
    * Page Contact
    * Page Web Chat
    * BlogBot Widget

#### Utilisation Page Home :
1. Affiche les derniers articles
2. Cliquer sur un lien d'article -> redirection vers page détail Article
3. Lire l'article et les commentaires
4. Ajouter un commentaire avec le formulaire
5. Envoyer et vérifier l'ajout (présence du commentaire)

#### Utilisation Page Articles :
1. Affiche tous les articles présents

#### Utilisation Page Contact :
1. Affiche un formulaire de contact
2. Remplir les infos demandées
3. Envoyer -> redirection vers page de confirmation d'envoi

#### Utilisation Page Web Chat :
1. Ouvrir 2 fenêtres (1 normale, 1 privée)
2. S'enregistrer sur ces 2 fenêtres -> 2 comptes différents
3. Ouvrir la page Web Chat sur chaque et disposer les fenêtres côte à côte
4. Vérifier la présence des 2 personnes (Espace Users)
5. Commencer à discuter + envoi en temps réel

#### Utilisation du BotMan Widget :
1. Cliquer sur l'afficheur en bas à droite
2. Entrer une des commandes ci-dessous
3. Suivre les indications/directives

### Commande de BlogBot

Commande | Fonction
------------ | -------------
hello / bonjour | Salut le Bot
conversation | Créer une conversation avec le Bot
note | Surprise
help | Demande de l'aide au Bot

## Fonctionnalités implémentées

* [x] Ajout d'un système de commentaire :
    * Respect de l'architecture MVC
    * Commentaires aléatoires générés par "seeding"
    * Possibilité d'ajouter un commentaire via formulaire
* [x] WebChat avec Pusher et Vue.js
* [x] Bot Widget avec Framework PHP de ChatBot "BotMan"

## Remarques

* (Nicolas) Pour l'implémentation du Chat Web, je me suis précipité sur le développement de la fonctionnalité du coup j'ai codé sans vraiment comprendre le processus (implémentation, affichage, connexion avec Pusher, etc..). D'où le fait que ma branche sur Github est très désordonnée/flou. Après une période de réflexion et apprentissage, le codage a été plus rapide est plus compréhensif.
* (Nicolas) A la fin du développement de cette fonctionnalité, la connexion avec le serveur Pusher n'était pas fonctionnelle, j'ai dû ajouter le fichier "cacert.pem" dans mon dossier php.

> Ajout de ce fichier au dossier php de notre version de developpement (ici php 7.1.9 pour moi) + modification du fichier php.ini comme demandé plus haut (installation)

* (Nicolas) Développement Bonus d'un bot avec le Framework PHP [*"Botman"*](https://botman.io/), utilisation du driver web (possibilité d'utiliser le driver Facebook, Telegram, Slack ...). Le bot n'est pas très développé, il s'agit d'un test pour voir l'étendue des possibles (livré avec ses commandes).
* (Nicolas) Pour la fonctionnalité d'aide par le Bot, le rendu final est lien. Le résultat final voulu serait une redirection automatique par le Bot vers cedit lien.
* (Nicolas) Pour la conversation avec le Bot, le rendu final est un résumé des données envoyé durant la discussion. Le résultat final voulu serait un lien avec la BDD et la création/modification/suppression d'un utilisateur, servant d'un autre moyen pour s'enregistrer par exemple.
* (Nicolas) Lors de l'installation des dependencies (composer update), affichage d'une erreur non bloquante "Ambigous class x".
* (Robin) Développement d'un système de commentaires simple et fonctionnel. 
* (Robin) Le système de commentaires m'a demandé une bonne compréhension de l'architecure MVC (nouvelle pour moi) il m'a fallut de nombreux essais/erreurs pour avoir un système fonctionnel.