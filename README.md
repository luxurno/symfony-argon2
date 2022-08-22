### Run app
docker-compose up -d

### Exec bash in container
docker-compose exec app bash

### Install dependencies
composer install

### Generate JWT keys pair
php /var/www/app/bin/console lexik:jwt:generate-keypair

### Run schema generation
php /var/www/app/bin/console doctrine:schema:update --force

### Run migration to create user
php /var/www/app/bin/console doctrine:migration:migrate

### cURL request for token
`curl -X POST -H "Content-Type: application/json" http://localhost:8000/api/login_check -d '{"username":"johndoe","password":"test"}'`
