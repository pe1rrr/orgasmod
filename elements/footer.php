<?php
// HTML Template


$foot_request_type = $_GET['request'];
if ($foot_request_type != "") {
	$back_button = "<p style='padding: 10px;'><a class='button' href='#' onClick='history.go(-1)'>Back</a>&nbsp; <a class='button' href='index.php'>Home</a>&nbsp;</p>";
}

if ($sponsor_name != "") {
	$sponsor_html = "<p class='tiny'>Supported by <a href='$sponsor_url'>$sponsor_name</a></p>";
}
$html = <<<EOT
<div class="bgfooter gentext">
$back_button
</div>

<table>
<tr>
<td align="right" valign="top">
<p class="tiny">Content syndicated from <a title="The Mod Archive" href="http://modarchive.org">The Mod Archive</a></p>
$sponsor_html
<p class="tiny">Website design &amp; systems &copy;2004-2024 by m0d<br>
This is the old API test site used to bootstrap Modarchive v4.0a<br>
Resurrected for lols. Sadly not HTTPS just yet, but may <a href="https://www.stef.be/bassoontracker/">bassoon</a>.<br>
</td>
<td align="right" width="120" valign="top">
<a href="http://ko-fi.com/redheat">Buy m0d a coffee or something nice - limited time offer! - cancer sucks!</a></p>
&nbsp;
</td>
</tr>
</table>
</div>

<div style="padding: 0px; max-width: 800px; margin-left:auto; margin-right:auto;">
<b class="rbottom"><b class="r4">&nbsp;</b><b class="r3">&nbsp;</b><b class="r2">&nbsp;</b><b class="r1">&nbsp;</b></b>

</div>
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-6779258-1");
pageTracker._trackPageview();
} catch(err) {}</script>

</body>

</html>

EOT;

print $html;

?>
