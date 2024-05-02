-- Adatbázis

-- 1. lépés

CREATE DATABASE laravel_deaf;

-- 2. lépés
-- Jogok root@localhost 

GRANT ALL PRIVILEGES ON `laravel_deaf`.* TO 'root'@'localhost' WITH GRANT OPTION;

-- 3. lépés
-- BackendDeaf Parancsot:

-- php artisan migrate