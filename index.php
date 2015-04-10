<?php 
	require_once("GLOBAL/head.php"); 
?>



<!-- MENU -->

<?php

        // SQL objects from rootid

        $rootid = 1;

        $sql = "SELECT objects.id AS objectsId, objects.name1, 
objects.deck, objects.body, objects.end, objects.begin, 
objects.active, objects.rank as objectsRank, wires.fromid, wires.toid 
FROM objects, wires WHERE wires.fromid = $rootid AND wires.toid = 
objects.id AND objects.active = '1' AND wires.active = '1' ORDER BY 
objects.rank;";

        /*
        // SQL object plus media from root with rootname

        $rootid = 1;

        $sql = "SELECT objects.id AS objectsId, objects.name1, objects.deck, 
objects.body, objects.notes, objects.active, objects.begin, objects.end, 
objects.rank as objectsRank, (SELECT objects.name1 FROM objects WHERE objects.id = 
$rootid) AS rootname, media.id AS mediaId, media.object AS mediaObject, 
media.type, media.caption, media.active AS mediaActive, media.rank FROM objects 
LEFT JOIN media ON objects.id = media.object AND media.active = 1 WHERE 
wires.fromid = '1' AND wires.toid = objects.id AND objects.active = '1' AND 
wires.active = '1' ORDER BY media.rank;";
        */

        $result =  MYSQL_QUERY($sql);
        $html = "";
        $i = 0;

        $html .= "<div class = 'menuContainer mtdbt2f4d-915'>";

        while ( $myrow = MYSQL_FETCH_ARRAY($result) ) {


                $html .= "<div class='active plain'>";
                $html .= "<a onmousedown ='expandCollapse(\"line$i\");' href='#null'>" . "<span class='black'>" . date('Y.d.m H:i', 
strtotime($myrow['begin'])) . " / </span>" . $myrow["name1"] . "</a>";
                $html .= "</div>";

                // $html .= "<br />";

                $html .= "<div id='line$i' class='detailContainer collapsible'>" . $myrow['body'] . "</div>";

                $i++;
        }

        $html .= "</div>";
        echo nl2br($html);
?>



<?php	
	echo "\n\n\n\n\n";
	require_once("GLOBAL/foot.php"); 
?>
