# Olyan hivatalos PHP képet használunk, amin már rajta van az Apache webszerver
FROM php:8.3-apache

# Engedélyezzük az Apache mod_rewrite modult (ez elengedhetetlen a PHP MVC routerhez!)
RUN a2enmod rewrite

# Telepítjük a PHP PDO MySQL kiterjesztést az adatbázis-kezeléshez
RUN docker-php-ext-install pdo pdo_mysql

# Átállítjuk az Apache dokumentumgyökerét a public mappádra
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Másoljuk a projekt összes fájlját a konténerbe
COPY . /var/www/html/

# Megnyitjuk a 80-as portot (ezen fog figyelni az Apache)
EXPOSE 80