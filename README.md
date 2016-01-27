# citydepartment
Міський департамент поліції онлайн

### Installing instructions

## Clone this repo:

```
$ git clone https://github.com/DigitalPolice/citydepartment.git
```

Configure your virtual host (see our digitalpolice.conf for example):

```
<VirtualHost digitalpolice.local:80>
	ServerName digitalpolice.local
	ServerAdmin webmaster@local
	DocumentRoot /var/www/html/DigitalPolice/citydepartment/web
	<Directory /var/www/html/DigitalPolice/citydepartment/web>
		Options Indexes FollowSymLinks MultiViews
		AllowOverride All
		Require all granted
	</Directory>
	ErrorLog /var/www/html/www/DigitalPolice/digitalpolice_apache_error.log
	LogLevel warn
	CustomLog /var/www/html/DigitalPolice/digitalpolice_apache_access.log combined
</VirtualHost>
```

Restart apache:

```
$ sudo /etc/init.d/apache2 restart
```

or:

```
$ sudo service apache2 restart
```

Don't forget to add your local ip to /etc/hosts file:

```
127.0.0.1	digitalpolice.local
```

For nginx configuration please refer to [docs] (https://www.nginx.com/resources/wiki/start/topics/recipes/symfony/)

## Use composer to update vendors.

For installing composer, please refer to [composer docs](https://getcomposer.org/doc/00-intro.md):

```
$ php -r "readfile('https://getcomposer.org/installer');" | php
```

Update vendors:
```
$ sudo php composer.phar install
```

After installing vendors, you need set up permissions for cache and log directories:
```
$ HTTPDUSER=`ps axo user,comm | grep -E '[a]pache|[h]ttpd|[_]www|[w]ww-data|[n]ginx' | grep -v root | head -1 | cut -d\  -f1`
$ sudo setfacl -R -m u:"$HTTPDUSER":rwX -m u:`whoami`:rwX app/cache app/logs
$ sudo setfacl -dR -m u:"$HTTPDUSER":rwX -m u:`whoami`:rwX app/cache app/logs
```

## Node and less installation

You need nodejs and less installed to use bootstrap assets.

Node installation:
```
$ sudo apt-get install node
```

Less install:
```
$ sudo npm install -g less
```

Then you need to assure that the folder /usr/local/lib/node_modules contains the less module
and is properly configured in symfony's app/config.yml (section assetic.filters.less.node_paths)

Then clear your cache and install assets for prod environment:

```
$ app/console cache:clear --env=prod
$ app/console assets:install web --symlink --env="prod"
$ app/console assetic:dump --env="prod"
```