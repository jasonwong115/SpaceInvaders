<?php
session_start();
session_regenerate_id(true);
if(isset($_SESSION['username'])){
	header("Location: game.php");
}else{
	header("Location: login.php");
}

?>

