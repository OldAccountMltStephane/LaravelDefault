php artisan down
cp .env.example .env
touch database/database.sqlite
php artisan migrate:fresh
php artisan up