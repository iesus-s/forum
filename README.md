# forum
this is a simple forum website with login, account creation, messaging system, and profile pictures written in php. 
it utilizes Docker with a compose file containing the apache web server, nginx , MySQL and phpMyAdmin.

# requirements
docker  

# instructions
download all files in forum/ folder
inside project folder run the following command
'docker-compose up -d'
main site: http://localhost:8080
phpAdmin: http://localhost:8081

## possible mysqli() error (solution for now..)
after creating the container, go into the apache container bash and execute the following command and restart container
'docker-php-ext-install mysqli'

## possible move_uploaded_file() error (solution for now..)
after creating the container, go into the apache container bash and execute the following command and restart container
'chown -R www-data:www-data /var/www/html/pic_uploads'
