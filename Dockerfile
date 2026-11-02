FROM php:8.2-apache

RUN docker-php-ext-install pdo_mysql \
    && a2enmod rewrite

COPY . /var/www/html/

CMD ["bash", "-lc", "sed -i 's/Listen 80/Listen ${PORT:-80}/' /etc/apache2/ports.conf && sed -i 's/:80>/:${PORT:-80}>/' /etc/apache2/sites-available/000-default.conf && exec apache2-foreground"]
