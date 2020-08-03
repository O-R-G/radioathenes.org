	// radioControl

	// radioOnOff
	// radioVolumeUpDown
	// add video position cookie to continuously stream the radio
	// video preload? 
	var sRadio = document.getElementById('radio');
	sRadio.addEventListener('loadeddata', function() {
	   sRadio.setAttribute('controls');
	}, false);
	var debug = false;
              

        function radioInit() {

	        var radio = document.getElementById("radio");
	        var controls = document.getElementById("controls");
		var audio = getCookie("audioCookie");

		if ( audio == "off") {

			radio.pause();
			controls.innerHTML = "<a href=\"javascript:radioOnOff();\">+</a>";

		} else {

			radio.play();
			controls.innerHTML = "<a href=\"javascript:radioOnOff();\">&times;</a>";
		}	

		if (debug) {

			function updateConsoleTime() {
				console.log(radio.currentTime);
			}
	
			radio.ontimeupdate = function() { updateConsoleTime() };

			console.log("audio = " + audio);			
		} 
	}


        function radioOnOff() {

	        var radio = document.getElementById("radio");
	        var controls = document.getElementById("controls");
		var audio = getCookie("audioCookie");
/*
 		if ( audio == "off" ) {

			// play

			radio.play();
			document.cookie="audioCookie=on";
			controls.innerHTML = "<a href=\"javascript:radioOnOff();\">&times;</a>";

		} else {

			// pause

			radio.pause();	
			document.cookie="audioCookie=off";
			controls.innerHTML = "<a href=\"javascript:radioOnOff();\">+</a>";
		}	
*/
        }


	function getCookie(name) {

                var cname = name + "=";
                var ca = document.cookie.split(';');

                for(var i = 0; i < ca.length; i++) {

                        var c = ca[i];
                        while (c.charAt(0)==' ') c = c.substring(1);
                        if (c.indexOf(cname) != -1) return c.substring(cname.length,c.length);
                }
                return "";
        }


        function checkCookie(name) {

                if (getCookie(name) != "") {

                        return true;

                } else {

                        return false;
                }
        }
