<?php

echo 'HOME PAGE';

?>
<!-- 1. The <iframe> (and video player) will replace this <div> tag. -->
<!--<div id="player"></div>

<script>
  // 2. This code loads the IFrame Player API code asynchronously.
  var tag = document.createElement('script');

  tag.src = "https://www.youtube.com/iframe_api";
  var firstScriptTag = document.getElementsByTagName('script')[0];
  firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

  // 3. This function creates an <iframe> (and YouTube player)
  //    after the API code downloads.
  var player;
  function onYouTubeIframeAPIReady() {
    console.log(YT, 'onYouTubeIframeAPIReady');
    player = new YT.Player('player', {
      height: '360',
      width: '640',
      videoId: 'w3n70iIxbSU',
      events: {
        'onReady': onPlayerReady,
        'onStateChange': onPlayerStateChange
      }
    });
    console.log(player, 'player');
  }

  // 4. The API will call this function when the video player is ready.
  function onPlayerReady(event) {
    console.log(event, 'onPlayerReady');
    // event.target.playVideo();

    setInterval(() => {
      console.log(player.getCurrentTime(), 'player.getDuration()');
    }, 2000)
  }

  // 5. The API calls this function when the player's state changes.
  //    The function indicates that when playing a video (state=1),
  //    the player should play for six seconds and then stop.
  var done = false;
  function onPlayerStateChange(event) {
    console.log(event, 'onPlayerStateChange');
  }
  function stopVideo() {
    player.stopVideo();
  }
</script>-->
<!--<iframe width="560" height="315" src="https://www.youtube.com/embed/V7FeISrdNMA" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>-->
<!--https://studio.youtube.com/video/V7FeISrdNMA/edit-->
<!--https://studio.youtube.com/video/VkYY0rvLibk/edit-->
<!--https://studio.youtube.com/video/w3n70iIxbSU/analytics/tab-overview/period-since_publish-->
<script>

  // chrome and yandex works!
  (async () => {
    if ('storage' in navigator && 'estimate' in navigator.storage) {
      const {usage, quota} = await navigator.storage.estimate();
      console.log(`Using ${usage} out of ${quota} bytes.`);

      if(quota < 120000000){
        console.log('Incognito')
      } else {
        console.log('Not Incognito')
      }
    } else {
      console.log('Can not detect')
    }

  })()
</script>
