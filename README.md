## SEO
composer require artesaos/seotools
composer require spatie/laravel-sitemap


## 📦 Install Intervention Image
composer require intervention/image-laravel



## 🗂 Create Galleries Migration
php artisan make:migration create_galleries_table


## 🔐 Install Spatie Laravel Permission
composer require spatie/laravel-permission

php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"

php artisan migrate


## 👤 Role Seeder
php artisan make:seeder RoleSeeder

php artisan db:seed --class=RoleSeeder


## 🔑 Permission Seeder
php artisan make:seeder PermissionSeeder

php artisan db:seed --class=PermissionSeeder


## ✅ Run All Seeders (Optional)
php artisan db:seed

## Docker Files
docker compose exec db mysql -u root -e "DROP DATABASE IF EXISTS muskanproperty; CREATE DATABASE muskanproperty;"
docker compose exec -T db mysql -u root muskanproperty < database/muskanproperty.sql
docker compose exec app php artisan config:clear
docker compose exec app php artisan cache:clear
