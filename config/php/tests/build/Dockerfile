FROM php:7.0-fpm
WORKDIR /www

# Install developer dependencies
RUN set -xe \
    && apt-get update -yqq \
    && apt-get install -y \
                            git \
                            libsqlite3-dev \
                            libxml2-dev \
                            libicu-dev \
                            libfreetype6-dev \
                            libmcrypt-dev \
                            libjpeg62-turbo-dev \
                            libpng12-dev \
                            libcurl4-gnutls-dev \
                            libbz2-dev \
                            libssl-dev -yqq \
                            mariadb-client \
   && docker-php-ext-install \
                             pdo_mysql \
                             opcache \
                             json \
                             calendar \
                             bcmath \
                             xml \
                             zip \
                             bz2 \
                             mbstring \
                             mcrypt \
                             curl \
   && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
   && docker-php-ext-install gd \
   && pecl install phar \
   && docker-php-ext-install phar \
   && pecl install intl \
   && docker-php-ext-install intl \
   && apt-get -y install \
            libmagickwand-dev \
        --no-install-recommends \
   && pecl install imagick \
   && docker-php-ext-enable imagick \
   && rm -r /var/lib/apt/lists/* \
   && usermod -u 1000 www-data \
   && yes | pecl install xdebug \
   && echo "zend_extension=$(find /usr/local/lib/php/extensions/ -name xdebug.so)" > /usr/local/etc/php/conf.d/xdebug.ini \
   && echo "xdebug.remote_enable=on" >> /usr/local/etc/php/conf.d/xdebug.ini \
   && echo "xdebug.remote_autostart=off" >> /usr/local/etc/php/conf.d/xdebug.ini \
   && echo "xdebug.remote_connect_back=On" >> /usr/local/etc/php/conf.d/xdebug.ini \
   && echo "xdebug.remote_handler=dbgp" >> /usr/local/etc/php/conf.d/xdebug.ini

# Yii2 specific commands
RUN set -xe \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && composer global require "fxp/composer-asset-plugin:^1.2.0"

# Apidocjs
# todo move to other mb?
RUN set -xe \
   && apt-get update -yqq \
   && apt-get install -y curl python-software-properties \
   && curl -sL https://deb.nodesource.com/setup_7.x | bash - \
   && apt-get install nodejs \
   && npm install apidoc -g \
   && rm -r /var/lib/apt/lists/*

CMD ["bash", "/deploy.sh"]
