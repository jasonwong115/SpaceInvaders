<?php
	session_start();
	if(isset($_SESSION['role']) && $_SESSION['role'] == "ADMIN") {
		header("Location: adminHighScores.php");
	}
	else if(isset($_SESSION['role'])) {
		header("Location: highscores.php");
	}
?>