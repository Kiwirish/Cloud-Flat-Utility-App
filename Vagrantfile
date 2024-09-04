# -*- mode: ruby -*-
# vi: set ft=ruby :

# All Vagrant configuration is done below. The "2" in Vagrant.configure
# configures the configuration version (we support older styles for
# backwards compatibility). Please don't change it unless you know what
# you're doing.
Vagrant.configure("2") do |config|
 
  config.vm.box = "ubuntu/focal64"

  config.vm.define "webserver" do |webserver|
    webserver.vm.hostname = "webserver"
    webserver.vm.network "forwarded_port", guest: 80, host: 8080, host_ip: "127.0.0.1"
    webserver.vm.network "private_network", ip: "192.168.56.11"
    webserver.vm.synced_folder ".", "/vagrant", owner: "vagrant", group: "vagrant", mount_options: ["dmode=775,fmode=777"]

    webserver.vm.provision "shell", path: "build-webserver-vm.sh"

  end


  config.vm.define "dbserver" do |dbserver|
    dbserver.vm.hostname = "dbserver"
    dbserver.vm.network "private_network", ip: "192.168.56.12"

    dbserver.vm.synced_folder ".", "/vagrant", owner: "vagrant", group: "vagrant", mount_options: ["dmode=775,fmode=777"]

    dbserver.vm.provision "shell", path: "build-dbserver-vm.sh"
  end

  config.vm.define "adminwebserver" do |adminwebserver|
    adminwebserver.vm.hostname = "adminwebserver"
    adminwebserver.vm.network "forwarded_port", guest: 80, host: 8081
    adminwebserver.vm.network "private_network", ip: "192.168.56.13"
    adminwebserver.vm.synced_folder ".", "/vagrant", owner: "vagrant", group: "vagrant", mount_options: ["dmode=775,fmode=777"]
    adminwebserver.vm.provision "shell", path: "build-adminwebserver-vm.sh"
  end



end
