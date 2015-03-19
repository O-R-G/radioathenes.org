<?php 
	require_once("GLOBAL/head.php"); 
?>



<!-- ABOUT -->

<?php

	$id = 2;

        // SQL object plus media


        $sql = "SELECT objects.id, objects.name1, objects.deck, objects.body, objects.end, 
objects.begin, objects.active, wires.fromid, wires.toid, media.id AS mediaId, media.object AS 
mediaObject, media.type, media.caption, media.active, media.rank FROM wires, objects LEFT JOIN 
media ON media.object = objects.id AND media.active = '1' WHERE objects.id = $id AND 
wires.toid = objects.id AND objects.active = '1' AND wires.active = '1' ORDER BY media.rank;";

        $result = MYSQL_QUERY($sql);
	$myrow = MYSQL_FETCH_ARRAY($result); 
	$body = $myrow['body'];
	MYSQL_DATA_SEEK($result, 0);

        $html = "";
        $i = 0;

        $html .= "<div class = 'menuContainer mtdbt2f4d-915'>";
	$html .= $body;

        while ( $myrow = MYSQL_FETCH_ARRAY($result) ) {

                $mediaFile = "MEDIA/". str_pad($myrow["mediaId"], 5, "0", STR_PAD_LEFT) .".". $myrow["type"];
		$mediaStyle = "width: 100px;";
                $mediaCaption = strip_tags($myrow["caption"]);
                $html .= "<div id='image".$i."' class = 'imageContainer'>";
                $html .= "\n    ". displayMedia($mediaFile, $mediaCaption, $mediaStyle);
                $html .= "</div>";
                $i++;
        }

        $html .= "<br/><br/>";
        $html .= "</div>";
        echo nl2br($html);
?>



<?php	
	echo "\n\n\n\n\n";
	require_once("GLOBAL/foot.php"); 
?>
