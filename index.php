<?php

include 'includes/connect.php';
include 'functions/favourites.php';
include 'functions/comments.php';
include 'functions/search.php';
include 'functions/profile.php';
include 'functions/bbcode.php';
include 'elements/doctype.php';
$format_regex = "/^(XM$|AHX$|HVL$|MO3$|MED$|MOD$|S3M$|IT$|MTM$|STM$|669$)/i";

// Set format filter 

// Handle Input
        $raw_request_query = stripslashes($_GET['query']);
        $raw_request_query = str_replace("\"","",$raw_request_query);
        if (!tma_check_sanity($raw_request_query)) {
                $raw_request_query = tma_clean_query($raw_request_query);
        }
        $request_query = tma_sanitize_query($raw_request_query);
        # Request query is encoded to allow & character via URL
        $request_query = urlencode($request_query);
	$request_order = tma_sanitize($_GET['order']);


	##### PAGEINATION #####
        $request_page = tma_sanitize($_GET['page']);
	if ($request_page != "") {
		if (!preg_match("/^[0-9]+$/", $request_page)) {
			$message = "Invaild page number";
			include 'elements/header.php';
			exit(tma_error($message,"index.php"));
		}	
	}

        ##### MODULE PLAYER #####
        if ($_GET['player'] == "1") {
                $_SESSION['player'] = "1";
                $player_switch_html = "<span class='headerlink'>Java player <a href='index.php?player=0'>enabled</a></span>";
        } elseif ($_GET['player'] == "0") {
                $_SESSION['player'] = "";
                $player_switch_html = "<span class='headerlink'>Java player <a href='index.php?player=1'>disabled</a></span>";
        } else {
                if ($_SESSION['player'] == "1") {
                        $player_switch_html = "<span class='headerlink'>Java player <a href='index.php?player=0'>enabled</a></span>";
                } else {
                        $player_switch_html = "<span class='headerlink'>Java player <a href='index.php?player=1'>disabled</a></span>";
                }
        }
	
	##### REQUEST METHOD #####
        $request_type = tma_sanitize($_GET['request']);
        if ($request_type == "view_by_moduleid") {
                $request = "request=view_by_moduleid&query=$request_query&opt-com=1";
		$get_xml = tma_getxml($request);
        } elseif ($request_type == "view_member_favourites" && $request_query != "") {
                $request = "request=view_member_favourites&query=$request_query&page=$request_page&order=$request_order";
                $get_xml = tma_getxml($request);
	} elseif ($request_type == "search") {
	        include 'elements/header.php';
                $search_type = tma_sanitize($_GET['search_type']);
                $_SESSION['query'] = urldecode($request_query);
                $_SESSION['search_type'] = $search_type;
                if ($search_type == "filename") {
                        $request = "request=search&type=filename&query=$request_query&format=$request_format&page=$request_page";
                        $get_xml = tma_getxml($request);
                } elseif ($search_type == "filename_or_songtitle") {
                        $request = "request=search&type=filename_or_songtitle&query=$request_query&format=$request_format&page=$request_page";
                        $get_xml = tma_getxml($request);
		} elseif ($search_type == "filename_and_songtitle") {
                        $request = "request=search&type=filename_and_songtitle&query=$request_query&format=$request_format&page=$request_page";
                        $get_xml = tma_getxml($request);
		} else {
			die("Error! Mmmmm pie");
		}
		$xml = new SimpleXMLElement($get_xml);
		include 'elements/page-search.php';
                include 'elements/footer.php';
		exit();
	} elseif ($request_type == "view_members") {
	        include 'elements/header.php';
		$request = "request=view_favourite_lists&limit=$request_limit&order=$request_order&page=$request_page";
                $get_xml = tma_getxml($request);
                $xml = new SimpleXMLElement($get_xml);
                include 'elements/page-members.php';
                include 'elements/footer.php';
                exit();
	} elseif ($request_type == "view_member_comments") {
                include 'elements/page-members_comments.php';
                include 'elements/footer.php';
                exit();
	} elseif ($request_type == "view_intro") {
	        include 'elements/header.php';
                include 'elements/page-intro.php';
                include 'elements/footer.php';
                exit();
	} elseif ($request_type == "view_profile") {
                include 'elements/page-profile.php';
                include 'elements/footer.php';
		exit();
	} else {
		include 'elements/header.php';
		include 'elements/page-home.php';
		include 'elements/footer.php';
		exit();	
	}



// Parse XML

	$xml = new SimpleXMLElement($get_xml);

// Render the page

if ($request_type == "view_by_moduleid") {
	orgasmod_renderpage($xml);
} elseif ($request_type == "view_member_favourites") {
	orgasmod_render_members_favourites($xml);
}


####################################################3
# Functions


function tma_sanitize_query($string) {
        $string         =       stripslashes($string);
        $string         =       urldecode($string);
        $string         =       strip_tags($string);
        return $string;
}

function tma_sanitize($string) {
        $string         =       stripslashes($string);
        $string         =       urldecode($string);
        $string         =       strip_tags($string);
        $string         =       addslashes($string);
        return $string;
}

