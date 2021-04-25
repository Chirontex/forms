# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure("2") do |config|
  config.vm.box = "chirontex/laemp"

  config.vm.network "forwarded_port", guest: 80, host: 80
  config.vm.network "forwarded_port", guest: 3306, host: 3306

  config.vm.provider "virtualbox" do |vb|
    vb.memory = "1024"
  end

  config.vm.provision "shell", inline: <<-SHELL
    cd /vagrant/backend.loc
    php /usr/local/bin/composer install
    php /vagrant/backend.loc/yii migrate --interactive=0
    sudo cp /vagrant/backend.loc.conf /etc/nginx/conf.d/backend.loc.conf
    mkdir logs
    sudo systemctl enable nginx
    sudo systemctl start nginx
  SHELL
end
