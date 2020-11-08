#--- El repositorio docker de PHP
FROM php:7.3-fpm-alpine
RUN docker-php-ext-install pdo pdo_mysql mysqli
#--- Usar apk en lugar de apt-get para cuando se usa alpine
#--- nota de Cardoso 26-Feb-2020
RUN apk update && apk add \
	curl \
	wget \
	zip \
	unzip \
	composer \
	npm
