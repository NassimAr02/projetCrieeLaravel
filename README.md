# 🎣 Projet Criée - Vente aux enchères de poissons

Le but de ce projet de groupe est de pouvoir faire de la gestion de projet en méthode agile (nous utiliserons Trello) et déployer une application web.

---

## 🎯 Le but ?

L'application doit permettre de pouvoir se connecter en tant qu'acheteur, administrateur ou bien commissaire de vente. Chacun ayant ses rôles et droits spécifiques.

---

## 👤 L'administrateur

Doit permettre de pouvoir créer une criée comportant plus lots dont l'acheteur pourra enchérir par la suite.  
De plus, il peut insérer de nouvelles données comme recenser des pêches qui ont eu lieu, les bateaux ou bien même le catalogue d'espèces de poissons.

---

## 👨‍⚖️ Le commissaire de vente

Tout comme l'administrateur, le commissaire de vente détient un tableau de bord lui permettant de visionner les criées en cours et ceux à venir.  
La particularité est qu'il puisse démarrer la vente, mettre à jour le statut du lot et de pouvoir gérer de façon extensive les enchères.

---

## 🧑‍💼 L'acheteur

Depuis son interface, l'acheteur peut accéder à une criée, et enchérir sur un lot.  
Si gagnant du lot et que le commissaire de vente clôture l'enchère, l'acheteur pourra donc l'ajouter dans son panier et valider la facture (qui pourra être générée en PDF par la suite).

---

## 💻 Configuration de la machine virtuelle

Importer la machine sur VirtualBox  
Créer un dossier partagé avec le chemin suivant : `C (ou D):\mondossier\www\`

### 🔧 Sur VirtualBox

- Paramètres de la machine virtuelle → Dossiers Partagés  
- Chemin du dossier : `C (ou D):\mondossier\www`  
- Nom du dossier : `www`

### 🚀 Lancer la machine virtuelle

- login : `btssio`  
- mdp : `btssio`

```bash
sudo mount -t vboxsf www /mnt/www
```

---

## ⚙️ Installation du projet

### 1. Téléchargement de Laravel et autres nécessités (Composer, NPM ou node...)

[https://laravel.com/docs/12.x#installing-php](https://laravel.com/docs/12.x#installing-php)

### 2. Cloner le projet dans le dossier partagé

```bash
git clone git@github.com:NassimAr02/projetCrieeLaravel.git
```

### 3. Installer les dépendances

```bash
composer install
npm install
npm run build
```

### 4. Fichier `.env`

Récupérer le fichier `.env` sur le drive puis le placer à la racine du projet.

---

## 🌍 Ouverture du projet

Depuis la machine virtuelle, récupérer l’IP :

```bash
ip a
```

Puis ouvrir l'adresse suivante :

```
http://192.168.xxx.xx/projetCrieeLaravel/public/
```

---

## 🌐 Rappel configuration proxy pour le développement dans le réseau du lycée (Windows)

### 🔗 Pour git

```bash
git config --global http.proxy http://xx.xx.xx.xx:xx/
git config --global https.proxy http://xx.xx.xx.xx:xx/
```

### 🔐 Pour composer

```bash
SET HTTP_PROXY=xx.xx.xx.xx:xx
SET HTTPS_PROXY=xx.xx.xx.xx:xx
```

### 📦 Pour NPM

```bash
npm config set proxy http://xx.xxx.xxx.xxx/
npm config set https-proxy http://xx.xxx.xxx.xxx/
```

### ♻️ Revenir aux paramètres par défaut

```bash
git config --global --unset https.proxy
git config --global --unset http.proxy

set HTTP_PROXY=
set HTTPS_PROXY=

npm config rm proxy
npm config rm https-proxy
```

---

## 📚 About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing)
- [Powerful dependency injection container](https://laravel.com/docs/container)
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent)
- Database agnostic [schema migrations](https://laravel.com/docs/migrations)
- [Robust background job processing](https://laravel.com/docs/queues)
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting)

Laravel is accessible, powerful, and provides tools required for large, robust applications.

### Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript.

### Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

#### Premium Partners

- [Vehikl](https://vehikl.com/)
- [Tighten Co.](https://tighten.co)
- [WebReinvent](https://webreinvent.com/)
- [Kirschbaum Development Group](https://kirschbaumdevelopment.com)
- [64 Robots](https://64robots.com)
- [Curotec](https://www.curotec.com/services/technologies/laravel/)
- [Cyber-Duck](https://cyber-duck.co.uk)
- [DevSquad](https://devsquad.com/hire-laravel-developers)
- [Jump24](https://jump24.co.uk)
- [Redberry](https://redberry.international/laravel/)
- [Active Logic](https://activelogic.com)
- [byte5](https://byte5.de)
- [OP.GG](https://op.gg)

### Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

### Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

### Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

### License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).