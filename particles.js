const particlesArray = [];

class Particle {
    constructor(){
        this.x = bird.x;
        this.y = bird.y;
        this.size = Math.random() * 6 + 1;
        this.speedY = (Math.random() * 1) - 0.5;
        this.color = 'hsl(0, 0%, 85%)';
    }
    update(){
        this.x -= gamespeed;
        this.y += this.speedY;
    }
    draw(){
        ctx.fillStyle = this.color;
        ctx.beginPath();
        ctx.arc(this.x, this.y + 25, this.size, 0, Math.PI * 2);
        ctx.fill();
    }
}

function handleParticles(){
    if(spacePressed)particlesArray.unshift(new Particle);
    
    for (i = 0; i < particlesArray.length; i++){
        particlesArray[i].update();
        particlesArray[i].draw();
    }
    if (particlesArray.lengte > 200){
        for (let i = 0; i < 20; i++){
            particlesArray.pop(particlesArray[i]);
        }
    }
}