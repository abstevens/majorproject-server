# majorproject-server basic usage

### Valet Installation
- Clone majorproject-server: `git@github.com:abstevens/majorproject-server.git`
- Direct to majorproject-server root directory on your machine: `cd *YOUR DIRECTORY*/majorproject-server`
- Make install.sh file executable on your machine: `chmod +x install.sh`
- Execute the install.sh file: `./install.sh`
- Follow the steps on configuring mariadb in the terminal and name the database `majorproject`
- Change ownership of the /usr/local directory: `chown *YOUR USERNAME*:*YOUR GROUP* /usr/local`
- Edit your start up script: `nano ~/.bashrc` or `nano ~/.zshrc`
- Add a path below other paths to recognise PHP71:
```
export PATH="$HOME/.composer/vendor/bin:$(brew --prefix homebrew/php/php71)/bin:/usr/local/bin:/usr/local/sbin:$PATH"
```
- Check the PHP version: `php -v`
- If PHP version is not PHP71, reload your start up script: `source ~/.bashrc` or `source ~/.zshrc`

The URL to the server is: **http://api.mjp.dev/**

### Vagrant Installation
There is a full guide on installing the server via Vagrant in the `/documents/general/vagrant_basics.md` file.

### Laravel Help
There is a full guide on Laravel basics with the project in `/documents/general/laravel_basics.md` file

### majorproject-client:
There is a working client of the server. Together the project functions as an Educational Management System (EMS). In order for creation of a 
full EMS, there will also need to be installation for client side works. You can follow the README.md file in the link below.

- LINK

### Feel free to contact us if there are any issues

##### Server:
- Alexander Stevens - alexanderbilliestevens@gmail.com

##### Client:
- Dylan Carver - dylancarv@gmail.com
- Niklas Lang - contis2908@gmail.com
