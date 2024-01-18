<?php
       if($module_url == "SYNCING") {
		$module_syncing_info = "title='Distributing to mirrors. Takes up to 4 hours'";
                $module_download_url = "<span $module_syncing_info class='spotlight tiny'>Download Syncing</span>";
		$module_download_url_bigbiglink =  "<span $module_syncing_info class='fakebuttongrey'>Download Syncing</span>";
		$module_download_url_tiny =  "<span $module_syncing_info class='fakebuttonsmallgrey'>Download Syncing</span>";
		$module_download_url_biglink =  "<span $module_syncing_info class='spotlight tiny'>Download Syncing</span>";
		$module_dlok = "0";
        } else {
		$module_dlok = "1";
                $module_download_url_bigbiglink = "<a class='bigbiglink fakebutton' href='$module_url'>Download</a>";
                $module_download_url_tiny = "<a class='bigbiglink fakebuttonsmall' href='$module_url'>Download</a>";
                $module_download_url_biglink = "<a class='biglink' href='$module_url'>Download</a>";
                $module_download_url = "<a href='$module_url'>Download</a>";

        }

	if ($module_dlok == "1") {
		$module_url_test = 0;
		$module_url_test = (preg_match("/^(MOD$|S3M$|XM$)/i",$module_format)) ? 1 : $module_url_test;
		$module_url_test = ($module_bytes > "1957728") ? 0 : $module_url_test;
               	$module_play_url_bigbiglink = ($module_url_test == 1) ? "<a title='Play module' class=\"bigbiglink fakebuttonok\" href=\"javascript:popUpKeep('$script_url?request=player&amp;query=$module_id&amp;noclose=1',550,350);\">Play</a>" : "<span class='fakebuttongrey' title='Format or Filesize not supported by player'>Play</span>";
               	$module_play_url_tiny = ($module_url_test == 1) ? "<a title='Play module' class=\"biglink fakebuttonsmallok\" href=\"javascript:popUpKeep('$script_url?request=player&amp;query=$module_id&amp;noclose=1',550,350);\">Play</a>" : "<span class='fakebuttonsmallgrey' title='Format or Filesize not supported by player'>Play</span>";
	} else {
		$module_play_url_tiny = "";
		$module_play_url_bigbiglink = "";
	}
		
$module_view_url = <<<EOT
<a class="bigbiglink fakebutton" href="module.php?$module_id">View</a>
EOT;
$module_view_url_tiny = <<<EOT
<a class="biglink fakebuttonsmall" href="module.php?$module_id">View</a>
EOT;

$module_view_link = <<<EOT
$local_http_path/module.php?$module_id
EOT;
?>
