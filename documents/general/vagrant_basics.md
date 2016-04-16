## Virtual Machine

### Requirements:
 - VirtualBox: https://www.virtualbox.org/wiki/Downloads
 - Vagrant: https://www.vagrantup.com/downloads.html
 - Vagrant Plugin "hostmanager": `vagrant plugin install vagrant-hostmanager`
 - Ansible: http://docs.ansible.com/ansible/intro_installation.html

### Optional:
Since Vagrant will ask for user password in order to setup NFS file sharing and update hosts file
it is recommended to update the sudoers file and never get bothered with those requests again

**File:** `/etc/sudoers.d/vagrant` (remember to replace *Your_User_Name* with your actual username)
```
Cmnd_Alias VAGRANT_EXPORTS_ADD = /usr/bin/tee -a /etc/exports
Cmnd_Alias VAGRANT_NFSD = /sbin/nfsd restart
Cmnd_Alias VAGRANT_EXPORTS_REMOVE = /usr/bin/sed -E -e /*/ d -ibak /etc/exports
%admin ALL=(root) NOPASSWD: VAGRANT_EXPORTS_ADD, VAGRANT_NFSD, VAGRANT_EXPORTS_REMOVE

Cmnd_Alias VAGRANT_HOSTMANAGER_UPDATE = /bin/cp /Users/*Your_User_Name*/.vagrant.d/tmp/hosts.local /etc/hosts
%admin ALL=(root) NOPASSWD: VAGRANT_HOSTMANAGER_UPDATE
```

To operate vagrant, you will have to navigate through the terminal. A nice software to prevent this is
to use Vagrant Manager: http://vagrantmanager.com/downloads/

## Usage

**Start VM:** `vagrant up`
**Domain:** http://majorproject.dev

## Database:

**Login to VM:** `vagrant ssh`
**Navigate to lavavel application:** `cd /var/www/application`
**Run migrations:** `php artisan migrate`
**Seed DB:** `php artisan db:seed`
