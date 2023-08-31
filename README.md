# Symfony6

## Installation

```bash
symfony new Symfony6 --webapp
cd Symfony6
```

On vérifie la stabilité de la version de symfony et de ses composants

```bash
symfony check:security
```

Si cette commande renvoie des erreurs, on peut les corriger avec
    
```bash
composer update
```

On peut ensuite lancer le serveur web

```bash
symfony serve -d
# ou
symfony server:start -d
```

### Création d'un controller

```bash
symfony console make:controller
```

Création de
- src/Controller/PublicController.php
- templates/public/index.html.twig

On peut accéder au contrôleur à cette adresse: 

https://localhost:8000/public

#### Affichage des routes

```bash
php bin/console debug:router
```

#### Changement de route

Dans le fichier `src/Controller/PublicController.php`

```php  
###
    #[Route('/', name: 'homepage')]
    public function index(): Response
###
```

L'url devient: https://localhost:8000/

