<?php
	$ip_address = $_SERVER['REMOTE_ADDR'];
        $request = "request=player_path&query=$mod_id&ip=$ip_address";
        $get_xml = tma_getxml($request);
        $xml = new SimpleXMLElement($get_xml);
        $error =  $xml->error[0];
        if ($error != "") {
                exit("Error");
        }

        $mirror_host = $xml->module->mirror[0]->host;
        $mirror_protocol = $xml->module->mirror[0]->protocol;
        $mirror_port = $xml->module->mirror[0]->port;
        $mirror_filepath = $xml->module->mirror[0]->filepath;

$player_html = <<<EOT

<h2 class="title"><img src="style/images/icons/music.png" border="0" class="middle" alt="Play">&nbsp;$mod_format Player</h2>
<noscript>
<p>
The Player requires Java. Your browser does not appear to support Java, or you have an out of date installation.
</p>
</noscript>
<p class="tiny bgplayer" style="margin-left: auto; margin-right: auto; max-width:220px; text-align: center;">
$player_switch_html
<applet id="open_player" code="examples.applet.AppletPlayer"
                    archive="style/js/jmod_0_9.jar"
                    width="120"
                    height="50">
        <param name="protocol" value="$mirror_protocol">
        <param name="host" value="$mirror_host">
        <param name="port" value="$mirror_port">
        <param name="files" value="$mirror_filepath">
</applet>
<br>
This applet is based on the library and applet <i>JMOD</i> by Oxygenic.
</p>
EOT;


?>
