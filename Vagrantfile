# -*- mode: ruby -*-
# vi: set ft=ruby :

# In case of an NFS error on Mac try "sudo touch /etc/exports"

Vagrant.configure(2) do |config|
    config.vm.box = "centos/7"

    config.vm.network "private_network", ip: "10.3.3.31"
    config.vm.network "forwarded_port", guest: 22, host: 2201, auto_correct: true

    config.vm.synced_folder ".", "/vagrant", disabled: true
    config.vm.synced_folder ".", "/home/vagrant/sync", disabled: true
    config.vm.synced_folder ".", "/var/www", type: "nfs"

    config.vm.hostname = "majorproject.dev"

    # Vagrant HostManager plugin
    # Installation: "vagrant plugin install vagrant-hostmanager"
    # To skip password on each run see https://github.com/smdahlen/vagrant-hostmanager#passwordless-sudo
    config.hostmanager.enabled = true
    config.hostmanager.manage_host = true
    config.hostmanager.ignore_private_ip = false
    config.hostmanager.include_offline = true

    config.vm.provision "ansible" do |an|
        an.limit = "vagrant"
        an.inventory_path = "deploy/ansible/inventory/vagrant"
        an.playbook = "deploy/ansible/vagrant-playbook.yml"
    end

    config.vm.provider "virtualbox" do |vb|
        vb.name = config.vm.hostname
        vb.gui = false
        vb.memory = "1024"
        vb.cpus = "1"
    end
end
