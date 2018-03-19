FROM nginx:1.13.5

COPY .docker/nginx/server.conf /etc/nginx/conf.d/default.conf
EXPOSE 80 443

ENTRYPOINT ["nginx"]
CMD ["-g", "daemon off;"]