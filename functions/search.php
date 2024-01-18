<?php

function orgasmod_search_results($xml) {
	global $player_switch_html, $format_html, $global_vars;

	$results = $xml->results;
	$total_pages = $xml->totalpages;

        $error =  $xml->error[0];
	if ($error != "") {
		exit(tma_error($error, $referrer));
	}

        if ($total_pages > 1) {
                include 'includes/pagination.php';
                include 'elements/inc_item-pagination.php';
        }

	$i = 0;
	while ($i < $results) {
		$mod_title = trim($xml->module[$i]->songtitle);
		$mod_filename = $xml->module[$i]->filename;
		if ($mod_title == "") $mod_title = $mod_filename;
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
		$mod_title_short = nicestr($mod_title,30);
		include 'elements/search_results.php';
		$i++;

	}

	$data['results'] = $html;
	$data['pagination'] = $navigation_html;
	return $data;

}
?>