function tma_error($message, $referrer) {
	global $player_switch_html, $format_html, $global_vars;
	include 'elements/error.php';
	include 'elements/footer.php';
	exit();
}

function tma_clean_query($check_query)
        {
        global $lang;
        # Basically strips out the banned characters.
        $check_query = stripslashes($check_query);
        $junk = array(
                ',' , '/', '\\' , '`' , ';' , '[' , ']' , '^', '%',
                '$', '#', '@', '|', '{','}','<', '>', '?', ':'
                );

        // Replace invalid characters (if any remaining)
        $check_sane = str_replace($junk, '' ,$check_query);

        return $check_sane;
}

function orgasmod_renderpage($xml) {
	global $player_switch_html, $format_html, $global_vars;

	$results = $xml->results;
	$artists = $xml->module->artist_info->artists;

	$total_pages = $xml->totalpages;

	include 'includes/header.php';

        $error =  $xml->error[0];
	if ($error != "") {
		include 'elements/header.php';
		exit(tma_error($error, $referrer));
	}

	if ($results == 1) {
		$mod_title = htmlspecialchars($xml->module[0]->songtitle, ENT_QUOTES, 'UTF-8');
		$mod_filename = $xml->module[0]->filename;
		$mod_format = $xml->module[0]->format;
		$header_title_html = "- $mod_title - $mod_filename ($mod_format)";
        }


	include 'elements/header.php';

        if ($total_pages > 1) {
                include 'includes/pagination.php';
                include 'elements/pagination.php';
        }



	$i = 0;
	while ($i < $results) {
		$mod_title = htmlspecialchars($xml->module[$i]->songtitle, ENT_QUOTES, 'UTF-8');
		$mod_filename = $xml->module[$i]->filename;
		$mod_id = $xml->module[$i]->id;
		$mod_path = $xml->module[$i]->url;
		$mod_instruments = nl2br($xml->module[$i]->instruments);
		$mod_size = $xml->module[$i]->size;
		$mod_comment = nl2br($xml->module[$i]->comment);
		$mod_infopage = htmlspecialchars($xml->module[$i]->infopage, ENT_QUOTES, 'UTF-8');
		$mod_format = $xml->module[$i]->format;
		$mod_hits = $xml->module[$i]->hits;
		$mod_date = $xml->module[$i]->date;
		$mod_genreid = $xml->module[$i]->genreid;
		$mod_genretext = htmlspecialchars($xml->module[$i]->genretext, ENT_QUOTES, 'UTF-8');
		if ($results > 1) {
			include 'elements/module-list.php';
		}
		$i++;

	}

	# Artist Listing AAAA
	if ($results <= 1) {
		$a = 0;
		if ($artists > 0) {
			while ($a < $artists) {
				$artist_id = htmlspecialchars($xml->module->artist_info->artist[$a]->id, ENT_QUOTES, 'UTF-8');
				$artist_alias = ($xml->module->artist_info->artist[$a]->alias);
				$artist_imageurl =  htmlspecialchars($xml->module->artist_info->artist[$a]->imageurl, ENT_QUOTES, 'UTF-8');
				$artist_profile = htmlspecialchars($xml->module->artist_info->artist[$a]->profile, ENT_QUOTES, 'UTF-8');
				$artist_description = html_entity_decode(tma_bbcode_artist_module_description($xml->module->artist_info->artist[$a]->module_data->module_description));
				include 'elements/artist.php';
				if ($artist_description != "") {
					include 'elements/inc_item-module_description.php';
				}
				$a++;
			}
		} else {
			$mod_artists = "";
			$mod_artist_description = "";
		}

		# Member Comments
		$membercomments = $xml->module->comments->results;
                if ($membercomments > 0) {
                	$c = 0;
			$comment_html = "";
                	while ($c < $membercomments) {
                		$i = 0;
				include 'includes/xml_comment.php';
				include 'elements/comment.php';
				$c++;
			}
		}

		#$memberreviews = $xml->module->reviews->results;
		#if ($memberreviews > 0) {
		#	$r = 0;
		#	$i = 0;
		#	while ($r < $memberreviews) {
		#		include 'includes/review.php';
		#		include 'elements/review.php';
		#		$r++;
		#		$i++;
		#	}
		#}

		include 'elements/page-module.php';
	}

		include 'elements/footer.php';

}



