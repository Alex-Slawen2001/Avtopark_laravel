FROM php:8.1
RUN docker-php-ext-install pdo_mysql
RUN curl -sS https://getcomposer.org/installer | php --  --install-dir=/usr/local/bin --filename=composer
COPY . /var/www/html
RUN composer install --optimize-autoloader --no-dev
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache
VOLUME /laravel/databd/mysql
EXPOSE 8080
