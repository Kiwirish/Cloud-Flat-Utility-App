#!/bin/bash
apt-get update
apt-get install -y apache2 php libapache2-mod-php php-mysql

cp /vagrant/admin-website.conf /etc/apache2/sites-available/

a2ensite admin-website

a2dissite 000-default

service apache2 restart
