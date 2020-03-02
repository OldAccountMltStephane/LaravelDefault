php artisan down

cp .env.example .env
php artisan key:generate

touch database/database.sqlite
php artisan migrate:fresh

composer require
npm install
npm run dev

php artisan up