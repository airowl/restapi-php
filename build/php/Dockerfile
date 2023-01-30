FROM php:8.1-apache

RUN apt-get update && \
    docker-php-ext-install mysqli pdo pdo_mysql

RUN apt -y update \
    && apt -y upgrade

RUN apt-get -y update \
    && apt-get -y install \
    git \
    wget \
    unzip \
    nano

RUN cd /tmp/ \
    && wget https://getcomposer.org/composer.phar \
    && chmod +x ./composer.phar \
    && mv ./composer.phar /usr/local/bin/composer \
    && /usr/local/bin/composer self-update

RUN a2enmod rewrite