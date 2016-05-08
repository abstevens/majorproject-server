# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure(2) do |config|
    config.vm.box = "centos/7"

    config.vm.network "private_network", ip: "10.5.5.15"
    config.vm.network "forwarded_port", guest: 22, host: 2215, auto_correct: true

    config.vm.hostname = "api.majorproject.dev"

    config.vm.synced_folder ".", "/vagrant", disabled: true
    config.vm.synced_folder ".", "/home/vagrant/sync", disabled: true

    config.vm.synced_folder "./application", "/var/www", :nfs => { group: "nginx", owner: "nginx" }, :mount_options => ['nolock,vers=3,udp,noatime']

    # Vagrant HostManager Plugin
    # Installation: "vagrant plugin install vagrant-hostmanager"
    config.hostmanager.enabled = true
    config.hostmanager.manage_host = true
    config.hostmanager.ignore_private_ip = false
    config.hostmanager.include_offline = true

    config.vm.provision "ansible" do |an|
        an.limit = "vagrant"
        an.inventory_path = "deploy/ansible/inventory/vagrant"
        an.playbook = "deploy/ansible/vagrant_playbook.yml"
    end

    config.vm.provider "virtualbox" do |vb|
        vb.name = config.vm.hostname
        vb.gui = false
        vb.memory = "1536"
        vb.cpus = "1"
    end
end
