FROM php:8.2-apache

RUN a2enmod rewrite

COPY . /var/www/html/

RUN echo '#!/bin/sh' > /usr/local/bin/start-apache \
    && echo 'sed -i "s/Listen 80/Listen ${PORT:-80}/" /etc/apache2/ports.conf' >> /usr/local/bin/start-apache \
    && echo 'sed -i "s/:80>/:${PORT:-80}>/" /etc/apache2/sites-available/000-default.conf' >> /usr/local/bin/start-apache \
    && echo 'exec apache2-foreground' >> /usr/local/bin/start-apache \
    && chmod +x /usr/local/bin/start-apache

CMD ["/usr/local/bin/start-apache"]
