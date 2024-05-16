FROM php:7.4-fpm-alpine

# Instalar dependências
RUN docker-php-ext-install pdo pdo_mysql

# Instalação do Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Configurar diretório de trabalho
WORKDIR /var/www/html

# Copiar o conteúdo do diretório MediCarePro para o diretório de trabalho no contêiner
COPY MediCarePro /var/www/html/

# Rodando o composer install
RUN composer install

# Realizando as migrations após a instalação do composer e executando a aplicação
CMD php artisan serve --host=0.0.0.0 --port=8000