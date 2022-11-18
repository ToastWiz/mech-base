document.addEventListener("DOMContentLoaded", function() { startPlayer(); }, false);//triggers startPlayer function when DOM is loaded
var player;

function startPlayer()
{
 player = document.getElementById('audio_player');

}

function updateTrackTime(audio)//function runs ontimeupdate of audio div, updates the time
{
  var currTimeHTML = document.getElementById('current_time');
  var durationHTML = document.getElementById('duration');

  var currTime = Math.floor(player.currentTime).toString();
  var duration = Math.floor(player.duration).toString();

  currTimeHTML.innerHTML = formatSecondsAsTime(currTime);

  if (isNaN(duration))
  {
    durationHTML.innerHTML = '00:00';
  }
  else
  {
    durationHTML.innerHTML = formatSecondsAsTime(duration);
  }
}

function formatSecondsAsTime(secs, format) //function to convert current time and duration of audio element into time format
{
  var hr  = Math.floor(secs / 3600);
  var min = Math.floor((secs - (hr * 3600))/60);
  var sec = Math.floor(secs - (hr * 3600) -  (min * 60));

  if (min < 10)
  {
    min = "0" + min;
  }
  if (sec < 10)
  {
    sec  = "0" + sec;
  }

  return min + ':' + sec;
}

function playAudio()
{
 player.play();
}
function pauseAudio()
{
 player.pause();
}
function stopAudio()
{
 player.pause();
 player.currentTime = 0;
}

function fwdAudio() //increments player's currentTime by +5
{
  player.currentTime = player.currentTime + 5;
}

function backAudio() //increments player's currentTime by -5
{
  player.currentTime = player.currentTime - 5;
}

function changeVol() //sets volume of player to value of change_vol which is a range slider
{
 player.volume=document.getElementById("change_vol").value;
}
