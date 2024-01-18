<?php
ob_start();
session_start();


if (
 !isset($_SESSION['the_web_server_created_the_session']) ||
 $_SESSION['the_web_server_created_the_session'] !== TRUE ||
 !isset($_SESSION['user_ip_binded_to_session']) ||
 $_SESSION['user_ip_binded_to_session'] != $_SERVER['REMOTE_ADDR']
) {
 foreach ($_SESSION as $key => $value) unset($_SESSION[$key]);
 session_regenerate_id();
 $_SESSION['the_web_server_created_the_session'] = TRUE;
 $_SESSION['user_ip_binded_to_session'] = $_SERVER['REMOTE_ADDR'];
}

	# This is a demo just to show the ropes of how some of the API works and wasn't
	# initially intended for public release. 
	# Also, this was the bootstrap that evolved into Modarchive.org Version 4.0, as a
	# complete re-write from Version 3.0

        $global_vars = array();
        $global_vars['app_path'] = "xml-tools.php";
        $global_vars['http_path'] = "https://modarchive.org/data";
        $global_vars['local_http_path'] = 'http://orgasmod.com';
        $global_vars['path_http_script_downloads'] = "https://api.modarchive.org/downloads.php";
        $global_vars['path_http_script_index'] = "index.php";

	# Syndication Key - note - Orgasmod features require a level 10 key which is NOT
	# available to the general public. Most site features will work with level 3 key with the
	# exception of member profile data. This limit is basically to stop people ripping
	# off the entire site. You may request an API key via modarchive forums 
	# for the purposes of making your own app. Keys will be revoked if I just find a copy 
	# of orgasmod running on the end of it though.
	#
	# This is a demo just to show the ropes of how some of the API works and wasn't
	# initially intended for public release. 
	#
	#
	# API Key goes here, everything is passed in the open over a GET request so, you know
	# its meant to be run locally on the same server as the database system, but it can
	# and will run across the network from a remote host, but exposes the key...
        $global_vars['site_key'] = "ENTER KEY";
	
	# Location of the CURL binary
	# note: by default, CURL is not used, instead PHP file_get_contents function is unless this variable is set.
	# CURL may be located in /usr/local/bin/curl  or /usr/bin/curl. It is recommended you do not rely on CURL.
	#$global_vars['curl_path'] = "/usr/local/bin/curl";

?>
