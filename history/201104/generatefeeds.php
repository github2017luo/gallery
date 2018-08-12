<?

echo "准备启动...<br>";

if ( isset($mysql_db) && isset($mysql_table) && isset($mysql_user)
	&& isset($mysql_pw) && isset($mysql_host) )
{
	$link = mysql_connect($mysql_host, $mysql_user, $mysql_pw);
	
	if ( !$link )
	{
		die("无法连接: " . mysql_error());
	}

	if ( !mysql_select_db($mysql_db) )
	{
		mysql_close($link);
		die("无法选择数据库: " . mysql_error());
	}

	$outXML = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n<rss>\n\t";
	$outXML .= "<options images=\"true\" fulltext=\"true\" />";
	$outXML .= "\n\t<feeds>";

	$query = "SELECT * FROM `" . $mysql_table . "`";
	echo "正在查询: $query<br>";
	$queryResult = mysql_query($query, $link);

	if ( !$queryResult )
	{
		mysql_close($link);
		die("无法查询: " . mysql_error());
	}

	$lastCategory = "";
	$categorySet = false;
	while ( $row = mysql_fetch_assoc($queryResult) )
	{
		if ( $lastCategory != $row['category'] )
			$outXML .= "\n\t\t</category";
		
		if ( $row['category'] == "" && !$categorySet )
		{
			$outXML .= "\n\t\t<category name=\"Feeds\">";
			$categorySet = true;
		}
		else if ( !$categorySet )
			$categorySet = true;
			
		if ( $row['category'] != "" )
		{
            // update
	        $lastCategory = $row['category'];

			$outXML .= "\n\t\t<category name=\"$lastCategory\">";
        }

		$outXML .= "\n\t\t\t";
		$outXML .= "<feed name=\"".$row['title']."\" url=\"" . $row['url'] . "\" />";
	}
	
	$outXML .= "\n\t\t</category>";

	$outXML .= "\n\t</feeds>\n</rss>";

	if ( file_put_contents($feeds_xml, $outXML) > 0 )
	{
        echo "<br>写入 \"$feeds_xml\"";
	}
	else
	{
        echo "<br>无法写入 \"$feeds_xml\"";
	}

	mysql_free_result($queryResult);
	mysql_close($link);
}
else
{
	echo "The following config values are set:\n";
	echo "$mysql_db\n";
	echo "$mysql_table\n";

	echo "$mysql_host\n";
	echo "$mysql_user\n";
	echo "$mysql_pw\n";
}

?>