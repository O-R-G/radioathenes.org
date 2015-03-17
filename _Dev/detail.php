<?php 
require_once("GLOBAL/head.php"); 
?>

        <!-- VIDEO -->

        <div>

                <video id="radio" width="480" height="360" autoplay loop>
                        <source src="MEDIA/MP4/out.mp4" type="video/mp4">
                        Your browser does not support the video tag.
                </video>

        </div>



        <!-- TEXT -->

		<?php

			// SQL object (should do left join with media query, see TEMPLE? or WATTIS)

			$sql = "SELECT objects.id AS objectsId, objects.name1, objects.deck, objects.body, objects.active, 
objects.rank as objectsRank FROM objects WHERE objects.id = $id AND objects.active = '1' LIMIT 1;";
			$result =  MYSQL_QUERY($sql);
			$html = "";
			$i = 0;


			while ( $myrow  =  MYSQL_FETCH_ARRAY($result) ) {
							
				$mediaFile = "MEDIA/". str_pad($myrow["mediaId"], 5, "0", STR_PAD_LEFT) .".". $myrow["type"];
				$mediaCaption = strip_tags($myrow["caption"]);
				$mediaStyle = "width: 100%;";
				/*
				$html .= "<div id='image".$i."' class = 'imageContainer' onclick='expandImage(\"image".$i."\", \"100px\", \"0px\");' style='padding:100px;'>";
				$html .= "\n	". displayMedia($mediaFile, $mediaCaption, $mediaStyle);
				$html .= "<div class = 'captionContainer caption'>";
				$html .= $mediaCaption . "<br /><br />";
				$html .= "</div>";
				$html .= "</div>";	
				*/
				$i++;

				// totally hacked for dev

				$html .= "<br />";
				$html .= "<div id='text' class='mtdbt2f-PP'>";
				$html .= $myrow["body"];
				$html .= "</div>";

			}


	

			echo nl2br($html);
		?>


<?php
	require_once("GLOBAL/foot.php"); 
?>
