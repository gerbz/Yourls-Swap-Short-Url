# Yourls Swap Short Url

	For tricky setups that require your short url to reside in a different location than your yourls installation
	

#### Example Cases
1. I want to use http://shorturl.com as my short url but I want to install it at http://shorturl.com/yourls/
2. I want to use http://sho.rt as my short url but I want to install it at http://longurl.sho.rt

#### Requirements
[Yourls v1.7.4](https://github.com/YOURLS/YOURLS/releases/tag/1.7.4)


#### Installation
1.	place the **/swap-short-url/** directory in yourls **/user/plugins/** directory
2.	in **config.php** point **YOURLS_SITE** to the location of your yourls installation 
3.	in **config.php**, at the very end, define the short url you wish to share with the public after "Personal settings..." Example: <code>define( 'YOURLS_SHORT_URL', 'http://shorturl.com' );</code>
4.	Modify the **.htaccess** file at the location defined by **YOURLS_SHORT_URL** *(see below)*
5.	Activate the plugin by clicking **Manage Plugins** at the top of the admin interface and then clicking **Activate** next to the Swap Short URL plugin


### htaccess
You need to direct traffic from your defined short url to your yourls installation.  To do this, create (or modify) an .htaccess file in the directory you defined as your **YOURLS_SHORT_URL** with the following:

```
RewriteEngine On
RewriteBase /

# BEGIN YOURLS

RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d

RewriteRule ^([0-9A-Za-z]+)/?$ http://shorturl.com/yourls/yourls-go.php?id=$1 [L]
RewriteRule ^([0-9A-Za-z]+)\+/?$ http://shorturl.com/yourls/yourls-infos.php?id=$1 [L]
RewriteRule ^([0-9A-Za-z]+)\+all/?$ http://shorturl.com/yourls/yourls-infos.php?id=$1&all=1 [L]

# END YOURLS
```

#### Issues
.htaccess is tricky and everyon's setup will be slightly different so that part is on you.  Otherwise, feel free to submit problems feature requests using the [GitHub issue tracker](https://github.com/ggwarpig/Yourls-Swap-Short-Url/issues)


---
developed by [@gerbz](http://twitter.com/gerbz)
