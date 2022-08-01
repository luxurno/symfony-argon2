### Run app
docker-compose up -d

### Exec bash in container
docker-compose exec app bash

### Generate JWT keys pair
php bin/console lexik:jwt:generate-keypair

### Run schema generation
php bin/console d:s:u --force

### Run migration to create user
php bin/console d:m:m

### cURL request for token
`curl -X POST -H "Content-Type: application/json" http://localhost:8000/api/login_check -d '{"username":"johndoe","password":"test"}'`
