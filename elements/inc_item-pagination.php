<?php
$paging = 1;
$page_links = "";
$referer = htmlentities($_SERVER['QUERY_STRING']);
$referer = preg_replace("/&amp;page=[0-9]+/","",$referer);

$request_type = tma_sanitize($_GET['request']);
        if ($request_type != "view_by_list" &&
        $request_type != "view_all_favourites" &&
        $request_type != "search" &&
        $request_type != "view_member_comments" &&
        $request_type != "view_members" &&
        $request_type != "view_member_reviews" &&
        $request_type != "view_member_favourites"

         ) $request_type = "";

$request_query = tma_sanitize($_GET['query']);
$request_format = tma_sanitize($_GET['format']);
$request_page = tma_sanitize($_GET['page']);


# Generate page jump options
$pg = 1;
$jump_html = "";
while ($pg <= $total_pages) {
        if ($pg == $request_page) {
                $pg_selected = "selected";
        } else {
                $pg_selected = "";
        }
        $jump_html .=<<<EOT
        <option value="$pg" $pg_selected>$pg</option>
EOT;
        $pg++;
}

// HTML Template
$navigation_html = <<<EOT
        <form method="GET" style="padding: 0px; margin: 0px;" action="$script_url">
        <p>$links <input type="hidden" name="format" value="$request_format">

        <input type="hidden" name="search_type" value="$search_type">
        <input type="hidden" name="query" value="$request_query">
        <input type="hidden" name="request" value="$request_type">
        <select class='button' name="page">
        $jump_html
        </select>
        <input class="button" type="submit" name="submit" value="Jump!">
	</p>
        </form>
EOT;

?>
