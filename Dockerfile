FROM php:8.1-apache
LABEL Name=restaurantmenu Version=0.0.1
RUN apt-get update && apt-get install -y libssl-dev \
    && pecl install mongodb \
    && docker-php-ext-enable mongodb

COPY . /var/www/html

EXPOSE 80

CMD ["apache2-foreground"]