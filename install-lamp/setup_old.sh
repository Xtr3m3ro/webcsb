#!/bin/sh

apt-get install php5 php5-cli apache2 mysql-server mysql-client php5-mysql curl

cp /etc/php5/apache2/php.ini /etc/php5/apache2/php.ini.bak
cp /usr/share/doc/php5-common/examples/php.ini-development /etc/php5/apache2/php.ini

cp /etc/php5/cli/php.ini /etc/php5/cli/php.ini.bak
cp /usr/share/doc/php5-common/examples/php.ini-development /etc/php5/cli/php.ini

mkdir /home/$1/www
cp index.php /home/$1/www/index.php

rm -r /var/www
ln -s /home/$1/www /var/www

chmod 0777 /home/$1/www
chmod 0777 /home/$1/index.php

service apache2 restart
