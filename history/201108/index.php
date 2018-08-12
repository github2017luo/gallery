<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Life Is So Happy</title>
<link rel="stylesheet" href="css/global.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
<script src="js/slides.min.jquery.js"></script>
<script>
$(function(){
// Set starting slide to 1
var startSlide = 1;
// Get slide number if it exists
if (window.location.hash) {
	startSlide = window.location.hash.replace('#','');
}
// Initialize Slides
$('#slides').slides({
	preload: true,
	preloadImage: 'img/loading.gif',
	generatePagination: true,
	play: 0,
	pause: 2500,
	hoverPause: true,
	// Get the starting slide
	start: startSlide,
	animationComplete: function(current){
		// Set the slide number as a hash
		window.location.hash = '#' + current;
	}
});
		});
	</script>
</head>
<body>
	<div id="container">
    <div id="slides">
	<div class="slides_container">
		<div class="slide" style="background: url(http://oi52.tinypic.com/28mpabb.png) no-repeat;">
<p><a href="cn.php">中文版</a></p>
<h1>lishuhang.com</h1>
<p><a href="#2" class="link">Microblog Updates</a></p>
<p><a href="#3" class="link">Blog Posts</a></p>
<p><a href="#4" class="link">Shared Articles</a></p>
<p><a href="#5" class="link">Books &amp; ACG</a></p>
<p><a href="#6" class="link">Gallery</a></p>
<p><a href="#7" class="link">About / Contact Me</a></p>
<hr width="300px" align="left">
<!-- Include the Google Friend Connect javascript library. -->
<script type="text/javascript" src="http://www.google.com/friendconnect/script/friendconnect.js"></script>
<!-- Define the div tag where the gadget will be inserted. -->
<div id="div-5903257439862927123" style="width:400px;"></div>
<!-- Render the gadget into a div. -->
<script type="text/javascript">
var skin = {};
skin['FONT_FAMILY'] = 'garamond,serif';
skin['BORDER_COLOR'] = 'transparent';
skin['ENDCAP_BG_COLOR'] = '#333333';
skin['ENDCAP_TEXT_COLOR'] = '#ffffff';
skin['ENDCAP_LINK_COLOR'] = '#ffff66';
skin['ALTERNATE_BG_COLOR'] = '#999999';
skin['CONTENT_BG_COLOR'] = '#666666';
skin['CONTENT_LINK_COLOR'] = '#ffff66';
skin['CONTENT_TEXT_COLOR'] = '#ffffff';
skin['CONTENT_SECONDARY_LINK_COLOR'] = '#ffff33';
skin['CONTENT_SECONDARY_TEXT_COLOR'] = '#cccccc';
skin['CONTENT_HEADLINE_COLOR'] = '#cccccc';
skin['NUMBER_ROWS'] = '6';
google.friendconnect.container.setParentUrl('/' /* location of rpc_relay.html and canvas.html */);
google.friendconnect.container.renderMembersGadget(
 { id: 'div-5903257439862927123',
   site: '17571183092939130416' },
  skin);
</script>
<hr width="300px" align="left">
<p><a href="/old"><img src="http://img4.cache.netease.com/tech/2011/7/15/2011071500583883277.jpg"><br>
Return to old version</a></p>
		</div>
		<div class="slide" style="background: url(http://oi52.tinypic.com/546k2o.jpg) no-repeat;">
<p><a href="#1" class="link">Back</a></p>
<h1>@lishuhang</h1>
<p><a href="https://twitter.com/lishuhang/" target="_blank">Twitter</a> | <a href="http://weibo.com/lishuhang/" target="_blank">Sina</a> | <a href="http://t.163.com/lishuhang/" target="_blank">NetEase</a> | <a href="https://twitter.com/lishuhang/" target="_blank">Tencent</a> | <a href="http://t.sohu.com/lishuhang/" target="_blank">Sohu</a> | <a href="http://fanfou.com/lishuhang/" target="_blank">Fanfou</a></p>
<!--<p><?php include("loading.php"); ?>-->
<script type="text/javascript">
$(document).ready(function() {
    $.ajax({
     type:"GET",
     url:"rss2.php",
     beforeSend:load2,//执行ajax前执行load2函数.直到success
     success:Resp2 //成功时执行Resp2函数
    });
});
   function load2(){
    $('#loadbox2').html('LOADING...');
   }
   function Resp2(data){
    $('#loadbox2').html(data);
   }
</script> 
<div id="loadbox2">Unable to load.</div> 
		</div>
		<div class="slide" style="background: url(http://oi53.tinypic.com/24yz4ig.jpg) no-repeat;">
<p><a href="#1" class="link">Back</a></p>
<h1>Blog</h1>
<p><a href="/blog/" target="_blank">Blog (Chinese)</a> | <a href="https://www.google.com/profiles/lishuhang" target="_blank">Google+</a> | <a href="http://www.facebook.com/lishuhang" target="_blank">Facebook</a> | <a href="http://www.renren.com/profile.do?id=229979465" target="_blank">Renren</a></p>
<script type="text/javascript">
$(document).ready(function() {
    $.ajax({
     type:"GET",
     url:"rss3.php",
     beforeSend:load3,
     success:Resp3
    });
});
   function load3(){
    $('#loadbox3').html('LOADING...');
   }
   function Resp3(data){
    $('#loadbox3').html(data);
   }
</script> 
<div id="loadbox3">Unable to load.</div> 
		</div>
	  <div class="slide" style="background: url(http://oi53.tinypic.com/21addg7.png) no-repeat;">
