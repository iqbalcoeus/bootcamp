#!/bin/bash

echo "installing Vim"
sudo apt-get install vim -y

echo "Provisioning virtual machine..."
echo "Installing Git"
sudo apt-get install git -y 

echo "Updating PHP repository"
sudo apt-get install python-software-properties build-essential -y 
sudo add-apt-repository ppa:ondrej/php5 -y 
 sudo apt-get update 
 echo "Installing PHP"
 apt-get install php5-common php5-dev php5-cli php5-fpm -y 
  
 echo "Installing PHP extensions"
 apt-get install curl php5-curl php5-gd php5-mcrypt php5-mysql -y
 apt-get install debconf-utils -y 

 debconf-set-selections <<< "mysql-server mysql-server/root_password password 1234"
  
 debconf-set-selections <<< "mysql-server mysql-server/root_password_again password 1234"

 apt-get install mysql-server -y 

