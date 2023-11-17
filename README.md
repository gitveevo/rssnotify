# rssnotify
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
