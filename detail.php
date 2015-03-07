<?php 
require_once("GLOBAL/head.php"); 
?>


        <!-- MENU -->

<!--
        <div id='menu' class='<?php echo ($language == "en") ? "englishMenuContainer blue " : "arabicMenuContainer red " ?> tahoma'>

                <p dir="rtl" lang="AR" class="tahoma green">

                <ul>
                        <?php
                                if ( $language == "en" ) $path = "14";
                                if ( $language == "ar" ) $path = "15";
                                $limit = 1;
                                $selection = $idFull;
                                // $linkPageName = $pageName;
                                $linkPageName = "detail";                       // probably want to fix this and set using O-R$
                                $breadcrumbsMode = FALSE;
                                $multiColumn = 0;
                                $stub = FALSE;
                                $breadcrumbsMode = FALSE;
                                $thisLanguage = $language;
                                if (!$breadcrumbsMode) ($id) ? $breadcrumbsMode = TRUE : $breadcrumbsMode = FALSE;

                                // displayNavigation($path, $limit, $selection, $linkPageName, $stub, $breadcrumbsMode, $multiColumn, $thisLanguage);
                        ?>
                </ul>
        </p>
        </div>

-->




        <!-- VIDEO -->

        <div id="radio">

                <video width="480" height="360" autoplay loop>
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

				$html .= "<div id='text' class='mtdbt2f-PP'>";
				$html .= $myrow["body"];
				$html .= "</div>";

			}


	

			echo nl2br($html);
		?>


<?php
	require_once("GLOBAL/foot.php"); 
?>
