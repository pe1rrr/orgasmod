<?php
function orgasmod_render_fans_of_module($module) {
        global $global_vars;
	$request = "request=view_module_fans&query=$module";
	# &page=$request_page&order=$request_order&session_userid=$session_userid";
	$get_xml = tma_getxml($request);
	$xml = new SimpleXMLElement($get_xml);
        # FANS
        $script_url =   $global_vars['path_http_script_index'];
        $total_pages = $xml->totalpages;
        $results = $xml->results;
        #if ($total_pages > 1) {
        #        include 'includes/pagination.php';
        #        include 'elements/inc_item-pagination.php';
        #}
        $i = 0;
	if ($results) {
	        foreach ($xml->items->member AS $dummy) {
			$member_id = ($xml->items->member[$i]->id);
			$member_alias = $xml->items->member[$i]->alias;
			$member_profile = $xml->items->member[$i]->profile;
			$member_favourites = $xml->items->member[$i]->stats->member_attributes->favourites;
			$member_imageurl = htmlspecialchars($xml->items->member[$i]->imageurl, ENT_QUOTES, 'UTF-8');
			include 'elements/member-list-short.php';
			$i++;
		}
	}
	return $html;
}

function orgasmod_render_member_list($xml) {
        global $player_switch_html, $format_html, $global_vars;
        # LLLLL
        $results = $xml->results;
        $artists = $xml->module->artist_info->artists;

        $total_pages = $xml->totalpages;

        $error =  $xml->error[0];
        if ($error != "") {
                exit(tma_error($error, $referrer));
        }

        include 'elements/member-list-head.php';
        if ($total_pages > 1) {
                include 'includes/pagination.php';
                include 'elements/inc_item-pagination.php';
        }
        $i = 0;
        while ($i < $results) {
                $member_id = ($xml->items->member[$i]->id);
                $member_alias = $xml->items->member[$i]->alias;
                $member_profile = $xml->items->member[$i]->profile;
                $member_favourites = $xml->items->member[$i]->favourites;
                $member_imageurl = $xml->items->member[$i]->imageurl;
                include 'elements/member-list.php';
                $i++;
        }
	$data['html'] = $html;
	$data['navigation'] = $navigation_html;
	return $data;

}
function orgasmod_render_all_member_favourites($limit,$request_order,$option) {
        global $player_switch_html, $format_html, $global_vars;
        $request = "request=view_member_favourites&query=1&page=$request_page&order=$request_order&opt-all=$option&limit=$limit";
        $get_xml = tma_getxml($request);
	$xml = new SimpleXMLElement($get_xml);


        $results = $xml->results;
        $artists = $xml->module->artist_info->artists;

        $total_pages = $xml->totalpages;

        $error =  $xml->error[0];
        if ($error != "") {
                exit(tma_error($error, $referrer));
        }

        $i = 0;
        while ($i < $results) {
		$user_id = $xml->items->item[$i]->userid;
		$user_alias = $xml->items->item[$i]->alias;
		$user_image = $xml->items->item[$i]->imageurl;
                $mod_title = $xml->items->item[$i]->module->songtitle;
                $mod_filename = $xml->items->item[$i]->module->filename;
                $mod_id = $xml->items->item[$i]->module->id;
                $mod_path = $xml->items->item[$i]->module->url;
                $mod_instruments = nl2br($xml->items->item[$i]->module->instruments);
                $mod_size = $xml->items->item[$i]->module->size;
                $mod_comment = nl2br($xml->items->item[$i]->module->comment);
                $mod_infopage = htmlspecialchars($xml->items->item[$i]->module->infopage, ENT_QUOTES, 'UTF-8');
                $mod_format = $xml->items->item[$i]->module->format;
                $mod_hits = $xml->items->item[$i]->module->hits;
                $mod_date = $xml->items->item[$i]->module->date;
                $mod_genreid = $xml->items->item[$i]->module->genreid;
                $mod_genretext = htmlspecialchars($xml->items->item[$i]->module->genretext, ENT_QUOTES, 'UTF-8');
                $item_date = htmlspecialchars($xml->items->item[$i]->date, ENT_QUOTES, 'UTF-8');
                $mod_title_short = nicestr($mod_title,30);
                include 'elements/inc_item-favourite_modules_all.php';
                $i++;

        }
	return $html;


}

function orgasmod_render_members_favourites($xml) {
        global $player_switch_html, $format_html, $global_vars;
	# FUKFUK

        $results = $xml->results;
        $artists = $xml->module->artist_info->artists;

        $total_pages = $xml->totalpages;

	$total_mods = $xml->total;

        include 'includes/header.php';

        if ($results == 1) {
                $mod_title = $xml->items->item[$i]->module[0]->songtitle;
                $mod_filename = $xml->items->item[$i]->module[0]->filename;
                $mod_format = $xml->items->item[$i]->module[0]->format;
                $header_title_html = " - $mod_title - $mod_filename ($mod_format)";
        } else {
		$whos_list = ($xml->items->item[0]->alias);
		$header_title_html = " - $whos_list's Orgasmod.com Profile ($total_mods nominated modules)";
	}

        $error =  $xml->error[0];
        if ($error != "") {
		$header_title_html = "";
		include 'elements/header.php';
                exit(tma_error($error, $referrer));
        }

	include 'elements/header.php';


        if ($total_pages > 1) {
                include 'includes/pagination.php';
                include 'elements/inc_item-pagination.php';
        }
        $i = 0;
        while ($i < $results) {
		$user_image = $xml->items->item[$i]->imageurl;
                $mod_title = $xml->items->item[$i]->module->songtitle;
                $mod_filename = $xml->items->item[$i]->module->filename;
                $mod_id = $xml->items->item[$i]->module->id;
                $mod_path = $xml->items->item[$i]->module->url;
                $mod_instruments = nl2br($xml->items->item[$i]->module->instruments);
                $mod_size = $xml->items->item[$i]->module->size;
                $mod_comment = nl2br($xml->items->item[$i]->module->comment);
                $mod_infopage = htmlspecialchars($xml->items->item[$i]->module->infopage, ENT_QUOTES, 'UTF-8');
                $mod_format = $xml->items->item[$i]->module->format;
                $mod_hits = $xml->items->item[$i]->module->hits;
                $mod_date = $xml->items->item[$i]->module->date;
                $mod_genreid = $xml->items->item[$i]->module->genreid;
                $mod_genretext = htmlspecialchars($xml->items->item[$i]->module->genretext, ENT_QUOTES, 'UTF-8');
		$item_date = htmlspecialchars($xml->items->item[$i]->date, ENT_QUOTES, 'UTF-8');
		$mod_title_short = nicestr($mod_title,30);
                include 'elements/inc_item-favourite_modules.php';
                $i++;

        }

	include 'elements/footer.php';


}
?>
