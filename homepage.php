<?php
session_start();
include "gameDatabaseConnect.php";

if(!isset($_SESSION['username'])){
	header("location: index.php");
	exit;
}


$sql = "SELECT username, score FROM user ORDER BY score DESC LIMIT 5";
$result = mysqli_query($con, $sql);

$i = 1;
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Home</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<div class="container">
		<div class="user-cont">
			<div class="user-div">
				<h2 class="user"><?php echo "Welcome: " . $_SESSION['username']; ?></h2>	
			</div> 
		</div>

		<div class="Lb-cont">
			<div class="leaderboard">
				<h1>L e a d e r b o a r d</h1>
				<div class="line"> </div>

				<ul class="LbList">
				<?php
				while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
					echo "<li>$i. $row[username] <span>Points: $row[score]</span></li>";
					echo "<div class='line2'> </div>";
					$i++;
				}
				?>
				</ul>
			</div>
		</div>
			
		<div class="play-cont">
			<div class="play-div">
				<button class="play-btn" onclick="to_game()">Play</button>
			</div>
		</div>
	
		<div class="log-cont">
			<div class="logout-div">
				<form action="homepage.php" method="post">
					<input type="submit" class="logout-btn" value="Logout" name="logout">
				</form>
			</div>
		</div>
	</div>

	<!--to game-->
	<script>
		function to_game() {
			window.location.href='game.php';
		}
	</script>
	

	<!--logout script-->
	<?php
	if(isset($_POST['logout'])) {
		session_destroy();
		header('location: index.php');
	}
	?>
	
	<script>
        // audio 
        var login_audio = new Audio("mp3/aotLogin.wav");

        function checkplaysound(audio) {
            return audio &&
                audio.currentTime > 0 &&
                !audio.paused
                //&& !audio.ended
                &&
                audio.readyState > 2;
        }
        setInterval(function() {
            if (!checkplaysound(login_audio)) login_audio.play();

        }, 500);
    </script>
</body>
</html>