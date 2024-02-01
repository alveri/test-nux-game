# Test task for NuxGame

```sh
docker-compose up --build --d
docker-compose run composer install
docker-compose run php vendor/bin/phpunit
```

