<?php
function orgasmod_render_spotlight($type) {
        global $global_vars;
        $script_url =   $global_vars['path_http_script_index'];
        $request = "request=spotlight";
        $get_xml = tma_getxml($request);
        $xml = new SimpleXMLElement($get_xml);

        $results = $xml->results;
        $error =  $xml->error[0];
        if ($error != "") {
                $referrer = "$script_url";
                exit(tma_error($error, $referrer,8));
        }


        $i = 0;
        while ($i < $results) {
                include 'includes/xml_spotlight.php';
                if ($type == "horiz") {
                        include 'elements/inc_item-spotlight.php';
                } elseif ($type == "vert") {
                        include 'elements/spotlight_vertical.php';
                }
                $i++;
        }
        return $html;

}
?>
