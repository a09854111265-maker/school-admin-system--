FROM php:8.2-apache

# 安裝 Laravel 需要的 PHP 擴充
RUN docker-php-ext-install pdo pdo_mysql

# 啟用 Apache rewrite
RUN a2enmod rewrite

# 設定 Apache root
WORKDIR /var/www/html

# 複製後端程式碼
COPY backend/ /var/www/html/

# 權限
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

EXPOSE 80
