Despre setup.sh
===============

Setup.sh este (mare parte) din script-ul de instalare a Apache, PHP și MySQL pe care l-am folosit în laboratorul de informatică.

Utilizare
=========

setup_old.sh
------------
setup_old.sh este exact scriptul folosit în laborator. Pentru a-l rula trebuie să fiți logat ca root sau să folositi sudo:

sudo ./setup_old.sh username

Unde username este numele de utilizator unde va fi făcut folder-ul www și symlink-ul din /var/www către acesta.
Exemplu:
sudo ./setup_old.sh ion
Va face /home/ion/www și un link simbolic în /var/www către acesta.

setup.sh
--------
setup.sh face același lucru, doar că nu necesită sudo (comenzile sunt scrise direct cu sudo) și folosește utilizatorul curent (~):

./setup.sh
