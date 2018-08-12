<?php

header('Content-type: text/xml; charset=utf-8');

// This allows for the Digg feed to work properly
ini_set("user_agent", $_SERVER['SERVER_NAME']);

if ( isset($_GET['loadfeed']) )
{
	if ( $_GET['loadfeed'] != "" )
	{
		// we need to make sure we add this back on - get the data from the interwebs
		$feed = "http://" . $_GET['loadfeed'];
		
		// Make sure we are using the correct encoding... it needs to be in UTF-8
		$data = trim( file_get_contents(htmlspecialchars_decode($feed)) );

		// load the particular feed
		$xml = simplexml_load_string($data);
		
		if ( !$xml )
		{
			echo "Error Loading Feed: ".htmlentities($_GET[loadfeed])."<br>";
			return;
		}
		
		// Show an image header if it exists
		if ( $xml->channel->image->url != "" )
		{
			$url = $xml->channel->image->url;
			$title = $xml->channel->image->title;
			echo "<img src=\"$url\" alt=\"$title\" style=\"margin-bottom: 10px;\">";
		}
		
		foreach($xml->xpath('//item') as $item)
		{
			// Let's put all this in a div
			echo "<div>";
			// show the link
			echo "<a class=\"rss_link\" href=\"$item->link\" target=\"_blank\">";
			// show the title
			echo "<font class=\"rss_title\">$item->title</font>";
			echo "</a>"; // end the link
			// echo "<a class=\"top\" href=\"#top\">Top</a>";
			
			echo "<font class=\"rss_date\">$item->pubDate</font>";
			
			// show the description if desired
			if ( isset($_GET['fulltext']) && $_GET['fulltext'] == "true" )
			{
				if ( isset($_GET['showimages']) && $_GET['showimages'] == "false" )
				{
					$description = strip_tags($item->description,'<a>');
					echo "<font class=\"rss_description\">$description</font><br>";
				}
				else
					echo "<br><font class=\"rss_description\">$item->description</font>";
			}
			echo "<hr size=\"1\" style=\"color:gray\"></div>";
		}
	}
	else
	{
		
	}
}

?>