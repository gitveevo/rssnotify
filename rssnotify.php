<?php
	// --- Config ---
	$dbuser = "dbuser"; // Your dbuser
	$dbpass = "dbpass"; // Your db password
	$dbname = "dbname"; // Your database name
	$dbhost = "localhost"; // Your database host

	$rsstitle = "My Feed"; // Your feed title
	$rsslink = "https://rssnotify.veevo-networks.com/personalfeed.xml"; // Your feed link
	$rssdescription = "Personal feed for RssNotify"; // Your feed description
	$rsslang = "de-de"; // en-en for english feeds. ( Just for rss validity, is never used somewhere. )

	$resultlimit = 100;
	// --- Config ---

	$dsn = "mysql:host=".$dbhost.";dbname=".$dbname.";charset=utf8mb4";
	$options = [
	  	PDO::ATTR_EMULATE_PREPARES   => false,
	  	PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
	  	PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
	];
	try {
	  	$pdo = new PDO($dsn, $dbuser, $dbpass, $options);
	  	$items = $pdo->query("SELECT * FROM items ORDER BY id DESC LIMIT ".$resultlimit)->fetchAll();
	  
	  	if(sizeof($items)>0){
	  		$result = '<?xml version="1.0" encoding="UTF-8" ?>
						<rss version="2.0">
							<channel>
								<title>'.$rsstitle.'</title>
								<link>'.$rsslink.'</link>
								<description>'.$rssdescription.'</description>
								<language>'.$rsslang.'</language>';
		  	foreach($items as $item){
		  		$result .= '<item>
								 <guid isPermaLink="true">unique-id-'.sha1("$$SALTY$$RSS$Notify$".$item->id).'</guid>
								 <link>'.$item->link.'</link>
								 <title>'.$item->title.'</title>
								 <description>'.$item->description.'</description>
								 <pubDate>'.$item->tstamp.'</pubDate>
							</item>
							';
		  	}
		  	$result .= '	</channel>
						</rss>';
		}else{
			die("Result empty.");
		}

		header('Content-Type: text/xml');
		echo str_replace("\t", "", $result);

	} 
	catch (Exception $e) {
	  error_log($e->getMessage());
	  exit('Database error.'); 
	}
