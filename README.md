# News Agregator App

## Installation guide 

1. Build a Docker Image with composer dependencies
 
```
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php82-composer:latest \
    composer install --ignore-platform-reqs
    
```

2. Run Docker Image

`./vendor/bin/sail up -d`


3. Run database migrations

`./vendor/bin/sail artisan migrate --seed`

