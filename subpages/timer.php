<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="http://dokdo2013.dothome.co.kr/subpages/sticky.css" rel="stylesheet" type="text/css">
<title>모의고사 - 현우야 대학가자</title>
<style>
@import url('https://fonts.googleapis.com/css?family=Roboto:100,300');

button[data-setter] {
  outline: none;
  background: transparent;
  border: none;
  font-family: 'Roboto';
  font-weight: 300;
  font-size: 18px;
  width: 25px;
  height: 30px;
  color: #F7958E;
  cursor: pointer;
}

button[data-setter]:hover { opacity: 0.5; }

.container {
  position: relative;
  width: 300px;
  margin-top: 200px;
  margin: 0 auto;
}

.setters {
  position: absolute;
  left: 85px;
  top: 75px;
}

.minutes-set {
  float: left;
  margin-right: 28px;
}

.seconds-set { float: right; }

.controlls {
  position: absolute;
  left: 75px;
  top: 105px;
  text-align: center;
}

.display-remain-time {
  font-family: 'Roboto';
  font-weight: 100;
  font-size: 65px;
  color: #F7958E;
}

#pause {
  outline: none;
  background: transparent;
  border: none;
  margin-top: 10px;
  width: 50px;
  height: 50px;
  position: relative;
}

.play::before {
  display: block;
  content: "";
  position: absolute;
  top: 8px;
  left: 16px;
  border-top: 15px solid transparent;
  border-bottom: 15px solid transparent;
  border-left: 22px solid #F7958E;
}

.pause::after {
  content: "";
  position: absolute;
  top: 8px;
  left: 12px;
  width: 15px;
  height: 30px;
  background-color: transparent;
  border-radius: 1px;
  border: 5px solid #F7958E;
  border-top: none;
  border-bottom: none;
}

#pause:hover { opacity: 0.8; }

.e-c-base {
  fill: none;
  stroke: #B6B6B6;
  stroke-width: 4px
}

.e-c-progress {
  fill: none;
  stroke: #F7958E;
  stroke-width: 4px;
  transition: stroke-dashoffset 0.7s;
}

.e-c-pointer {
  fill: #FFF;
  stroke: #F7958E;
  stroke-width: 2px;
}

#e-pointer { transition: transform 0.7s; }
h1 { margin-top:100px; text-align:center; font-family:'Nanum Square'}
@media (max-width:719px){
  h1 {
    margin-top: 50px;
  }
}
body { background-color:#f7f7f7;}
</style>
<link rel="stylesheet" href="//cdn.rawgit.com/hiun/NanumSquare/master/nanumsquare.css">
<style>
p { font-size: 1.6em; }
.nanum-square { font-family: 'Nanum Square'; }
.bold { font-weight: bold; }
}
</style>
</head>

<body>
<div id="css-script-menu">
<p class="nanum-square bold" style="text-align:center ; font-size:2em">연습은 치열하게, 집중하자. <font style="font-size:0.8em">(<a href="index.php">교시 선택 페이지로 돌아가기</a>)</font></p>
<?
$subType = $_GET['type'];
if($subType == '1'){ ?>
  <h1>1교시 국어영역<br>(제한시간 : 80분)</h1>
<? }else if($subType == '2'){ ?>
  <h1>2교시 수학영역<br>(제한시간 : 100분)</h1>
<? }else if($subType == '3'){ ?>
  <h1>3교시 영어영역<br>(제한시간 : 70분)</h1>
<? }else if($subType == '4'){ ?>
  <h1>4교시 한국사/탐구영역<br>(제한시간 : 30분)</h1>
<? }else if($subType == '5'){ ?>
  <h1>파트별 세트문제 풀이 연습<br></h1>
  <? } ?>
