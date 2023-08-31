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

### Création d'une nouvelle page avec paramètres

```php
###
    // création d'une nouvelle route
    #[Route('/page/{id}', // on ajoute une variable dans l'url page
        name: 'page', // on nomme la route page
        requirements: ['id' => '\d+'], // id doit être un nombre
        methods: ['GET'], // on précise que la route n'accepte que les
        // requêtes GET
    )]
    // lien de l'attribut avec la méthode page
    public function page(int $id): Response
    {
        return $this->render('public/page.html.twig', [
            'controller_name' => 'PublicController',
            'id' => $id
        ]);
    }
###
```

Visible à l'URL

https://localhost:8000/page/1

#### Création d'un template

Dans le contrôleur, on précise le nom du template à utiliser

```php
###
public function page(int $id): Response
    {
        // on retourne le rendu de la page page.html.twig
        // en lui passant les variables twigid et contenant l'id
        return $this->render('public/page.html.twig', [
            'twigid' => $id,
        ]);
    }
###
```

Création de `templates/template.html.twig`

```twig
{# Ce template est étendu de base.html.twig #}
{% extends 'base.html.twig' %}

{% block title %}Symfony6{% endblock %}
###
{# On définit un block body pour pouvoir le diviser en plusieurs blocks #}
{% block body %}
{# On définit un block top DANS qui sera affiché avant le contenu #}
{% block top %}
    {# bare de navigation DANS top #}
    {% block nav %}{% endblock %}
    {% block header %}{% endblock %}
{% endblock %}
{% block content %}{% endblock %}
{% block footer %}{% endblock %}
{% endblock %}
```

Création du template `templates/public/page.html.twig`

```twig
{# on étend notre tamplate #}
{% extends 'template.html.twig' %}
{% block title %}{{ parent() }} | Page : {{ twigid }}{% endblock %}
{% block nav %}
    <div class="nav">
        {# utilisation de path pour les routes #}
        <a href="{{ path('homepage') }}">Accueil</a>
        {# utilisation de path avec paramètre #}
        <a href="{{ path('page', {'id': 1}) }}">Page 1</a>
        <a href="{{ path('page', {'id': 2}) }}">Page 2</a>
        <a href="{{ path('page', {'id': 3}) }}">Page 3</a>
    </div>
{% endblock %}
```

####


### Dans .env

création d'un chemin vers la base de données

```dotenv
DATABASE_URL="mysql://root:@127.0.0.1:3307/sym6?serverVersion=10.6.5-MariaDB&charset=utf8mb4"
```

### Création de la DB

```bash
symfony console doctrine:database:create
```
