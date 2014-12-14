<?php
session_start();
//Secured logout version which requires a token
if(isset($_GET['src']) && $_GET["src"] == $_SESSION["token"]){
	session_destroy();
	header("Location: index.php");
	exit;
//Non-secure logout version, which does not prevent Cross-site request forgery
}else if(!isset($_GET['src'])){
	session_destroy();
	header("Location: index.php");
	exit;
}

?>