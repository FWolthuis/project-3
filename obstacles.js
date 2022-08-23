const obstaclesArray = [];
const img_pipe = new Image();
const img_pipe2 = new Image();
img_pipe.src = "Images/Titanhand ingame.png";
img_pipe2.src = "images/mouth2.2.png";
let pipe_gap = 50;


class Obstacles {
    constructor(){
        this.bottom = (Math.random() * 360/10*7.5) + 70;
        this.top = (380 - this.bottom) + pipe_gap;
        this.x = canvas.width;
        this.width = 85;
        this.color = 'hsl(0, 100%, 50%)';
        this.counted = false;
    }
    draw(){
        ctx.fillStyle = this.color;
        //obstacles above
        ctx.drawImage(img_pipe, this.x - 128,  this.top - 363);

        // hitbox boven
        //ctx.fillRect(this.x, 0, this.width, this.top);

        //obstacles below
        ctx.drawImage(img_pipe2, this.x - 149, canvas.height - this.bottom);

        // hitbox beneden
        //ctx.fillRect(this.x, canvas.height - this.bottom, this.width, this.bottom);
    }
    update(){
        this.x -= gamespeed;
        if (!this.counted && this.x < bird.x){
            score++;
            this.counted = true;
        }
        this.draw();
    }
}

function handleObstacles(){
    // Verander de Persentage voor meer of minder obstakels.
    if (frame%35=== 0){
        obstaclesArray.unshift(new Obstacles);
    }
    for (let i = 0; i < obstaclesArray.length; i++){
        obstaclesArray[i].update();
    }
    if (obstaclesArray.length > 20){
        obstaclesArray.pop(obstaclesArray[0]);
    }
}