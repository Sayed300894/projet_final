
var colors = ["AliceBlue ","Aqua","Chartreuse","Crimson ","DarkBlue","DarkMagenta","DarkRed"];
var Fcolor = ["yellow", "	azure", "deeppink", "khaki", "	lightcoral"];

const random = document.getElementById('random');
random.addEventListener('click', ()=>{
  var randomColor = colors[Math.floor(Math.random() * colors.length)]; 
  let body = document.querySelector('body');
  body.style.background = randomColor;
  var randomFontColor = colors[Math.floor(Math.random() * Fcolor.length)];
  let Font = document.querySelector('P');
  Font.style.color = randomFontColor;
  var image = document.getElementById('image');
  image.classList.toggle('img-size');
});