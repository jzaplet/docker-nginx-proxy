FROM php:8.2-fpm-alpine
WORKDIR /var/www/html

# Set timezone
ENV TZ="Europe/Prague"

# Nginx & PHP configs
COPY ./docker/nginx/nginx.conf /etc/nginx/nginx.conf
COPY ./docker/nginx/http.d/default.conf /etc/nginx/http.d/default.conf
COPY ./docker/php/php.ini /usr/local/etc/php/conf.d/php.ini
#COPY ./docker/php/opcache.ini /usr/local/etc/php/conf.d/opcache.ini

# Install core linux dependencies
RUN apk add openssl curl ca-certificates
RUN apk add bash nano
RUN apk add nginx

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy source code & set permissions
COPY . ./
RUN chown -R www-data:www-data /var/www/html

# Add entrypoint
ADD docker-entrypoint.sh /docker-entrypoint.sh
RUN chmod +x /docker-entrypoint.sh

ENTRYPOINT ["/docker-entrypoint.sh"]