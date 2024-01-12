1. 解壓縮nba-laravel.zip到
\nba-laravel

2. 在\nba-laravel資料夾下，輸入下列指令
composer install --ignore-platform-reqs

3. 在\nba-laravel資料夾下，輸入下列指令
php artisan key:generate

3. 到MySQL創建一個空的資料庫 nba-laravel

4. 在\nba-laravel資料夾下，輸入下列指令 (生成模擬資料)
php artisan migrate:refresh --seed

5.  在\nba-laravel資料夾下，輸入下列指令 (生成模擬資料)
php artisan serve

6. 帳密 admin@example.com/1234