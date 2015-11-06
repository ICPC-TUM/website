#!/bin/sh
if [ ! -e composer.phar ]
then
	curl -sS https://getcomposer.org/installer | php
	php composer.phar install
fi
sudo php -S 0.0.0.0:8080 -t ./ &