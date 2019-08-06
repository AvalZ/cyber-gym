FROM richarvey/nginx-php-fpm

MAINTAINER Andrea Valenza <avalenza89@gmail.com>


# set up nginx 
RUN sed -i 's/root \/usr\/share\/nginx\/html/root \/var\/www\/html/g' /etc/nginx/sites-enabled/default.conf 
RUN rm /var/www/html/*

COPY index.php /var/www/html/
COPY fl4g_h4r3 /
