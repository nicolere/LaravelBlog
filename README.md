# BlogLaravel

##Résumé
Blog d'articles réalisé avec le framework PHP [*"Laravel"*](https://laravel.com/) dans le cadre d'une UE Web Serveur. Site simpliste pour permettre la découverte du framework.


## Guide d'installation


## Fonctionnalités implémentées

* [x] WebChat avec Pusher et Vue.js (Nicolas)
* Ajout de Commentaires (Robin)

## Remarques

* Pour l'implémentation du Chat Web, je me suis précipité sur le développement de la fonctionnalité du coup j'ai codé sans vraiment comprendre le processus (implémentation, affichage, connexion avec Pusher, etc..). D'où le fait que ma branche sur Github est très désordonnée/flou. Après une période de réflexion et apprentissage, le codage a été plus rapide est plus compréhensif.
* Ensuite à la fin du développement de la fonctionnalité, la connexion avec Pusher n'était pas fonctionnelle, j'ai dû ajouter le fichier "cacert.pem" dans mon dossier php.

> Ajout de ce fichier au dossier php de notre version de developpement (ici php 7.1.9 pour moi) + modification du fichier php.ini avec cette commande

```
[curl]
curl.cainfo = "pathWamp\bin\php\php7.1.9\extras\ssl\cacert.pem" 
```
