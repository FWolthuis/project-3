//fall 
$zwaartekracht = 0.99;
//Speed of gas (up)
$speed_up = 0.4;
// fall speed
$fall_speed = 0.2;

const characterSprite = new Image();
characterSprite.src = 'images/char.png';

class Bird {
    constructor(){
        this.x = 150;
        this.y = 200;
        this.vy = 0;
        this.originalWidth = 1041;
        this.originalHeight = 680;
        this.width = this.originalWidth/20;
        this.height = this.originalHeight/20;
        this.weight = $fall_speed; 
        this.frameX = 0;
    }
    update(){
        let curve = Math.sin(angle) * 20;
        if (this.y > canvas.height - (this.height * 3) + curve){
            this.y = canvas.height - (this.height * 3) + curve;
            this.vy = 0;
        } else{
            this.vy += this.weight;
            this.vy *= $zwaartekracht;
            this.y += this.vy;
        }
        if (this.y < 0 + this.height){
            this.y = 0 + this.height;
            this.vy = 0;
        }
        if (spacePressed && this.y > this.height * 3) this.flap();
    }
    draw(){
        ctx.fillStyle = 'black';
        //hitbox
        //ctx.fillRect(this.x, this.y, this.width, this.height);
        ctx.drawImage(characterSprite, this.frameX * this.originalWidth, 0, this.originalWidth, this.originalHeight, this.x - 20, this.y - 12, this.width * 3, this.height * 3);
    }
    flap(){
        this.vy -= $speed_up; // snelheid omhoog
        //if (this.frameX >= 3) this.frameX = 0;
        //else if (frame%3 === 0) this.frameX++;
    }
}
const bird = new Bird();