<?php

$artist_html .= <<<EOT

<li><b>$user_alias</b>
<ul>
<li>
<a class="gentext" href="index.php?query=$user_id&amp;request=search&amp;search_type=artistid">List $user_alias's Modules</a>
</li>
<li>
<a class="gentext" href="$user_link">View $user_alias's TMA profile</a>
</li>
<li>TMA Member ID: $user_id</li>
</ul>
</li>

EOT;

?>
