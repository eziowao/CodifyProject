FROM php:apache-bullseye

WORKDIR /var/www/html

ADD --chmod=0755 https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/
RUN apt-get update && \
    install-php-extensions gd xdebug calendar intl pdo_mysql

COPY . .
EXPOSE 80
CMD ["apache2-foreground"]