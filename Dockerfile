FROM php:8.3-apache

# Rendszerfüggőségek telepítése
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    && docker-php-ext-install pdo_mysql zip

# Apache mod_rewrite engedélyezése az MVC routinghoz
RUN a2enmod rewrite

# Az Apache DocumentRoot átállítása a /public mappára
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/conf-available/*.conf

WORKDIR /var/www/html

# A forráskód bemásolása a konténerbe!
COPY . /var/www/html/