@if ($extractedId)
    @once
        <style>
            /* Wrapper that maintains a crisp 16:9 widescreen shape dynamically */
            .video-responsive-container {
                position: relative;
                width: 100%;
                padding-bottom: 56.25%; /* 16:9 Aspect Ratio */
                height: 0;
                overflow: hidden;
            }

            /* Force the incoming injected YouTube iframe to fill the container completely */
            .video-responsive-container iframe,
            .video-responsive-container div[id^='yt_player_'] {
                position: absolute;
                top: 0;
                left: 0;
                width: 100% !important;
                height: 100% !important;
                border: 0;
            }
        </style>
    @endonce

    <div class="video-responsive-container">
        <div id="{{ $uniquePlayerId }}"></div>
    </div>

    <script>
        window.ytQueue = window.ytQueue || [];
        window.ytPlayers = window.ytPlayers || {};

        function init_{{ $uniquePlayerId }}() {
            if (!document.getElementById('{{ $uniquePlayerId }}')) return;

            window.ytPlayers['{{ $uniquePlayerId }}'] = new YT.Player('{{ $uniquePlayerId }}', {
                videoId: '{{ $extractedId }}',
                playerVars: {
                    'playsinline': 1,
                    'autoplay': 1,
                    'controls': 1,
                    'enablejsapi': 1,
                    'origin': window.location.origin
                },
                events: {
                    'onReady': function (event) {
                        event.target.mute();
                        event.target.playVideo();
                    },
                    'onStateChange': function (event) {
                        if (event.data === YT.PlayerState.ENDED) {
                            event.target.playVideo();
                        }
                    }
                }
            });
        }

        if (window.YT && window.YT.Player) {
            init_{{ $uniquePlayerId }}();
        } else {
            window.ytQueue.push(init_{{ $uniquePlayerId }});
        }

        if (!window.ytScriptInjected) {
            window.ytScriptInjected = true;
            var tag = document.createElement('script');
            tag.src = 'https://www.youtube.com/iframe_api';
            var firstScriptTag = document.getElementsByTagName('script')[0];
            firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

            window.onYouTubeIframeAPIReady = function () {
                while (window.ytQueue.length > 0) {
                    const launchFunc = window.ytQueue.shift();
                    launchFunc();
                }
            };
        }
    </script>
@else
    <p class="error">Error: Invalid or missing YouTube link.</p>
@endif
