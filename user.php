<?php


?>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>Space Invaders</title>
<link href='http://fonts.googleapis.com/css?family=VT323' rel='stylesheet' />
<style>
body {
  padding:0;
  margin:0;
  background:#666;
}
#mainarea {
  display:block;
  margin:30px auto 0;
  border:1px dashed #ccc;
  background:#000;
  width: 600px;
  height: 600px;
}
label, h1, .white-text{
	color: white;
}
</style>
</head>

<body>
<?php
	session_start();
	echo "<h1 style=\"color:white\">Welcome, " . $_SESSION['username'] . "</h1><br/>";
?>
  <div id="mainarea">
  <form action="processing.php" method="get">
	  <h1 class="white-text">Change Username</h1>
	  <label>New Username</label>
	  <input name="newUsername" type="text"></input><br/><br/>
	  <input type="submit"></input>
  </form>
  </div>
</body>
</html>