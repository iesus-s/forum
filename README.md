# forum
this is a forum website with login and account creation written in php. 
it utilizes Docker with a compose file containing the apache web server, nginx , MySQL and phpMyAdmin.

# requirements
docker  

# instructions
download all files in forum/ folder
inside project foler run the following command
'docker-compose up -d'

## possible mysqli() error (solution for now..)
after creating the container, go into the apache container bash and execute the following command
'docker-php-ext-install mysqli'

