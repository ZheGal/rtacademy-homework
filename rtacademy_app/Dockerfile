FROM php:7.4-fpm

RUN \
    apt update -y \
    && apt-get install -y libfreetype6-dev libjpeg62-turbo-dev libpng-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd pdo_mysql json iconv \
    && rm -Rf /var/www/html

COPY etc/php/conf.d/40-php.ini  /usr/local/etc/php/conf.d/

WORKDIR /var/www

CMD ["php-fpm"]