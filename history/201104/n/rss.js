var XMLHttpRequestObject = false;
var img = new Image();
img.src = "n/loading.gif";

if ( window.XMLHttpRequest )
XMLHttpRequestObject = new XMLHttpRequest();
else if (window.ActiveXObject)
XMLHttpRequestObject = new ActiveXObject("Microsoft.XMLHTTP");

function changeOptions()
{
LoadFeed();
}

function LoadFeed(value, initial)
{
if ( XMLHttpRequestObject )
{
var dsource = "n/ajax.php?loadfeed";

if (value)
dsource += "=" + value;
else
{
var val = document.getElementById("rss_feed").value;
if ( val == "" )
document.getElementById("rss_feed").selectedIndex += 1;

dsource += "=" + document.getElementById("rss_feed").value;
}

dsource += "&fulltext=" + document.getElementById("showtext").checked;
dsource += "&showimages=" + document.getElementById("showimages").checked;

XMLHttpRequestObject.open("GET",dsource);
XMLHttpRequestObject.onreadystatechange = function()
{
if ( XMLHttpRequestObject.readyState != 4 )
{
document.getElementById("rss_div").innerHTML = "<center><img class=\"loading\" src=\"" + img.src + "\"></center>";
}

if ( XMLHttpRequestObject.readyState == 4 &&
XMLHttpRequestObject.status == 200 )
{
document.getElementById("rss_div").innerHTML = XMLHttpRequestObject.responseText;
}
}
XMLHttpRequestObject.send(null);
}
}
