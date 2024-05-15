# Use a imagem base do PHP
FROM php:7.4-fpm-alpine

# Instale as dependências necessárias, incluindo o driver do MySQL
RUN docker-php-ext-install pdo pdo_mysql

# Configure o diretório de trabalho
WORKDIR /var/www/html/MediCarePro

# Copie o código-fonte do aplicativo para o contêiner
COPY . .


