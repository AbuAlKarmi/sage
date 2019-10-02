const SoundCloudAudio = require('soundcloud-audio');

const PROFILE_ID = '434541795';
const CLIENT_ID = 'qricfXheX8AlK1w6YtcZb5cB2glavjpJ';


const player = new SoundCloudAudio(CLIENT_ID);


// class SoundCloud {
//   constructor(){
//     this.soundcloud = SC.initialize({
//       client_id: 'YOUR_CLIENT_ID',
//       redirect_uri: 'https://example.com/callback'
//     });
//   }
// }
var $view = document.getElementById('track');

var render = function(track) {
  // track info
  var $info = document.createElement('h3');
  $info.innerText =
    'Playing: ' + track.user.username + ' - ' + track.title + ' - ';

  // track timings
  var $timer = document.createElement('span');
  var renderTimer = function() {
    $timer.innerText =
      prettyTime(player.audio.currentTime) +
      '/' +
      prettyTime(player.duration);
  };
  // rerender timer on every second
  player.on('timeupdate', renderTimer);
  renderTimer();
  $info.appendChild($timer);

  // album cover
  var $img = document.createElement('img');
  $img.src = track.artwork_url;

  // play/pause button
  var $button = document.createElement('button');
  var toggleButton = function() {
    if (player.playing) {
      $button.innerText = 'PLAY';
      player.pause();
    } else {
      $button.innerText = 'PAUSE';
      player.play();
    }
  };
  $button.style.display = 'block';
  $button.innerText = 'PLAY';
  $button.addEventListener('click', toggleButton);

  // clean view
  $view.removeChild($view.firstChild);

  // append elements
  $view.appendChild($info);
  $view.appendChild($img);
  $view.appendChild($button);
};

var prettyTime = function(time) {
  var hours = Math.floor(time / 3600);
  var mins = '0' + Math.floor((time % 3600) / 60);
  var secs = '0' + Math.floor(time % 60);

  mins = mins.substr(mins.length - 2);
  secs = secs.substr(secs.length - 2);
  if (!isNaN(secs)) {
    if (hours) {
      return hours + ':' + mins + ':' + secs;
    } else {
      return mins + ':' + secs;
    }
  } else {
    return '00:00';
  }
};

const init = () => {
  //
  // scPlayer.play({
  //   streamUrl: https://api.soundcloud.com/tracks/185533328/stream'
  // });

  player.resolve(
    'https://soundcloud.com/metraswebsite/ooxtrj2aq55a',
    render
  );
};


init();
