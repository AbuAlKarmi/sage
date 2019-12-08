
const SoundCloudAudio = require('soundcloud-audio');
const $ = jQuery;
const PROFILE_ID = '434541795';
const CLIENT_ID = 'Vu5tlmvC9eCLFZkxXG32N1yQMfDSAPAA';
const player = new SoundCloudAudio(CLIENT_ID);
const CHANNEL_URL = 'https://soundcloud.com/metraswebsite/tracks';
import * as ICONS from './icons';

var $view = $('#track');
let play = false;

var render = function(track) {

  $view.empty();

  // track info
  var $info = $(`<h6 class="track-title">${track.title}</h6>`);
  var $infoWrapper = $(`<div class="info-wrapper"></div>`);
  var $loading = $('soundcloude-loading');

  // track timings
  // var $timer = document.createElement('span');
  //
  // $info.appendChild($timer);

  // album cover
  var $img = $(`<img src="${track.artwork_url}" />`);


  // play/pause button
  var $button = $(`<button class="play-btn">${ICONS.PLAY}</button>`);
  var toggleButton = function() {
    if (player.playing) {
      $button.html(ICONS.PLAY);
      player.pause();
    } else {
      $button.html(ICONS.PAUSE);
      player.play();
    }
  };

  $button.on('click', toggleButton);


  const playNext = () => {
    player.pause();
    currentTrack++;
    if(currentTrack > tracks.length){
      currentTrack = 0;
    }
    playTrack(tracks[currentTrack].permalink_url);
  };


  const playPrev = () => {
    player.pause();
    currentTrack--;
    if(currentTrack < 0){
      currentTrack = tracks.length;
    }
    playTrack(tracks[currentTrack].permalink_url);
  };



  const $nextButton = $(`<button class="next-btn">${ICONS.NEXT}</button>`);
  $nextButton.on('click', playNext);

  const $prevButton = $(`<button class="prev-btn">${ICONS.PREV}</button>`);
  $prevButton.on('click', playPrev);

  const $buttonsWrapper = $(`<div class="btns-wrapper"></div>`);


  // clean view
  $loading.remove();

  // append elements


  $view.append(`<a href="${track.permalink_url}" class="soundcloude-icon" target="_blank">${ICONS.SOUNDCLOUDE}</a>`);
  $buttonsWrapper.append($nextButton);
  $buttonsWrapper.append($button);
  $buttonsWrapper.append($prevButton);
  $infoWrapper.append($info);
  $infoWrapper.append($buttonsWrapper);
  $view.append($img);
  $view.append($infoWrapper);
};

const playTrack = (trackUrl) => {
  player.resolve(
    trackUrl,
    render
  );
  if(player.playing){
    player.play();
  }
};

let tracks = [];
let currentTrack = 0;

const init = () => {
  if($view.length){
    fetch(`https://api.soundcloud.com/resolve.json?url=${encodeURIComponent(CHANNEL_URL)}&client_id=${CLIENT_ID}`)
      .then(resp => resp.json())
      .then(resp => {
        tracks = resp;
        currentTrack = 0;
        playTrack(tracks[currentTrack].permalink_url);
      });
  }

};

$(document).ready(() => {
  init();
});

