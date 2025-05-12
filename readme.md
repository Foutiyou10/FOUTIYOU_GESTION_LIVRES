

##INSTALLATION 

- Installer PHP
- Installer Composer
- Installer Laravel
- Créer un nouveau projet Laravel
- Ouvrir le projet avec Visual Studio Code (VS Code)
- Lancer l'application dans le navigateur

---


## Étape 1 : Installer Homebrew (gestionnaire de paquets)

Homebrew permet d’installer facilement PHP, Composer, etc.

```bash
/bin/bash -c "$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/HEAD/install.sh)"
```

Une fois installé, ajoute Homebrew au PATH (si demandé dans le terminal) puis vérifie :

```bash
brew --version
```

---

## Étape 2 : Installer PHP

Laravel nécessite PHP >= 8.1. Installe-le via Homebrew :

```bash
brew install php
```

Vérifie l’installation :

```bash
php -v
```

Exemple attendu : `PHP 8.2.x`

---

## Étape 3 : Installer Composer

Composer est le gestionnaire de dépendances PHP, essentiel pour Laravel.

```bash
brew install composer
```

Vérifie :

```bash
composer --version
```

---

##  Étape 4 : Installer Laravel (globalement)

Installer le **CLI Laravel** permet de créer de nouveaux projets facilement :

```bash
composer global require laravel/installer
```

Ajoute le chemin à ton fichier de configuration shell :

```bash
export PATH="$HOME/.composer/vendor/bin:$PATH"
```

ou (sur macOS plus récent avec zsh) :

```bash
export PATH="$HOME/.config/composer/vendor/bin:$PATH"
```

Ajoute-le dans ton fichier `~/.zshrc` ou `~/.bash_profile`, puis :

```bash
source ~/.zshrc
```

Teste :

```bash
laravel --version
```

---

## Étape 5 : Créer un projet Laravel

Dans le dossier où tu veux créer le projet :

```bash
laravel new mon-projet
```

ou avec Composer :

```bash
composer create-project laravel/laravel mon-projet
```

Une fois terminé :

```bash
cd mon-projet
```

---

## Étape 6 : Ouvrir le projet avec Visual Studio Code

Si VS Code est installé, tu peux ouvrir le projet :

```bash
code .
```

Sinon, installe VS Code depuis : https://code.visualstudio.com

Et ajoute la commande `code` au terminal depuis l’interface VS Code :
`⇧⌘P` → `Shell Command: Install 'code' command in PATH`

---

## Étape 7 : Lancer l’application Laravel

Dans le terminal, depuis le dossier du projet :

```bash
php artisan serve
```

Tu verras un message comme :

```
Starting Laravel development server: http://127.0.0.1:8000
```

---

##  Étape 8 : Accéder à l’interface dans le navigateur

Ouvre ton navigateur (Safari, Chrome, etc.) et visite :

[http://127.0.0.1:8000](http://127.0.0.1:8000)

Tu verras la page d'accueil par défaut de Laravel 🎉



- Le dossier `routes/web.php` contient les routes visibles sur le navigateur.
- Les vues se trouvent dans `resources/views/`.
- Tu peux stopper le serveur avec `Ctrl + C` dans le terminal.



- Créer des contrôleurs : `php artisan make:controller NomController`
- Créer des modèles et migrations : `php artisan make:model Nom -m`
- Travailler avec Blade : `resources/views`

## DESCRIPTION DES TABLES

Table books
Rôle : Elle stocke les informations sur les livres que tu gères dans l’application.

Colonnes :

id : Identifiant unique du livre (clé primaire, générée automatiquement).

title : Titre du livre (obligatoire, chaîne de caractères).

author : Auteur du livre.

description : Texte descriptif du livre, comme un résumé.

published_at : Date de publication.

created_at et updated_at : Gérés automatiquement par Laravel pour le suivi des créations et modifications.

Table users
Rôle : Elle contient les informations des utilisateurs (même si tu ne fais pas encore d’authentification).

Colonnes :

id : Clé primaire unique pour chaque utilisateur.

name : Le nom de l’utilisateur.

email : Email unique de l’utilisateur.

email_verified_at : Timestamp si l’email a été vérifié (optionnel).

password : Mot de passe crypté (requis par Laravel même si non utilisé pour l’instant).

remember_token : Utilisé pour les connexions persistantes (optionnel).

created_at et updated_at : Suivi automatique de la création/modification.

Table reviews
Rôle : Elle permet aux utilisateurs de laisser un avis sur un livre.

Colonnes :

id : Identifiant unique de l’avis.

user_id : Référence vers l’utilisateur qui a laissé l’avis (clé étrangère vers users.id). Ce champ peut être null si tu veux autoriser des avis anonymes ou non connectés.

book_id : Référence vers le livre concerné par l’avis (clé étrangère vers books.id).

username : Nom libre de la personne qui donne son avis (utile si non connecté).

comment : Le texte de l’avis.

created_at et updated_at : Dates de création et de mise à jour.

Relations entre les tables
Un livre (books) peut recevoir plusieurs avis (reviews).

Un utilisateur (users) peut laisser plusieurs avis (reviews), sauf si tu autorises les avis anonymes.

Chaque avis (review) est lié à un seul livre, et éventuellement à un seul utilisateur.


