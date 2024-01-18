<?php

function orgasmod_render_profile($request_query) {
        global $global_vars;
	$session_userid = $_SESSION['userid'];
        if (!preg_match("/^[0-9]+$/", $request_query)) {
        	$message = "Invaild ID";
		exit(tma_error($message,"$script_url",1));
	}
	$request = "request=profile&query=$request_query&page=$request_page&session_userid=$session_userid";
	$get_xml = tma_getxml($request);
	$xml = new SimpleXMLElement($get_xml);
        $script_url =   $global_vars['path_http_script_index'];
        $results = $xml->results;
        $error =  $xml->error[0];
        if ($error != "") {
                $referrer = "$script_url";
                exit(tma_error($error, $referrer,8));
        }

        include 'includes/xml_profile.php';
        include 'elements/inc_item-profile.php';

	$data['html'] = $html;
	$data['title'] = $title;
	return $data;
}

function orgasmod_profile_modules($profile_userid) {
        global $global_vars,$lang;
        $request_page = tma_sanitize($_GET['page']);
        $request_order = tma_sanitize($_GET['order']);
        $request = "request=view_modules_by_artistid&query=$profile_userid&page=$request_page&order=$request_order";
        $get_xml = tma_getxml($request);
        $xml = new SimpleXMLElement($get_xml);

        $total_pages = $xml->totalpages;
        $results = $xml->results;
        $result_count = $xml->results[0];
        $error =  $xml->error[0];

        # Don't handle errors, because this is just not needed.

        if ($total_pages > 1) {
                include 'includes/pagination.php';
                include 'elements/inc_item-pagination.php';
        }

        $i = 0;
        # Display list of modules
        while ($i < $results) {
                include 'includes/xml_module.php';
                # include 'includes/comment.php';
                include 'elements/inc_item-artist_modules.php';
                $i++;
        }

	$data['results'] = $html;
	$data['count'] = $result_count;
	$data['navigation'] = $navigation_html;

}

?>
