# RssNotify
Resources for rssnotify

## Popular public RSS News Feeds
<img align="left" src="https://github.com/gitveevo/rssnotify/blob/main/qrcodes/QRCNNTOPSTORIES.svg" width="150" height="150">

```
CNN Topstories
http://rss.cnn.com/rss/edition.rss
```

## Create your own feed ##
1) Create database and use schema.sql for the items table.
```sql
	CREATE TABLE `items` (
	  `id` int(11) NOT NULL AUTO_INCREMENT,
	  `guid` varchar(255) NOT NULL DEFAULT '',
	  `title` varchar(255) NOT NULL,
	  `description` text NOT NULL,
	  `link` varchar(255) NOT NULL,
	  `tstamp` datetime DEFAULT NULL,
	  PRIMARY KEY (`id`)
	) ENGINE=InnoDB
```
2) Place rssnotify.php on your webserver, and change the database-config.
```php
<?php
	$dbuser = "dbuser"; // Your dbuser
	$dbpass = "dbpass"; // Your db password
	$dbname = "dbname"; // Your database name
	$dbhost = "localhost"; // Your database host
```
3) Put in a few test-entries.
4) Navigate to this file via url in your browser to test it.

## RSS Format ##
If you want to create a feed on your own, please follow the following format
```rss
<?xml version="1.0" encoding="UTF-8" ?>
	<rss version="2.0">
		<channel>
			<title>RSS Notifier</title>
			<link>https://rssnotify.veevo-networks.com/news.xml</link>
			<description>XML Description</description>
			<language>de-de</language>
			<item>
				<guid isPermaLink="true">unique-id-oooggtooihhhoodsxxcgjdxxddsd</guid>
				<link>https://rssnotify.veevo-networks.com/</link>
				<title>Welcome to RSSNotify!</title>
				<description>This is the default RSS-Feed of RSSNotify. We will keep you up to date here. Have fun!</description>
				<pubDate>Sun, 17 Sep 2023 08:44:42 Z</pubDate>
			</item>
		</channel>
	</rss>
```
1) The link tag in item is optional
2) The guid MUST to be unique and permanent in the feed. If you generate a new unique-id on every request - it will notify you repeatedly.
```php
<?php
	//Best to use a md5 of a unique property of your rss-item. For example the link.
	$uid = "unique-id-".md5($item->link);
```
3) Make sure your web-server delivers the xml with xml mime-type.
```php
<?php
	header('Content-Type: text/xml');
```
