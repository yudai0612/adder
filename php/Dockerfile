FROM php:7.4-fpm
COPY php.ini /usr/local/etc/php/docker

WORKDIR /work
CMD ["php", "-S", "0.0.0.0:8000", "-t", "/work/web"]