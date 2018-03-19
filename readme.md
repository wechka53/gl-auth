Auth Service:
------------
### Requirements:
   - docker 


#### Technologies stack:
   - [PHP 7.1](http://php.net/manual/en/)
   - [laravel  5.5.0](https://laravel.com/docs/5.5)
   - [MariaDB](https://mariadb.com/kb/en/)
   - [nginx](https://nginx.org/ru/docs/)
   
### Documentation:
   - [Table Of Concerns](./docs/api.md)
   
### Quick start:

Run `docker-compose up -d`

API will be available at localhost:80

### Troubleshoot:

If you see an error `ERROR: Network ethernet declared as external, but could not be found.`
Simple run `docker network create ethernet` and try again.
                  


   