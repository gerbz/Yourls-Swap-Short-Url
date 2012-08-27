# Yourls Swap Short Url

	For tricky setups that require your short url to reside in a different location than your yourls installation
	

#### Example Cases
1. I want to use http://shorturl.com as my short url but I want to install it at http://shorturl.com/yourls/
2. I want to use http://sho.rt as my short url but I want to install it at http://longurl.sho.rt

####Requirements
[yourls](http://code.google.com/p/yourls/yourls) [1.5](http://code.google.com/p/yourls/downloads/list) or [1.5.1](http://code.google.com/p/yourls/source/checkout)


####Installation
1.	place the **/modify-short-url** directory in yourls **user/plugins** directory
2.	set **YOURLS_SITE** to the location of your yourls installation in **config.php**
3.	define the short url you wish to share with the public at the end of your **config.php** after "Personal settings..." Example: <code>define( 'YOURLS_SHORT_URL', 'http://shorturl.com' );</code>
4.	Modify the **.htaccess** file at the location defined by **YOURLS_SHORT_URL** *(see below)*

#### Htaccess
You need to direct traffic from your defined short url to your yourls installation.  To do this, create (or modify) an .htaccess file in the directory you defined as your **YOURLS_SHORT_URL** with the following:

<code>
RewriteEngine On

<code>
RewriteBase /

<code>
\# BEGIN YOURLS

<code>
RewriteCond %{REQUEST_FILENAME} !-f

<code>
RewriteCond %{REQUEST_FILENAME} !-d

<code>
RewriteRule ^([0-9A-Za-z]+)/?$ http://shorturl.com/yourls/yourls-go.php?id=$1 [L]

<code>
RewriteRule ^([0-9A-Za-z]+)\+/?$ http://shorturl.com/yourls/yourls-infos.php?id=$1 [L]

<code>
RewriteRule ^([0-9A-Za-z]+)\+all/?$ http://shorturl.com/yourls/yourls-infos.php?id=$1&all=1 [L]

<code>
\# END YOURLS
</code>

#### Issues
.htaccess is tricky and everyon's setup will be slightly different so that part is on you.  Otherwise, feel free to submit problems feature requests using the [GitHub issue tracker](https://github.com/ggwarpig/Yourls-Modify-Short-Url/issues)


---
developed by [@greg_gerber](http://twitter.com/greg_gerber)