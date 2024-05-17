FROM php:7.4-fpm

# Instalar dependências necessárias para compilar as extensões PHP
RUN apt-get update && apt-get install -y \
    libzip-dev \
    libxml2-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libonig-dev \
    unzip \
    libxml2 \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) pdo pdo_mysql zip gd iconv simplexml \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Instalação do Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Configurar diretório de trabalho
WORKDIR /var/www/html

# Copiar o conteúdo do diretório MediCarePro para o diretório de trabalho no contêiner
COPY MediCarePro /var/www/html/