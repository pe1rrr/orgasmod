<?php

$html .= <<<EOT
<td valign="top" width="33%" class="center">
<div style="padding-left: 10px; padding-right:10px;">
<a class="middle" href="member.php?$spotlight_userid">
<img src="$spotlight_imageurl" border="0" class="middle" style="padding: 4px;">
</a>
<br>
<a href="member.php?$spotlight_userid" class="bigbiglink">$spotlight_alias</a>
<br>
<div class="bgspotlight-box faded">
$spotlight_blurb
</div>
</div>
</td>

EOT;

?>
