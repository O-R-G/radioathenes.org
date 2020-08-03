
    <script type="text/javascript">
    	var sRadio = document.getElementById('radio');
		sRadio.addEventListener('play', function() {
		   sRadio.setAttribute('controls', 'controls');
		}, false);
		document.onload = radioInit();

                if (debug) {
			console.log("init " + getCookie("audioCookie") + "\r"); 
		}
	</script>
	
	</body>
</html>
