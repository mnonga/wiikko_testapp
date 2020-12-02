# Projet de test pour embauche par Michée NONGA

Ce projet contient la partie serveur (API)  

## Configuration de la base des données

Creer un base de données vide nommée **testapp**  

````dotenv
DATABASE_URL=mysql://root:password@127.0.0.1:3306/testapp
````

## Installer les dependances

````
$ composer install
````

## Generer le schema de la BD et seeder les données

```
$ php artisan migrate:fresh --seed
```

## Lancer le serveur:

S'assurer que le port 8000 est libre

````
$ php artisan serve
````

## Identifiant de connexion
```json
{
  "email": "michee@gmail.com",
  "password": "12345678"
}
```

## Executer les tests

````
$ vendor/bin/phpunit
````
