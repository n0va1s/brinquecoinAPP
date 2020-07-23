echo " `date` : start "

echo " Change to the project directory "
# cd domains/brinquecoin.com/public_html/app

echo " Turn on maintenance mode "
# php artisan down
php artisan down --message="Updating app" --retry=60

echo " Pull the latest changes from the git repository "
git reset --hard
git clean -df
git pull origin master

echo " Install/update composer dependecies "
composer install --no-interaction --prefer-dist --optimize-autoloader --no-dev

echo " Run database migrations "
php artisan migrate --force

echo " Clear caches "
php artisan cache:clear

echo " Clear expired password reset tokens "
php artisan auth:clear-resets

echo " Clear and cache routes "
php artisan route:clear
php artisan route:cache

echo " Clear and cache config "
php artisan config:clear
# Como uso env() em alguns Command não posso fazer o cache da configuração
# php artisan config:cache

echo " Clear and cache views "
php artisan view:clear
php artisan view:cache

echo " Turn off maintenance mode "
php artisan up
echo " `date` : end "
