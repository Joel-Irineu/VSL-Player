let vp_video = document.querySelector('.myVideo');
let vp_play = document.querySelector('.play');
let vp_pause = document.querySelector('.pause');
let vp_btnPlay = document.querySelectorAll('.btn-play');
let vp_timeBtn = document.querySelector('.btn-time').value;

console.log(vp_timeBtn);

vp_video.play();

vp_play.addEventListener('click',playVideo);

function playVideo(){
    vp_play.style.display = 'none';
    vp_video.currentTime = 0;
    vp_video.muted = false;

    let time = getTime(vp_timeBtn);

    vp_video.ontimeupdate = ()=>{
        showBtn(time);
    }
    
    vp_video.addEventListener('click',playPause);
    vp_pause.addEventListener('click',playPause);
}

function getTime(time){
    let timeSplit = time.split(":");
    return parseInt(timeSplit[0]) * 60 + parseInt(timeSplit[1]);
}

function showBtn(time){
    if (vp_video.currentTime > time){
        let btncompra = document.querySelector('.btncompra');
        btncompra.style.display = 'block';
    }
}


function playPause(){
    if(vp_video.paused){
        vp_video.play();
        vp_pause.style.display = 'none';
    }else{
        vp_video.pause();
        vp_pause.style.display = 'block';
    }
}