function tma_getxml($request_variable) {
	global $global_vars;
	$remote_addr = tma_sanitize($_SERVER['REMOTE_ADDR']);

	// Details
	$username = $global_vars['username'];
	$password = $global_vars['password'];
	$app_path = $global_vars['app_path'];
	$http_path = $global_vars['http_path'];
	$curl_path = $global_vars['curl_path'];
	$site_key = $global_vars['site_key'];


	$request_variable = str_replace(" ","%20",$request_variable);
	if ($curl_path != "") {
		#### CURL CONFIG ####
		// User curl to grab the xml page
		$output = array();
		#$proxy_server = "http://surf.etm.ericsson.se:8080";
		$proxy_server = "http://www-proxy.ericsson.se:8080";
		#$proxy_user = "--proxy_user xhpgrtu:nl1sol";
		$stuff = exec("$curl_path  --proxy $proxy_server $proxy_user -k -s \"$http_path/$app_path?key=$site_key&remote_addr=$remote_addr&$request_variable\"",$output);
		// Convert the returned array into a variable
		$output = implode($output);
	} else {
	        #### FILE GET CONTENTS CONFIG ####
		$url = "$http_path/$app_path?key=$site_key&remote_addr=$remote_addr&$request_variable";
	        $output = @file_get_contents($url);
		if ($output == FALSE) {
                        exit("<h2>Sorry, the server seems to be very very busy. Try again in a few moments.</h2>");
                }
	}
	
	if ($output == "") {
		exit(tma_error("Timeout Error - The data source is not available at the moment","index.php"));
	}	

	return $output;


}

function tma_check_sanity($check_query)
        {
        global $lang;

        $check_query = stripslashes($check_query);
        $junk = array(
                ',' , '/', '\\' , '`' , ';' , '[' , ']' , '^', '%',
                '$', '#', '@', '|', '{','}','<', '>', '?', ':', '='
                );


        $len = strlen($check_query);

        // Replace invalid characters (if any remaining)
        $check_sane = str_replace($junk, '' ,$check_query);

        if(strlen($check_sane) != $len) {
                return 0;
        } else {
                return 1;
        }
}

function tma_set_format() {
	global $format_regex;
	$set_format = $_GET['set_format'];
        if (preg_match("$format_regex",$set_format)) {
                $_SESSION['format'] = $set_format;
                header("Location: index.php");
                exit();
        } else {
		$_SESSION['format'] = "";
		header("Location: index.php");
                exit();
	}
}

function tma_render_advert() {
        $request = "request=adverts";
        $get_xml = tma_getxml($request);
        $xml = new SimpleXMLElement($get_xml);
	include 'elements/advert.php';
        return $html;
}

function tma_render_requests() {
        $request = "request=view_requests";
        $get_xml = tma_getxml($request);
        $xml = new SimpleXMLElement($get_xml);

        $requests_requests = $xml->requests->current;
        $requests_maximum = $xml->requests->maximum;

        include 'elements/requests.php';
        return $html;
}

function tma_pagination( $nr, $sr, $pp, $pnp, $pn, $url ) {
        global $player_switch_html, $format_html, $global_vars;
        $script_url =   $global_vars['path_http_script_index'];
  $pnav = '';
  $link = '';
  $start = '';
  $previous = '';
  $next = '';
  $end = '';
  if( $pn >= 2 )
  {
    $previous .= "&nbsp;<span class='button'><a class='button' href=\"" . $url . "";
    $previous .= "&amp;page=" . ( $pn - 1) . "#mods\">&lt; Prev</a></span>";
  }
  if( $pn < $nr and ( $pn * $pp) < $nr )
  {
    $next .= "&nbsp;<span class='button'><a class='button' href=\"" . $url . "";
    $next .= "&amp;page=" . ( $pn + 1) . "#mods\">Next &gt;</a></span>";
  }
  if( $nr > $pp )
  {
    $tp = $nr / $pp;
    if( $tp != intval( $tp ) )
    {
      $tp = intval( $tp) + 1;
    }
    $page = 0;
    while( $page++ < $tp )
    {
      if( ( $page < $pn - $pnp or $page > $pn + $pnp) and $pnp != 0 )
      {
        if( $page == 1 )
        {
          $start .= "&nbsp;<span class='button'><a class='button' href=\"" . $url;
          $start .= "&amp;page=1#mods\"><< First</a></span>";
        }
        if( $page == $tp )
        {
          $end .= "&nbsp;<span class='button'><a class='button' href=\"" . $url;
          $end .= "&amp;page=";
          $end .= $tp . "#mods\">$tp</a></span>";
        }
      }
      else
      {
        if( $page == $pn )
        {
          $link .= "&nbsp;<span class='paging-selected'><a class='button' href=\"" . $url;
          $link .= "&amp;page=" . $page . "#mods\">$page</a></span>";
        }
        else
        {
          $link .= "&nbsp;<span class='button'><a class='button' href=\"" . $url;
          $link .= "&amp;page=" . $page . "#mods\">$page</a></span>";
        }
      }
    }
    $pnav .= $start;
    $pnav .= $previous;
    $pnav .= $link;
    $pnav .= $next;
    $pnav .= $end;
  }
  if( $nr == 0 )
  {
    $nom = 0;
  }
  else
  {
    $nom = 1;
  }
  return $pnav;
}

function nicestr($input,$char) {
        $MAX_LENGTH = "$char";
        $input = html_entity_decode($input, ENT_QUOTES, 'UTF-8');
        if (strlen($input) <= $MAX_LENGTH) {
                $input = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
                return $input;
        }
        $output = substr($input, 0, $MAX_LENGTH - 3);
        $output .= "...";
        return $output;
}


?>
