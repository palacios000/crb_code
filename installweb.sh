#!/bin/bash

WEBSITE=$1

if [ -z $WEBSITE ]; then
	echo "devi srivere il nome del SITO!"; 
	exit
fi

# 1 ## downloadn composer
# copied from here https://getcomposer.org/doc/faqs/how-to-install-composer-programmatically.md
EXPECTED_CHECKSUM="$(wget -q -O - https://composer.github.io/installer.sig)"
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
ACTUAL_CHECKSUM="$(php -r "echo hash_file('sha384', 'composer-setup.php');")"

if [ "$EXPECTED_CHECKSUM" != "$ACTUAL_CHECKSUM" ]
then
    >&2 echo 'ERROR: Invalid installer checksum'
    rm composer-setup.php
    exit 1
fi

php composer-setup.php
RESULT=$?
rm composer-setup.php

echo "... install composer now"
# 2 ## install composer
php composer.phar init
php composer.phar install

# 3 ## download processwire
echo "... ready to git processwire"
git clone https://github.com/processwire/processwire public
chmod -R 777 public/
rm -rf public/.git public/.gitattributes public/.gitignore public/CONTRIBUTING.md public/LICENSE.TXT public/README.md


# 4 ## create database
echo "... installa DB"
NEWDB=pw_$WEBSITE
MYSQLPSD=root
mysql -u phpmyadmin -p$MYSQLPSD -e "CREATE DATABASE $NEWDB"

# 5 ## pausa, installa PW via browser
echo "sito pronto qui http://localhost/$WEBSITE/public/ "
read -r -s -p "continua l'installazione di PW da bowswer, poi torna qui e 'press any key to continue' ... " -n 1
echo ""
echo "... bene, proseguiamo!"

# 6 rimuovi i file inutili di PW
rm -rf public/site/templates/README.txt public/site/templates/styles/main.css public/site/templates/scripts/

# 7 scarica il mio git
git clone https://github.com/palacios000/crb_code.git 
rm -rf crb_code/.git 

# # 8 copia il mio json per installare dependencies
echo "... spostiamo i files"
mv crb_code/installation_UIkit/*.txt crb_code/installation_UIkit/*.js crb_code/installation_UIkit/*.json .
# copia anche il resto gia' che ci siamo
mv crb_code/installation_UIkit/scss/ public/
mv crb_code/installation_UIkit/PW_template_folder/inc/ public/site/templates/
mv -f crb_code/installation_UIkit/PW_template_folder/*.php public/site/templates/
mv crb_code/installation_UIkit/PW_template_folder/file_init-ready-finished/* public/site/

# 9 installa npm ...
npm install
npm update
sudo npm install -g npm-check-updates # forse queste non necessario se e' gia' installato globally
ncu -u
npm install

# 10 sposta uikit files into production
cp node_modules/uikit/dist/css/uikit.css public/site/templates/styles/
cp -rf node_modules/uikit/dist/js/ public/site/templates/

# 11 modifica 
echo "... modifica gruntfile"
sed -i -e "s/cartella/$WEBSITE/" gruntfile.js

# 12 prepara il git
echo "... installa il git"
mv gitignore.txt public/.gitignore
cd public
git init
git add .
git commit -am "inizio sito"

# 13 rimuovi questo script
rm -f installweb.sh

echo 
echo "installazione completata! NB: il nome del sito $WEBSITE == $PWD"

exit