const SoundCloudAudio = require('soundcloud-audio');

const PROFILE_ID = '434541795';
const CLIENT_ID = 'qricfXheX8AlK1w6YtcZb5cB2glavjpJ';


const player = new SoundCloudAudio(CLIENT_ID);

var $view = document.getElementById('track');

var render = function(track) {
  // track info
  var $info = document.createElement('h6');
  $info.className = 'track-title';
  $info.innerText = track.title;
  var $loading = document.getElementById('soundcloude-loading');

  // track timings
  var $timer = document.createElement('span');

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


  const playNext = () => {
    currentTrack++;
    alert(tracks[currentTrack].permalink_url);
    playTrack(tracks[currentTrack].permalink_url);
  };
  var $nextButton = document.createElement('button');
  $nextButton.style.display = 'block';
  $nextButton.innerText = 'NEXT';
  $nextButton.addEventListener('click', playNext);


  // clean view
  $loading.remove();

  // append elements
  $view.appendChild($info);
  $view.appendChild($img);
  $view.appendChild($button);
  $view.appendChild($nextButton);
};

const playTrack = (trackUrl) => {
  player.resolve(
    trackUrl,
    render
  );
};

let tracks = [];
let currentTrack = 0;

const init = () => {
  fetch(`https://api.soundcloud.com/resolve.json?url=${encodeURIComponent('https://soundcloud.com/metraswebsite/tracks')}&client_id=${CLIENT_ID}`)
    .then(resp => resp.json())
    .then(resp => {
      tracks = resp;
      currentTrack = 0;
      playTrack(tracks[currentTrack].permalink_url);
    });
};

init();
