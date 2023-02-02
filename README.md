# Test work. API Integration with Nova Poshta

You can see the task description [here](task.md)

## Deployment process

### Clone this repository

```sh
git clone git@github.com:nestermaks/test-nova-poshta.git
```

### Install dependencies with docker

```sh
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php82-composer:latest \
    composer install --ignore-platform-reqs
```

### Open your terminal in a directory with this project

#### Start a server

```sh
vendor/bin/sail up -d
```

#### Run migrations

```sh
vendor/bin/sail artisan migrate --seed
```

#### Parse data

```sh
vendor/bin/sail artisan parse NovaPoshta
```

If remote server stucks, just retry

### Visit http://localhost in your browser
