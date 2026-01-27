Résumé des changements effectués par Keran
======================================

- Création d'un admin par défaut via le seeder : `admin@gmail.com` / `admin123`.
- Redirection de la racine `/` vers la page de login si non authentifié ; après login redirection vers `backoffice.menu`.
- Protection des routes backoffice et profile par le middleware `auth`.
- Ajout de pages d'erreur personnalisées : 404, 500, 403, 419 dans `resources/views/errors/`.
- Ajout d'un `Handler` personnalisé pour rendre les vues d'erreur 403/404/500 et logger les exceptions : `app/Exceptions/Handler.php`.
- Ajout d'un middleware de mesure du temps de réponse (en-tête `X-Response-Time`) : `app/Http/Middleware/MeasureResponseTime.php` et application sur les routes backoffice.
- Mise en cache côté serveur pour la liste des membres et le dashboard (clé `membres_list_v1` et `membres_dashboard_v1`, durée 30s) : modifications dans `app/Http/Controllers/MembreController.php`. Le cache est invalidé sur création/modification/suppression.
- Indicateur visuel HIT/MISS ajouté dans le layout `resources/views/layouts/gestion-membre.blade.php`.
- Ajout de boutons Retour et conversion du logout en formulaire POST pour meilleure conformité.

Fichiers modifiés/ajoutés (emplacement relatif)
-----------------------------------------------
- `database/seeders/DatabaseSeeder.php`  (ajout admin par défaut)
- `routes/web.php`                        (redirections, protection routes, fallback 404, ajout middleware)
- `app/Exceptions/Handler.php`           (nouveau : rendu des erreurs + log)
- `app/Http/Middleware/MeasureResponseTime.php` (nouveau)
- `app/Http/Controllers/MembreController.php` (cache + invalidation)
- `resources/views/errors/404.blade.php` (nouveau)
- `resources/views/errors/500.blade.php` (nouveau)
- `resources/views/errors/403.blade.php` (nouveau)
- `resources/views/errors/419.blade.php` (nouveau)
- `resources/views/layouts/gestion-membre.blade.php` (bouton Retour, indicateur cache, logout form)
- `resources/views/backoffice/menu.blade.php` (menu)

Commandes que l'équipe doit exécuter localement
-------------------------------------------------
1) Mettre à jour la base et semer l'utilisateur admin (si pas déjà fait) :

```powershell
php artisan migrate
php artisan db:seed
```

2) Nettoyer le cache de configuration et d'application si vous changez `.env` :

```powershell
php artisan config:clear
php artisan cache:clear
php artisan route:clear
```

3) Lancer le serveur local (optionnel) :

```powershell
php artisan serve
```
