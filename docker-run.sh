docker rm -f $(docker ps -aq)

docker run -e MYSQL_ROOT_PASSWORD=root -p 3306:3306 mysql

php artisan serve