<?php

$paging = 1;
$page_links = "";
$referer = htmlentities($_SERVER['QUERY_STRING']);
$referer = preg_replace("/&amp;page=[0-9]+/","",$referer);

$request_type = tma_sanitize($_GET['request']);

$request_query = tma_sanitize($_GET['query']);
$request_format = tma_sanitize($_GET['format']);
$request_page = tma_sanitize($_GET['page']);
if ($request_page == "") $request_page = "1";
$search_type = tma_sanitize($_GET['search_type']);

/*
$nr = number of results - total pages
$sr = starting row - 1
$pp = results per page - one
$pnp = page navigation pages - 4
$pn = current page - $page
$url = base url to append navigation to - hm
 Order: $nr, $sr, $pp, $pnp, $pn, $url )
*/

$links = tma_pagination($total_pages,1,1,4,$request_page,"$script_url?$referer");
?>
