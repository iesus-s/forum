# forum
This is a forum website with login and account creation written in php. 
It utilizes Docker with a compose file containing the apache web server, nginx , MySQL and phpMyAdmin.

# possible mysqli() error (solution for now..)
After creating the container, go into the apache container bash and execute the following command
'docker-php-ext-install mysqli'
