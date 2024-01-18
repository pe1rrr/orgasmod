<?php
$previous_search = $_SESSION['query'];
$search_form = <<<EOT
<form action="index.php" method="GET">
<ul class="nolist">
<li><img src="style/images/icons/magnifier.png" class="middle" alt="find">
&nbsp;<input type="text" name="query" class="input" value="$previous_search">
<input type="submit" name="submit" value="Find">
<input type="hidden" name="request" value="search">
<input type="hidden" name="search_type" value="filename_or_songtitle">
</li>
</ul>
</form>
EOT;

?>
