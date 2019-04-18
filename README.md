# BlogLaravel

## Résumé
Blog d'articles réalisé avec le framework PHP [*"Laravel"*](https://laravel.com/) dans le cadre d'une UE Web Serveur. Site simpliste pour permettre la découverte du framework.


## Guide d'installation

**A faire**


### Commande de BlogBot

Commande | Fonction
------------ | -------------
hello / bonjour | Salut le Bot
conversation | Créer une conversation avec le Bot
note | Surprise
help | Demande de l'aide au Bot

## Fonctionnalités implémentées

* [x] WebChat avec Pusher et Vue.js (Nicolas)
* [x] Bot Widget avec Framework PHP de ChatBot "BotMan" (Nicolas)
* Ajout de Commentaires (Robin)

## Remarques

* (Nicolas) Pour l'implémentation du Chat Web, je me suis précipité sur le développement de la fonctionnalité du coup j'ai codé sans vraiment comprendre le processus (implémentation, affichage, connexion avec Pusher, etc..). D'où le fait que ma branche sur Github est très désordonnée/flou. Après une période de réflexion et apprentissage, le codage a été plus rapide est plus compréhensif.
* (Nicolas) A la fin du développement de cette fonctionnalité, la connexion avec Pusher n'était pas fonctionnelle, j'ai dû ajouter le fichier "cacert.pem" dans mon dossier php.

> Ajout de ce fichier au dossier php de notre version de developpement (ici php 7.1.9 pour moi) + modification du fichier php.ini avec cette commande

```
[curl]
curl.cainfo = "pathWamp\bin\php\php7.1.9\extras\ssl\cacert.pem" 
```

* (Nicolas) Développement Bonus d'un bot avec le Framework PHP [*"Botman"*](https://botman.io/), utilisation du driver web (possibilité d'utiliser le driver Facebook, Telegram, Slack ...). Le bot n'est pas très développé, il s'agit d'un test pour voir l'étendue des possibles (livré avec ses commandes).
* (Nicolas) Pour la fonctionnalité d'aide par le Bot, le rendu final est lien. Le résultat final voulu serait une redirection automatique par le Bot vers cedit lien.
* (Nicolas) Pour la conversation avec le Bot, le rendu final est un résumé des données envoyé durant la discussion. Le résultat final voulu serait un lien avec la BDD et la création/modification/suppression d'un utilisateur, servant d'un autre moyen pour s'enregistrer par exemple.