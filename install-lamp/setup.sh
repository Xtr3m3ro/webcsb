#!/bin/sh

sudo apt-get install php5 php5-cli apache2 mysql-server mysql-client php5-mysql curl

sudo cp /etc/php5/apache2/php.ini /etc/php5/apache2/php.ini.bak
sudo cp /usr/share/doc/php5-common/examples/php.ini-development /etc/php5/apache2/php.ini

sudo cp /etc/php5/cli/php.ini /etc/php5/cli/php.ini.bak
sudo cp /usr/share/doc/php5-common/examples/php.ini-development /etc/php5/cli/php.ini

sudo mkdir ~/www
sudo cp index.php ~/www/index.php

sudo rm -r /var/www
sudo ln -s ~/www /var/www

sudo chmod 0777 ~/www
sudo chmod 0777 ~/index.php

sudo service apache2 restart
