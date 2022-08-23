<?php
session_start();

if(!isset($_SESSION['username'])){
	header("location: index.php");
	exit;
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>AOF</title>
    <link rel="stylesheet" href="gameStylesheet.css" />
    <link rel="shortcut icon" href="Images/logo-aot.png" />
  </head>
  <body class="game-body">
    <canvas id="canvas1"></canvas>

    <script src="bird.js"></script>
    <script src="particles.js"></script>
    <script src="obstacles.js"></script>
    <script src="main.js"></script>

    <script>
      function scoreFun() {
        //credits to max :)
        fetch("api/v1/game_save.php?username=<?php echo $_SESSION['username']; ?>&score=" + score).then(data => {
          console.log(data);
       });
       
       window.location.href='homepage.php';
      } 
      </script>
  </body>
</html>

