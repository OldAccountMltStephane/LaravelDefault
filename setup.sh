composer install
npm install
npm run dev

php artisan down

cp .env.example .env
php artisan key:generate

touch database/database.sqlite
php artisan migrate:fresh

php artisan cache:clear

php artisan up