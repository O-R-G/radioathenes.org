	// playPauseVideo

        function playPauseVideo() {
            var myVideo = document.getElementsByTagName('video')[0];
            if (myVideo.paused)
                myVideo.play();
            else
                myVideo.pause();
        }

        function playVideo() {
            var myVideo = document.getElementsByTagName('video')[0];
            myVideo.play();
        }
