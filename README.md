# RssNotify
Resources for rssnotify

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
