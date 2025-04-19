# StayMaroc - Plateforme de Location de Propriétés

Projet Fil Rouge – 1ère année Développement Web  
YouCode – Safi | SIMPLON.CO  
Réalisé par : Wassim Yazza  
Encadré par : M. Abid Abdeladim

## 📝 Présentation du projet

**StayMaroc** est une plateforme web destinée à faciliter la location de propriétés à court terme au Maroc. Elle permet aux hôtes de publier leurs biens et aux voyageurs de réserver des logements en toute sécurité, avec paiement en ligne et messagerie intégrée.

## 🎯 Objectifs

- Permettre aux hôtes de publier, gérer et monétiser leurs propriétés.
- Offrir aux voyageurs une recherche efficace, une réservation fluide et un paiement sécurisé.
- Intégrer une messagerie interne pour la communication.
- Fournir un tableau de bord pour le suivi des revenus.
- Offrir un espace administrateur pour modération et supervision.
- Assurer la sécurité des données et des transactions.

## 👥 Utilisateurs et Rôles

| Rôle           | Fonctionnalités principales |
|----------------|-----------------------------|
| **Visiteur**   | Recherche, consultation, inscription |
| **Voyageur**   | Réservation, paiement, avis, messagerie |
| **Hôte**       | Création/gestion des propriétés, réservations, revenus |
| **Administrateur** | Supervision, modération, gestion des utilisateurs et transactions |

## 🔧 Fonctionnalités

### Visiteur
- Recherche de propriétés par ville, capacité, prix
- Consultation des fiches détaillées
- Inscription comme hôte ou voyageur

### Voyageur
- Réservation et paiement en ligne (Stripe)
- Gestion des réservations (avec annulation)
- Laisser des avis
- Messagerie interne avec hôtes

### Hôte
- Création/modification/suppression de propriétés
- Suivi des réservations et des revenus
- Demande de retrait (simulation)
- Communication avec voyageurs

### Administrateur
- Tableau de bord de supervision
- Gestion et modération des utilisateurs, avis, propriétés
- Validation manuelle des retraits

## 🖥️ Interfaces à Développer

- **Pages publiques** : Accueil, Recherche, Détail, Contact
- **Auth** : Inscription (rôle), Connexion, Mot de passe oublié
- **Voyageur** : Tableau de bord, Réservations, Paiement, Avis, Messagerie
- **Hôte** : Tableau de bord, Propriétés, Revenus, Messagerie
- **Admin** : Gestion des utilisateurs, contenu, transactions

## ⚙️ Stack Technique

### Backend

- **Laravel 10+**
  - MVC + Repository Pattern
  - Authentification & middlewares personnalisés
  - Upload d’images via Laravel Storage
  - Stripe pour paiements
  - API internes (messagerie, paiements)

### Base de Données : PostgreSQL

- `users`, `properties`, `property_images`, `reservations`, `reviews`, `transactions`, `withdrawals`, `messages`

### Frontend

- Blade Templates
- Tailwind CSS (responsive design)
- JavaScript natif (pas de Vue.js, Livewire, ni bibliothèques JS externes)
- Validation côté client

## 🔒 Contraintes

- Interface uniquement en français
- Sécurité des données et paiements obligatoire
- Validation manuelle des propriétés et avis
- Design responsive
- Paiement obligatoire avant validation
- Monnaie : Dirham Marocain (MAD)

## 📆 Planning de Réalisation

| Semaine | Tâches principales |
|---------|--------------------|
| 1       | Configuration Laravel, Auth, rôles |
| 2       | Modélisation BDD, migrations, seeders |
| 3       | Développement pages publiques |
| 4       | Espace Voyageur : réservations, paiements |
| 5       | Espace Hôte : gestion propriétés et réservations |
| 6       | Messagerie interne |
| 7       | Espace Administrateur complet |
| 8       | Tests, corrections, optimisation, déploiement |

## 🚀 Lancement du projet (local)

1. Cloner le dépôt
2. Lancer `composer install`
3. Configurer le fichier `.env`
4. Lancer `php artisan migrate --seed`
5. Démarrer le serveur : `php artisan serve`

---

