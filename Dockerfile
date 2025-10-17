FROM php:8.2.10-apache
RUN apt-get update && apt-get install -y git zip unzip \
    && rm -rf /var/lib/apt/lists/*
RUN pecl install xdebug \
    && docker-php-ext-enable xdebug
RUN { \
  echo "zend_extension=xdebug"; \
  echo "xdebug.mode=develop,debug"; \
  echo "xdebug.start_with_request=yes"; \
  echo "xdebug.discover_client_host=false"; \
  echo "xdebug.client_host=host.docker.internal"; \
  echo "xdebug.client_port=9003"; \
  echo "xdebug.log_level=0"; \
} > /usr/local/etc/php/conf.d/xdebug.ini
