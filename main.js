const canvas = document.getElementById('canvas1');
const ctx = canvas.getContext('2d');
canvas.width = innerWidth;
canvas.height = innerHeight;

var animation = document.getElementById('canvas1');

let spacePressed = false
let angle = 0;
let hue = 0;
let frame = 0;
var score = 0;
var play = 0;

//Snelheid van het spel.
let gamespeed = 20;

const gradient = ctx.createLinearGradient(0, 0, 0, 70);
gradient.addColorStop('0.4', '#fff');
gradient.addColorStop('0.5', '#000');
gradient.addColorStop('0.55', '#4040ff');
gradient.addColorStop('0.6', '#000');
gradient.addColorStop('0.9', '#fff');

//Background Image Loop----------------------------------------------------
const background = new Image();
background.src = '';
const BG = {
    x1: 0,
    x2: canvas.width,
    y: 0,
    width: canvas.width,
    height: canvas.height
}
function handleBackground(){
    if (BG.x1 <= -BG.width) BG.x1 = BG.width;
    else BG.x1 -= gamespeed;
    ctx.drawImage(background, BG.x1, BG.y, BG.width, BG.height);
}
//-------------------------------------------------------------------------

// fps
const frames = setInterval(animate, 1000/60);

function animate(){
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    //ctx.fillRect(10, canvas.height - 90, 50, 50);
    handleBackground();
    handleObstacles();
    handleParticles();
    bird.update();
    bird.draw();
    ctx.fillStyle = gradient;
    ctx.font = '90px Georgia';
    ctx.strokeText(score, 1400, 70);
    ctx.fillText(score, 1400, 70);
    handleCollisions();
    if (handleCollisions()) return;
    //
    angle+=0.1; 
    hue++;
    frame++;
}

window.addEventListener('keydown', function(e){
    if (e.code === 'Space') spacePressed = true;
});
//console.log(e.code);

window.addEventListener('keyup', function(e){
    if (e.code === 'Space') spacePressed = false;
    bird.frameX = 0;
});

//blood effect
const bang = new Image();
bang.src = 'Images/BloodEffect.png';

//collision detection
function handleCollisions(){
    for (let i = 0; i < obstaclesArray.length; i++){
        if (bird.x < obstaclesArray[i].x + obstaclesArray[i].width &&
            bird.x + bird.width > obstaclesArray[i].x &&
            ((bird.y < 0 + obstaclesArray[i].top && bird.y + bird.height > 0) ||
            (bird.y > canvas.height - obstaclesArray[i].bottom &&
            bird.y + bird.height < canvas.height))){
                //Game over text
                ctx.drawImage(bang, bird.x, bird.y, 50, 50);
                ctx.font = "25px Georgia";
                ctx.fillStyle = 'wit';
                ctx.fillText('Game Over, je score is ' + score, 600, canvas.height/2 +10);

                // css animation stop
                animation.style.animationPlayState="paused";
                clearInterval(frames);
                scoreFun();
                
                return true;
            }
        }
    }
    //if (spacePressed)location.reload();