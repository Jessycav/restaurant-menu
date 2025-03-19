# Utiliser un environnement d'exécution PHP officiel comme image parent
FROM php:8.1-apache 

# Définir le répertoire de travail dans le conteneur
WORKDIR /var/www/html 

# Copier le fichier PHP dans le répertoire Web du conteneur
COPY . /var/www/html/ 

# Définir le ServerName pour supprimer l'avertissement concernant le nom de domaine d'Apache
RUN echo  "ServerName localhost" >> /etc/apache2/apache2.conf 
RUN apt-get update && apt-get install -y libssl-dev \
    && pecl install mongodb \
    && docker-php-ext-enable mongodb
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer require --working-dir=/var/www mongodb/mongodb

# Exposer le port 80 (le port HTTP par défaut)
EXPOSE 80