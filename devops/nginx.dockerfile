FROM nginx:stable-alpine

COPY devops/nginx/default.conf /etc/nginx/conf.d/default.conf
COPY ./ /var/www/html
RUN chown -R nginx:nginx /var/www
