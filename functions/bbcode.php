<?php

function tma_bbcode_kill($message) {
	return preg_replace("/\[(.*?)\](.*?)\[\/(.*?)\]/s","$2",$message);
}

function tma_bbcode_strip($message) {
        $message = preg_replace('/\b[a-z0-9]+:\/\/[a-z0-9\.\-]+(\/[a-z0-9\?\.%_\-\+=&\/]+)?/', ' ', $message);
        $message = preg_replace('/\[img:[a-z0-9]{10,}\].*?\[\/img:[a-z0-9]{10,}\]/', ' ', $message);
        $message = preg_replace('/\[\/?url(=.*?)?\]/', ' ', $message);
        $message = preg_replace('/\[\/?[a-z\*=\+\-]+(\:?[0-9a-z]+)?:[a-z0-9]{10,}(\:[a-z0-9]+)?=?.*?\]/', ' ', $message);
        $message   =       preg_replace("/\[url=(.+?)\](.+?)\[\/url\]/","<a href=\"\\1\">\\2</a>", $message);

        return $message;
}

function tma_bbcode_artist_module_description($text) {
        # Text formatting BBCode
        $text = tma_bbcode_basic($text);
        $text = tma_bbcode_songpage_inc($text);
	$text = tma_bbcode_url($text);
        return $text;
}

function tma_bbcode_profile($text) {
	$text = tma_bbcode_basic($text);
	$text = tma_bbcode_extra($text);
	$text = tma_bbcode_modlinks_inc($text);
	$text = tma_bbcode_songpage_inc($text);
	return $text;
}

function tma_bbcode_reviews($text) {
        # Text formatting BBCode
        $text = tma_bbcode_basic($text);
        $text = tma_bbcode_songpage_inc($text);
        return $text;
}

function tma_bbcode_comments($text) {
        # Text formatting BBCode
        $text = tma_bbcode_basic($text);
        $text = tma_bbcode_songpage_inc($text);
        return $text;
}

############################################################################
function tma_bbcode_basic($text) {
	# Basic BBCode Markup
        $text   =       preg_replace("/\[s\](.+?)\[\/s\]/","<s>\\1</s>", $text);
        $text   =       preg_replace("/\[b\](.+?)\[\/b\]/","<b>\\1</b>", $text);
        $text   =       preg_replace("/\[i\](.+?)\[\/i\]/","<i>\\1</i>", $text);
        $text   =       preg_replace("/\[u\](.+?)\[\/u\]/","<u>\\1</u>", $text);
	#$text   =       preg_replace("/\[img\]http:\/\/(.+?)\.(gif|png|jpg|bmp)\[\/img\]/i","<img src=\"http://\\1.\\2\"</img>", $text);
        return $text;
}

############################################################################
function tma_bbcode_extra($text) {
	# Extra BBCode 
        $text   =       str_replace("[hr]","</p><hr><p>", $text);
        $text   =       preg_replace("/(\[head])(.+)(\[\/head\])/","<span style=\"font-size: 18px;\">\\2</span>",$text);
        $text   =       preg_replace("/\[url=(http|https|mailto):\/\/(.+?)\](.+?)\[\/url\]/","<a href=\"\\1://\\2\">\\3</a>", $text);
	return $text;
}

############################################################################
function tma_bbcode_url($text) {
	# Just the URL
        $text   =       preg_replace("/\[url=(http|https|mailto):\/\/(.+?)\](.+?)\[\/url\]/","<a href=\"\\1://\\2\">\\3</a>", $text);
        return $text;
}


############################################################################
## SONGINFO PAGE LINKER - NEW

function tma_bbcode_songpage_inc($text) {
        # Song page
        $modpage_regex = "(\[modpage\])([0-9]+)(\[\/modpage\])";
        #$modpage_regex = "(\[modpage\])([A-Za-z0-9!_\-]+(.mod|.xm|.it|.s3m|.ahx|.hvl|.med|.mo3|.mtm|.stm|.mtm|.669))(\[\/modpage\])";
        $text =         preg_replace_callback("/$modpage_regex/i","tma_bbcode_modpage",$text);
        return $text;
}

function tma_bbcode_modpage($matches) {
        global $global_vars;
        $local_baseurl = $global_vars['local_http_path'];
        $local_script_downloads = $global_vars['path_http_script_downloads'];
        $local_script_index = $global_vars['path_http_script_index'];

        $moduleid = $matches[2];
        $request = "request=view_by_moduleid&query=$moduleid";
        $get_xml = tma_getxml($request);
        $xml = new SimpleXMLElement($get_xml);
        $results = $xml->results;
        $error =  $xml->error[0];
        if ($error != "") {
                return $error;
        }
        $i = 0;
        include 'includes/xml_module.php';

	$url = ("$local_baseurl/module.php?$module_id");
	#$url = ("$local_baseurl/$local_script_index?request=view_by_moduleid&amp;query=$module_id");
	$html  = <<<EOT
<a href="$url">$module_title</a>
EOT;
        return $html;
}

function tma_bbcode_modinfo($matches) {
        global $global_vars;
        $baseurl = $global_vars['path_http_base'];
        $download = $global_vars['path_http_download'];
	$message = "The code the artist has used here is no longer supported";
	return $message;
}


############################################################################
## MODLINKS COMBO INFO LINKER - NEW
function tma_bbcode_modlinks_inc($text) {
       # Module Info Combo
        $modlinks_regex = "(\[modlinks\])([0-9]+)(\[\/modlinks\])";
        $text =         preg_replace_callback("/$modlinks_regex/","tma_bbcode_modlinks",$text);
        return $text;
}

function tma_bbcode_modlinks($matches) {
        global $global_vars;

        $local_baseurl = $global_vars['local_http_path'];
	$local_script_downloads = $global_vars['path_http_script_downloads'];
        $local_script_index = $global_vars['path_http_script_index'];

        $moduleid = $matches[2];

	$request = "request=view_by_moduleid&query=$moduleid";
        $get_xml = tma_getxml($request);
        $xml = new SimpleXMLElement($get_xml);
        $results = $xml->results;
        $error =  $xml->error[0];
        if ($error != "") {
		return $error;
        }
	$i = 0;
	include 'includes/xml_module.php';

        $html = <<<EOT
	<span class="gentext">[<a class="bigbiglink fakebuttonsmall" href="$local_script_downloads?moduleid=$module_id">Download</a>] <a class="bigbiglink" href="$local_baseurl/$local_script_index?request=view_by_moduleid&amp;query=$module_id">$module_title</a> ($module_filename)</span>
EOT;
        return $html;
}

?>
