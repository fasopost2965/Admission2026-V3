# 🎓 Système d'Inscription École La Victoire 2026

Un système d'inscription en ligne moderne et complet pour l'École La Victoire, développé avec Laravel et Blade.

## ✨ Fonctionnalités

### 📋 Processus d'Inscription en 7 Étapes
1. **Type d'inscription** - Nouvelle inscription ou réinscription
2. **Informations élève** - Données personnelles et académiques
3. **Informations parents** - Données des parents et contacts d'urgence
4. **Informations médicales** - Antécédents médicaux et régimes alimentaires
5. **Fournitures scolaires** - Sélection et gestion des fournitures
6. **Récapitulatif** - Vérification et validation des données
7. **Validation finale** - Confirmation et finalisation

### 🎨 Interface Utilisateur
- **Design moderne** avec identité visuelle École La Victoire
- **Interface bilingue** français/arabe
- **Responsive design** adapté mobile et desktop
- **Stepper interactif** avec progression visuelle
- **Auto-sauvegarde** des données en temps réel

### 🔧 Fonctionnalités Techniques
- **Validation temps réel** des formulaires
- **Gestion des sessions** et données temporaires
- **Upload de photos** pour les élèves
- **Génération d'attestations** PDF
- **Système de recherche** et statistiques
- **Gestion des fournitures** par niveau

## 🚀 Installation

### Prérequis
- PHP 8.1+
- Composer
- MySQL/MariaDB
- Node.js & NPM

### Étapes d'installation

1. **Cloner le repository**
```bash
git clone https://github.com/votre-username/Admission2026-V3.git
cd Admission2026-V3
```

2. **Installer les dépendances PHP**
```bash
composer install
```

3. **Installer les dépendances Node.js**
```bash
npm install
```

4. **Configurer l'environnement**
```bash
cp .env.example .env
php artisan key:generate
```

5. **Configurer la base de données**
```bash
# Modifier .env avec vos paramètres de base de données
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=admission2026
DB_USERNAME=root
DB_PASSWORD=
```

6. **Exécuter les migrations**
```bash
php artisan migrate
```

7. **Créer le lien symbolique pour le stockage**
```bash
php artisan storage:link
```

8. **Lancer le serveur de développement**
```bash
php artisan serve
```

9. **Compiler les assets (optionnel)**
```bash
npm run dev
```

## 📁 Structure du Projet

```
Admission2026-V3/
├── app/
│   ├── Http/Controllers/
│   │   ├── InscriptionController.php    # Contrôleur principal
│   │   └── Auth/                        # Contrôleurs d'authentification
│   ├── Models/
│   │   ├── Inscription.php              # Modèle inscription
│   │   ├── Eleve.php                    # Modèle élève
│   │   ├── ParentEleve.php              # Modèle parent
│   │   └── Fourniture.php               # Modèle fourniture
│   └── Services/
│       └── InscriptionService.php       # Service métier
├── database/
│   ├── migrations/                      # Migrations de base de données
│   └── seeders/                         # Seeders pour les données de test
├── resources/
│   └── views/
│       └── inscriptions/                # Vues Blade des étapes
│           ├── step1-type.blade.php
│           ├── step2-eleve.blade.php
│           ├── step3-parents.blade.php
│           ├── step4-medical.blade.php
│           ├── step5-fournitures.blade.php
│           ├── step6-recapitulatif.blade.php
│           └── step7-validation.blade.php
└── routes/
    └── web.php                          # Routes d'inscription
```

## 🎯 Utilisation

### Accès au système
- **URL principale** : `http://localhost:8000/inscription`
- **Étape 1** : Sélection du type d'inscription
- **Navigation** : Utilisez les boutons "Précédent" et "Suivant"

### Fonctionnalités principales
- **Auto-sauvegarde** : Les données sont sauvegardées automatiquement
- **Validation** : Chaque étape valide les données avant de continuer
- **Retour** : Possibilité de revenir aux étapes précédentes
- **Récapitulatif** : Vérification complète avant validation finale

## 🔧 Configuration

### Variables d'environnement importantes
```env
APP_NAME="École La Victoire"
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=admission2026
DB_USERNAME=root
DB_PASSWORD=

MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="inscription@ecolelavictoire.com"
MAIL_FROM_NAME="${APP_NAME}"
```

### Configuration de l'école
Le fichier `config/ecole.php` contient les paramètres spécifiques à l'école :
- Niveaux scolaires
- Fournitures par niveau
- Frais de scolarité
- Paramètres de validation

## 🧪 Tests

```bash
# Lancer tous les tests
php artisan test

# Tests spécifiques
php artisan test --filter=InscriptionTest
```

## 📊 Base de Données

### Tables principales
- **inscriptions** : Données principales des inscriptions
- **eleves** : Informations des élèves
- **parent_eleves** : Informations des parents
- **fournitures** : Gestion des fournitures scolaires
- **users** : Utilisateurs administrateurs

### Relations
- Une inscription → Un élève
- Une inscription → Plusieurs parents
- Une inscription → Plusieurs fournitures

## 🎨 Personnalisation

### Couleurs de l'école
Les couleurs principales sont définies dans les vues CSS :
- **Bleu principal** : `#003C71`
- **Bleu accent** : `#0069FF`
- **Or scolaire** : `#FFD700`
- **Vert succès** : `#10B981`

### Modification du design
1. Modifiez les fichiers CSS dans les vues Blade
2. Ajustez les couleurs dans les variables CSS
3. Personnalisez les icônes FontAwesome

## 🚀 Déploiement

### Production
1. **Configurer l'environnement de production**
2. **Optimiser les performances**
```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```
3. **Configurer le serveur web** (Apache/Nginx)
4. **Configurer SSL** pour la sécurité

### Hébergement recommandé
- **Serveur VPS** avec PHP 8.1+
- **Base de données MySQL** 8.0+
- **SSL certificate** obligatoire
- **Backup automatique** des données

## 🤝 Contribution

1. Fork le projet
2. Créer une branche feature (`git checkout -b feature/AmazingFeature`)
3. Commit les changements (`git commit -m 'Add some AmazingFeature'`)
4. Push vers la branche (`git push origin feature/AmazingFeature`)
5. Ouvrir une Pull Request

## 📝 Licence

Ce projet est développé pour l'École La Victoire. Tous droits réservés.

## 📞 Support

Pour toute question ou support :
- **Email** : support@ecolelavictoire.com
- **Téléphone** : +212 XXX XXX XXX
- **Adresse** : École La Victoire, Maroc

---

**Développé avec ❤️ pour l'École La Victoire** 