<div class="container">
  <div class="setters">
    <div class="minutes-set">
      <button data-setter="minutes-plus">+</button>
      <button data-setter="minutes-minus">-</button>
    </div>
    <div class="seconds-set">
      <button data-setter="seconds-plus">+</button>
      <button data-setter="seconds-minus">-</button>
    </div>
  </div>
  <div class="circle"> <svg width="300" viewBox="0 0 220 220" xmlns="http://www.w3.org/2000/svg">
    <g transform="translate(110,110)">
      <circle r="100" class="e-c-base"/>
      <g transform="rotate(-90)">
        <circle r="100" class="e-c-progress"/>
        <g id="e-pointer">
          <circle cx="100" cy="0" r="8" class="e-c-pointer"/>
        </g>
      </g>
    </g>
    </svg> </div>
  <div class="controlls">
    <div class="display-remain-time">80:00</div>
    <button class="play" id="pause"></button>
  </div>
</div>
<script>
//circle start
let progressBar = document.querySelector('.e-c-progress');
let indicator = document.getElementById('e-indicator');
let pointer = document.getElementById('e-pointer');
let length = Math.PI * 2 * 100;

progressBar.style.strokeDasharray = length;

function update(value, timePercent) {
	var offset = - length - length * value / (timePercent);
	progressBar.style.strokeDashoffset = offset;
	pointer.style.transform = `rotate(${360 * value / (timePercent)}deg)`;
};

//circle ends
const displayOutput = document.querySelector('.display-remain-time')
const pauseBtn = document.getElementById('pause');
const setterBtns = document.querySelectorAll('button[data-setter]');

var newUrl = window.location.href;
var subTypeArr = newUrl[55];
var subType = parseInt(subTypeArr);
var realType;
if(subType == 1)
  realType = 80;
if(subType == 2)
  realType = 99.983333333333333333333333333333;
if(subType == 3)
  realType = 70;
if(subType == 4)
  realType = 30;
if(subType == 5)
  realType = 5;

let wholeTime = realType * 60; // manage this to set the whole time

let intervalTimer;
let timeLeft;
let isPaused = false;
let isStarted = false;


update(wholeTime,wholeTime); //refreshes progress bar
displayTimeLeft(wholeTime);

function changeWholeTime(seconds){
  if ((wholeTime + seconds) > 0){
    wholeTime += seconds;
    update(wholeTime,wholeTime);
  }
}

for (var i = 0; i < setterBtns.length; i++) {
    setterBtns[i].addEventListener("click", function(event) {
        var param = this.dataset.setter;
        switch (param) {
            case 'minutes-plus':
                changeWholeTime(1 * 60);
                break;
            case 'minutes-minus':
                changeWholeTime(-1 * 60);
                break;
            case 'seconds-plus':
                changeWholeTime(1);
                break;
            case 'seconds-minus':
                changeWholeTime(-1);
                break;
        }
      displayTimeLeft(wholeTime);
    });
}

function timer (seconds){ //counts time, takes seconds
  let remainTime = Date.now() + (seconds * 1000);
  displayTimeLeft(seconds);

  intervalTimer = setInterval(function(){
    timeLeft = Math.round((remainTime - Date.now()) / 1000);
    if(timeLeft < 0){
      clearInterval(intervalTimer);
      isStarted = false;
      setterBtns.forEach(function(btn){
        btn.disabled = false;
        btn.style.opacity = 1;
      });
      displayTimeLeft(wholeTime);
      pauseBtn.classList.remove('pause');
      pauseBtn.classList.add('play');
      return ;
    }
    displayTimeLeft(timeLeft);
  }, 1000);
}
function pauseTimer(event){
  if(isStarted === false){
    timer(wholeTime);
    isStarted = true;
    this.classList.remove('play');
    this.classList.add('pause');

    setterBtns.forEach(function(btn){
      btn.disabled = true;
      btn.style.opacity = 0.5;
    });

  }else if(isPaused){
    this.classList.remove('play');
    this.classList.add('pause');
    timer(timeLeft);
    isPaused = isPaused ? false : true
  }else{
    this.classList.remove('pause');
    this.classList.add('play');
    clearInterval(intervalTimer);
    isPaused = isPaused ? false : true ;
  }
}

function displayTimeLeft (timeLeft){ //displays time on the input
  let minutes = Math.floor(timeLeft / 60);
  let seconds = timeLeft % 60;
  let displayString = `${minutes < 10 ? '0' : ''}${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
  displayOutput.textContent = displayString;
  update(timeLeft, wholeTime);
}

pauseBtn.addEventListener('click',pauseTimer);

</script>
</body>
</html>
