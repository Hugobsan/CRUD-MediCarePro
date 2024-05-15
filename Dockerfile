FROM php:7.4-fpm-alpine

# Instalar dependências
RUN docker-php-ext-install pdo pdo_mysql

# Instalação do Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Rodando o composer install
RUN cd biblioteca-agora/ && \
    composer install && 

# Configurar diretório de trabalho
WORKDIR /var/www/html

# Copiar o conteúdo atual do diretório para o diretório de trabalho no contêiner
COPY . /var/www/html

