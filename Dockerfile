FROM php:7.1-fpm-jessie
LABEL maintainer="Solov <solov@aizn.ru>"

RUN apt-get update \
    && apt-get install -y \
        zlib1g-dev libicu-dev gnupg g++ curl \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libmcrypt-dev \
        libpng-dev \
        wget git openssh-client libpng-dev iproute2 \
    && docker-php-ext-configure intl \
    && docker-php-ext-install intl pdo_mysql zip gd

RUN pecl install -f xdebug && docker-php-ext-enable xdebug;

RUN curl -sL https://deb.nodesource.com/setup_12.x | bash - \
    && curl -sS https://dl.yarnpkg.com/debian/pubkey.gpg | apt-key add - \
    && echo "deb https://dl.yarnpkg.com/debian/ stable main" | tee /etc/apt/sources.list.d/yarn.list

#RUN apt-get update \
#    && apt-get install -y nodejs \
#    && apt-get install -y yarn

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer