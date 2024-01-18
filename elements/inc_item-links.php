<?php

# Back Button Link
$backlink_request_type = $_GET['request'];
if ($backlink_request_type != "") {
        $back_link = <<<EOT
<a href="#"><img class="middle"  onClick='history.go(-1)' src="style/images/icons/arrow_left.png" border="0"></a>
<a class="bigbiglink faded middle" href="#" onClick='history.go(-1)'>Back</a>
<br>
<br>
EOT;

}

# Comments Posted Link
if ($profile_member_comments != "0") {
	$comments_link = <<<EOT
<a href="comments.php?$profile_userid"><img class="middle" src="style/images/icons/link_go.png" border="0"></a>
<a class="bigbiglink faded middle" href="comments.php?$profile_userid">Posted Comments</a>
<br>
<br>
EOT;
}


# Artist Link
if ($profile_isartist == "1") {
        $artist_link = <<<EOT
<a class='bigbiglink' href='http://modarchive.org/member.php?$profile_userid'>
<img src="style/images/icons/world_go.png" border="0" class="middle">
</a>
<a class='bigbiglink faded middle' href='http://modarchive.org/member.php?$profile_userid'>
Composer Page
</a>
<br><br>
EOT;
}

$links_html = <<<EOT
<div class="gentext borderbox" style="min-height: 250px;">
<h1 class='title'>Links</h1>
<p>
<a href="favs.php?$profile_userid"><img class="middle" src="style/images/icons/link_go.png" border="0"></a>
<a class="bigbiglink faded middle" href="favs.php?$profile_userid">Favourites</a>
<br>
<br>
<a href="tma.php?$profile_userid"><img class="middle" src="style/images/icons/link_go.png" border="0"></a>
<a class="bigbiglink faded middle" href="member.php?$profile_userid">Profile</a>
<br>
<br>
$comments_link
<a href="tma.php?$profile_userid"><img class="middle" src="style/images/icons/world_go.png" border="0"></a>
<a class="bigbiglink faded middle" href="tma.php?$profile_userid">External Profile</a>
<br><br>
$artist_link
$back_link
</p>
</div>
EOT;
?>
