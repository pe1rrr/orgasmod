<?php
if ($comment_first == "") {
        $member_comment_html .= "<div style='padding: 10px;'><h2 class='title'><img src='style/images/icons/comments.png' class='middle' alt='comments'>&nbsp;Comments</h2></div>";
        $comment_first = 1;
	$comment_class = "noborderbox";
} else {
	$comment_class = "borderbox";
}

$member_comment_html .= <<<EOT
<div class="$comment_class faded">
<p class="gentext"><img width="40" height="40" src="$membercomment_imageurl" align="left" style="padding: 4px;"> $membercomment_text</p>
<p>
Posted by <a class="bigbiglink faded" href="member.php?$membercomment_userid">$membercomment_alias</a> on $membercomment_date
</p>
</div>

EOT;

?>