<p><a href="#1" class="link">Back</a></p>
<h1>Shared</h1>
<p><a href="https://www.google.com/reader/shared/lishuhang" target="_blank">Google Reader Share</a> | <a href="http://lishuhang.com/blog/category/reviews/%E7%B2%BE%E9%80%89%E9%98%85%E8%AF%BB/" target="_blank">Biweekly Recommendations (Chinese)</a></p>
<script type="text/javascript">
$(document).ready(function() {
    $.ajax({
     type:"GET",
     url:"rss4.php",
     beforeSend:load4,
     success:Resp4
    });
});
   function load4(){
    $('#loadbox4').html('LOADING...');
   }
   function Resp4(data){
    $('#loadbox4').html(data);
   }
</script> 
<div id="loadbox4">Unable to load.</div> 

		</div>
	  <div class="slide" style="background: url(http://oi51.tinypic.com/amsght.png) no-repeat;">
<p><a href="#1" class="link">Back</a></p>
<h1>Books &amp; ACG</h1>
<p><a href="http://www.douban.com/people/perf/" target="_blank">Douban</a> | <a href="http://bgm.tv/user/lishuhang/timeline" target="_blank">Bangumi</a></p>
<script type="text/javascript">
$(document).ready(function() {
    $.ajax({
     type:"GET",
     url:"rss5.php",
     beforeSend:load5,
     success:Resp5
    });
});
   function load5(){
    $('#loadbox5').html('LOADING...');
   }
   function Resp5(data){
    $('#loadbox5').html(data);
   }
</script> 
<div id="loadbox5">Unable to load.</div> 

		</div>
		<div class="slide" style="background: url(http://i56.tinypic.com/30k6fid.png) no-repeat;">
<p><a href="#1" class="link">Back</a></p>
<h1>Gallery</h1>
<p><a href="163.html">My works @ NetEase Tech (Chinese)</a></p>
<p>More to come...</p>
		</div>
		<div class="slide" style="background: url(http://oi51.tinypic.com/2ia5pb7.png) no-repeat;">
<p><a href="#1" class="link">Back</a></p>
<h1>About / Contact</h1>
<p>James (Shuhang) Li</p>
<p>cnBeta.com</p>
<p>tech.163.com</p>
<p>kenengba.com</p>
<p>hexieshe.com</p>
<hr width="300px" align="left">
<p>F25, Block D<br>
Qidi Technology Building (Torch Building)<br>
Thinghua University Science Park<br>
No.1 East Zhongguancun Road<br>
Haidian District, Beijing 100084<br>
China</p>
<hr width="300px" align="left">
<p>Email: <a href="mailto:lishuhang@gmail.com">lishuhang#gmail.com</a></p>
<p><a target="_blank" href="http://settings.messenger.live.com/Conversation/IMMe.aspx?invitee=d8b1b8ad7fc8cb04@apps.messenger.live.com"><img src="http://messenger.services.live.com/users/d8b1b8ad7fc8cb04@apps.messenger.live.com/presenceimage?mkt=en-US" />Chat via Live Messenger (MSN)</a></p>
<p><a href="http://www.google.com/talk/service/badge/Start?tk=z01q6amlqqvhte85ov2usfn81s69c73odjpp5jp8ed3dr2gk12jthbfslm1umipo6rc9b47jf7kuetbm15d1vm4akaj6r6gdjo7sbpoobs5karrs4i7n93s9rjrb1k86602mrglktf36qbj2rtmc4j2radblscm3urafcfe7i" target="_blank"><img src="http://www.google.com/talk/service/badge/Show?tk=z01q6amlqqvhte85ov2usfn81s69c73odjpp5jp8ed3dr2gk12jthbfslm1umipo6rc9b47jf7kuetbm15d1vm4akaj6r6gdjo7sbpoobs5karrs4i7n93s9rjrb1k86602mrglktf36qbj2rtmc4j2radblscm3urafcfe7i" alt=""> Chat via Google Talk</a></p>
<p><a target="_blank" href="http://sighttp.qq.com/authd?IDKEY=606f70c867175e3eb41e8d8d635fc26e16e68e601b99004c"><img border="0"  src="http://wpa.qq.com/imgd?IDKEY=606f70c867175e3eb41e8d8d635fc26e16e68e601b99004c&pic=4" alt="Chat via QQ" title="Chat via QQ"> Chat via QQ</a></p>
<hr width="300px" align="left">
<form action="http://pushme.to/lishuhang/" method="POST" target="_blank">
Type some messages below:<br/>
<input type="hidden" name="_encoding" value="UTF-8"></input>
<textarea style="width:300px;height:200px;" name="message"></textarea>
<br/>Your Email Address(I won't collect it):<br/>
<input style="width:300px;" type="text" name="signature" value=""/>
<br/><input type="submit" value="Send to me Instantly"/></form>
		</div>
	</div>
	<a href="#" class="prev">&lt;</a>
	<a href="#" class="next">&gt;</a>
</div>
		<div id="footer">
<p>&copy; 2011 LJ. All rights reserved. <a href="http://slidesjs.com" target="_blank">Slider</a> by <a href="http://www.premiumpixels.com/" target="_blank">Orman Clark</a> is licensed under the <a href="http://www.apache.org/licenses/LICENSE-2.0" target="_blank">Apache license</a>.</p>
		</div>
	</div>
<!-- Place this tag in your head or just before your close body tag -->
<script type="text/javascript" src="http://apis.google.com/js/plusone.js">
  {lang: 'zh-CN'}
</script>
<script id="aptureScript">
(function (){var a=document.createElement("script");a.defer="true";a.src="http://www.apture.com/js/apture.js?siteToken=6SUkLwa";document.getElementsByTagName("head")[0].appendChild(a);})();
</script>
</body>
</html>
