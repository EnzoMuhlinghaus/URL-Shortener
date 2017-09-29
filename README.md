# URL-Shortener
API Rest Laravel consumed by VueJS Front

## Build Setup

``` bash
# configure permissions for storage/ and bootstrap/cache

# install dependencies
composer install

# create a .env file and migrate database
php artisan key:generate
php artisan migrate

# create a virtual-host named "url-shortener.dev"

# go to the vue project
cd vue-url-shortener

# install dependencies
npm install

# serve with hot reload at localhost:8080
npm run dev

# build for production with minification
npm run build

# build for production and view the bundle analyzer report
npm run build --report
```