#!/bin/bash

sudo apt-get install apache2 libapache2-mod-fastcgi

# enable php-fpm
if [[ ${TRAVIS_PHP_VERSION:0:1} = "7" ]]; then sudo cp config/Shared/ci/travis/www.conf.php7 ~/.phpenv/versions/$(phpenv version-name)/etc/php-fpm.d/www.conf; fi
sudo cp ~/.phpenv/versions/$(phpenv version-name)/etc/php-fpm.conf.default ~/.phpenv/versions/$(phpenv version-name)/etc/php-fpm.conf
sudo a2enmod rewrite actions fastcgi alias
echo "session.save_path = '/tmp'" >> ~/.phpenv/versions/$(phpenv version-name)/etc/php.ini
echo "cgi.fix_pathinfo = 1" >> ~/.phpenv/versions/$(phpenv version-name)/etc/php.ini
~/.phpenv/versions/$(phpenv version-name)/sbin/php-fpm

# apache rewrites
sudo cp -f config/Shared/ci/travis/.htaccess .htaccess

# configure apache virtual hosts
sudo cp -f config/Shared/ci/travis/php5-fpm.conf /etc/apache2/conf.d/php5-fpm.conf
sudo cp -f config/Shared/ci/travis/travis-ci-apache-yves /etc/apache2/sites-available/yves
sudo cp -f config/Shared/ci/travis/travis-ci-apache-zed /etc/apache2/sites-available/zed
sudo sed -e "s?%TRAVIS_BUILD_DIR%?$(pwd)?g" --in-place /etc/apache2/sites-available/yves
sudo sed -e "s?%TRAVIS_BUILD_DIR%?$(pwd)?g" --in-place /etc/apache2/sites-available/zed
sudo ln -s /etc/apache2/sites-available/yves /etc/apache2/sites-enabled/yves
sudo ln -s /etc/apache2/sites-available/zed /etc/apache2/sites-enabled/zed
sudo service apache2 restart

curl -sL https://deb.nodesource.com/setup_5.x | sudo -E bash -
sudo apt-get install -y nodejs
npm install npm -g
sudo npm install -g antelope
sudo antelope install
sudo antelope build


wget https://raw.github.com/Codeception/c3/2.0/c3.php
