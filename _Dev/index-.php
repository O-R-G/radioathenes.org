<?php 
	require_once("GLOBAL/head.php"); 
?>

<?php
if ( ($dev) || ($live) ) {
?>


        <!-- DISPLAY -->

        <div id="displayWrapper" class="displayContainer helvetica" style="overflow: hidden;">

		<!--  
                <ul>
		<?php                                
			$path = "2";
			$limit = 1;
			$selection = $idFull;
			// $linkPageName = $pageName;
			$linkPageName = "detail";       // probably want to fix this and set using O-R-G
			$breadcrumbsMode = FALSE;
			$multiColumn = 0;
			$stub = FALSE;
			$breadcrumbsMode = FALSE;
			$thisLanguage = $language;
			if (!$breadcrumbsMode) ($id) ? $breadcrumbsMode = TRUE : $breadcrumbsMode = FALSE;
			displayNavigation($path, $limit, $selection, $linkPageName, $stub, $breadcrumbsMode, $multiColumn, $thisLanguage);
			?>
                </ul>
		-->

		<a href="javascript:void(0);" id="displayControl" class="" onmousedown = "hideShowMessage('displayWrapper','displayControl');">×</a><br /><br />
	        <div id="display"></div>
        </div>


        <!-- SOURCE -->

        <div id='source' class='hide'>

                <?php

                // SQL object
                        
		$sql = "SELECT objects.id, objects.name1, objects.deck, objects.body, objects.active, objects.rank FROM objects WHERE objects.id = $id 
AND objects.active = '1' ORDER BY objects.rank;";

                $result = MYSQL_QUERY($sql);
                $myrow = MYSQL_FETCH_ARRAY($result);
                $name = $myrow["name1"];
                $body = $myrow["body"];
                $html = $body;
                echo nl2br($html);

                ?>
        </div>


        <!-- IFRAME -->

        <div class='iframeContainer'>
        	<iframe id="iframe" name="iframe" src="iframe.php?id=<?php echo $id; ?>" frameborder="0">
	        </iframe>
        </div>

        <script type="text/javascript">

                var init = "true";
                document.getElementById('iframe').onload = function() {

                        if (init) {

                                hideShowMessage('displayWrapper','displayControl','show');
                                init = null;

	                } else {

                                hideShowMessage('displayWrapper','displayControl','hide');
                        }
                }
        </script>

<?php
}
?>

<?php	
	echo "\n\n\n\n\n";
	require_once("GLOBAL/foot.php"); 
?>
