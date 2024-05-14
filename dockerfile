# Utiliser l'image officielle PHP avec Apache
FROM php:8.0-apache

# Installer les extensions PHP si nécessaire
RUN docker-php-ext-install pdo_mysql

# Créer la structure de dossier dans le conteneur si spécifique est nécessaire
# RUN mkdir -p /var/www/html/monprojet

# Copier les fichiers du projet dans /var/www/html ou dans le sous-dossier créé
# Assurez-vous d'avoir un dossier 'src' contenant votre projet dans votre contexte de build
COPY src/ /var/www/html/

# Exposer le port 80 pour le trafic HTTP
EXPOSE 80

# Configurer le point d'entrée ou CMD si nécessaire, par exemple:
# CMD ["apache2-foreground"]
