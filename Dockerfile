FROM php:8.3.1-fpm-alpine3.19

WORKDIR /var/www/html

# install necessary alpine packages
RUN apk update && apk add --no-cache \
    zip \
    unzip \
    dos2unix \
    supervisor \
    libpng-dev \
    libzip-dev \
    freetype-dev \
    $PHPIZE_DEPS \
    libjpeg-turbo-dev \
    libpq-dev

# compile native PHP packages
RUN docker-php-ext-install \
    gd \
    pcntl \
    bcmath \
    pgsql \
    pdo_pgsql \
    pdo

# configure packages
#RUN docker-php-ext-configure gd --with-freetype --with-jpeg

# install additional packages from PECL
RUN pecl install zip && docker-php-ext-enable zip \
    && pecl install igbinary && docker-php-ext-enable igbinary


RUN apk update
RUN curl -sS https://getcomposer.org/installer | php -- --version=2.4.3 --install-dir=/usr/local/bin --filename=composer

COPY . /var/www/html
ENV COMPOSER_ALLOW_SUPERUSER=1
RUN composer install

RUN php artisan route:clear
RUN php artisan config:clear
RUN php artisan cache:clear
RUN php artisan storage:link

CMD ["php","artisan","serve","--host=0.0.0.0"]
