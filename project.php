<?php 
require_once("GLOBAL/head.php"); 
?>

	<!-- MAIN -->

        <div id='main' class='<?php echo ($language == "en") ? "englishMainContainer" : "arabicMainContainer" ?>'>

        <!-- MENU -->

        <div id='menu' class='<?php echo ($language == "en") ? "englishMenuContainer blue" : "arabicMenuContainer red" ?> tahoma'>

                <p dir="rtl" lang="AR">

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

                                displayNavigation($path, $limit, $selection, $linkPageName, $stub, $breadcrumbsMode, $multiColumn, $thisLanguage);
                        ?>
                </ul>
        </p>
        </div>

	</div> 	

	<!-- /MAIN -->


	<!-- MIDDLE -->

	<?php
	if (($language=="ar") && ($pageName!="subscribe")) {
	?>

        <!--  ARABIC  -->
         
        <div id="I" class="bottomrightContainer courier mediumadjust red" dir="rtl" 
lang="AR">
                <div id="02inner" class="innerContainerCenteredArabic">
                        <a href="detail.php?id=2,9">I. 
الثقافة والإدارة
			</a>	
                </div>
        </div>

        <div id="II" class="toprightContainer courier mediumadjust red" dir="rtl" 
lang="AR">
                <div id="02inner" class="innerContainerCenteredArabic">
                        <a href="detail.php?id=2,10">II. 
أرض الكويت
			</a>	
                </div>
        </div>

        <div id="III" class="topleftContainer courier mediumadjust red" dir="rtl" 
lang="AR">
                <div id="02inner" class="innerContainerCenteredArabic">
                        <a href="detail.php?id=2,11">III. 
الإنسان الكويتي
			</a>	
                </div>
        </div>

        <div id="IV" class="bottomleftContainer courier mediumadjust red" dir="rtl" 
lang="AR">
                <div id="02inner" class="innerContainerCenteredArabic">
                        <a href="detail.php?id=2,12">IV. 
كويت اليوم والغد
			</a>	
                </div>
        </div>

        <div id="PLANETARIUM" class="planetariumContainer courier medium">
                <div id="02inner" class="innerContainerCenteredEnglish">
                        <a href="detail.php?id=1,8">*.
القبة السماوية
			</a>
                </div>
        </div>

       
	<?php
	} else {
	?>


        <!--  ENGLISH  -->

	<div id="I" class="bottomleftContainer courier medium">
                <div id="02inner" class="innerContainerCenteredEnglish">
			<a href="detail.php?id=1,4">I. CULTURE AND ADMINISTRATION</a>
                </div>
        </div>

	<div id="II" class="topleftContainer courier medium">
                <div id="02inner" class="innerContainerCenteredEnglish">
			<a href="detail.php?id=1,5">II. LAND OF KUWAIT</a>
                </div>
        </div>

	<div id="III" class="toprightContainer courier medium">
                <div id="02inner" class="innerContainerCenteredEnglish">
			<a href="detail.php?id=1,6">III. MAN OF KUWAIT</a>
                </div>
        </div>

	<div id="IV" class="bottomrightContainer courier medium">
                <div id="02inner" class="innerContainerCenteredEnglish">
			<a href="detail.php?id=1,7">IV. KUWAIT TODAY AND TOMORROW</a>
                </div>
        </div>

	<div id="PLANETARIUM" class="planetariumContainer courier medium">
                <div id="02inner" class="innerContainerCenteredEnglish">
			<a href="detail.php?id=1,8">*.PLANETARIUM</a>
                </div>
        </div>


	<?php
	}
	?>

	
<?php
	require_once("GLOBAL/foot.php"); 
?>
