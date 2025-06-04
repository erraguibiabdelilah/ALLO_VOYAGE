# ALLO VOYAGE

## À propos du projet
**Allo Voyage** est une application web de réservation de voyages en bus qui permet aux utilisateurs de rechercher, réserver et gérer leurs voyages en toute simplicité.

## Prérequis
Pour utiliser ce projet, vous devez avoir installé :
- PHP 8.1 ou supérieur
- Composer
- MySQL ou PhpMyAdmin
- Laravel 10
- Node.js et NPM
- Git

## Installation et Configuration

1. Clonez le dépôt avec HTTPS :
```bash
git clone https://github.com/erraguibiabdelilah/ALLO_VOYAGE.git
```

2. Accédez au répertoire du projet :
```bash
cd ALLO_VOYAGE
```

3. Installez les dépendances PHP avec Composer :
```bash
composer install
```

4. Installez les dépendances JavaScript :
```bash
npm install
```

5. Créez une copie du fichier .env :
```bash
cp .env.example .env
```

6. Configurez votre base de données dans le fichier .env :
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=AloVoyage
DB_USERNAME=root
DB_PASSWORD=
```

7. Générez la clé d'application :
```bash
php artisan key:generate
```

8. Créez la base de données et exécutez les migrations :
```bash
php artisan migrate
```

9. Remplissez la base de données avec les données de test :
```bash
php artisan db:seed
```

10. Démarrez le serveur de développement :
```bash
php artisan serve
```

11. Accédez à l'application dans votre navigateur :
```
http://127.0.0.1:8000
```

## Compte de test
Pour tester l'application, vous pouvez utiliser les identifiants suivants :
```
Email : jhon@gmail.com
Mot de passe : jhon123
```

## Technologies utilisées
- Frontend : HTML5, CSS3, JavaScript, Tailwind CSS
- Backend : PHP (Laravel 10)
- Base de données : MySQL
- Outils : Composer, NPM, Git

## Notes importantes
- Assurez-vous que votre serveur MySQL est en cours d'exécution
- Vérifiez que tous les prérequis sont installés avant de commencer l'installation
- En cas de problème avec les migrations, essayez de rafraîchir la base de données :
```bash
php artisan migrate:fresh --seed
```

## Contribution
Si vous souhaitez contribuer au projet, vous pouvez :
1. Fork le projet
2. Créer une branche pour votre fonctionnalité (`git checkout -b feature/AmazingFeature`)
3. Commiter vos changements (`git commit -m 'Add some AmazingFeature'`)
4. Push vers la branche (`git push origin feature/AmazingFeature`)
5. Ouvrir une Pull Request

## Licence
Ce projet est sous licence MIT. Voir le fichier `LICENSE` pour plus de détails.

## Contact
Si vous avez des questions ou des suggestions, n'hésitez pas à nous contacter :

- Erraguibi Abdelilah - [@LinkedIn](https://www.linkedin.com/in/erraguibi/)
- Belefqih Mohammed - [@LinkedIn](https://www.linkedin.com/in/mohammedbelefqih/) 

Lien du projet : [https://github.com/erraguibiabdelilah/ALLO_VOYAGE](https://github.com/erraguibiabdelilah/ALLO_VOYAGE)