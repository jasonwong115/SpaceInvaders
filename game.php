<!DOCTYPE html>
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
canvas {
  display:block;
  margin:30px auto 0;
  border:1px dashed #ccc;
  background:#000;
}
.container { position:relative }
.size{width: 300px; margin:30px auto 0;}
.size .field {
	width:600px; background:#0769AD; color:#fff; padding:5px; border:none; cursor:pointer;
	font-family:'lucida sans unicode',sans-serif; font-size:1em;
	border:solid 1px #EC6603;
	-webkit-transition: all .4s ease-in-out;
	transition: all .4s ease-in-out;
}
.size .field:hover {
	border:solid 1px #fff;
	-moz-box-shadow:0 0 5px #999; -webkit-box-shadow:0 0 5px #999; box-shadow:0 0 5px #999
}
.size>ul.list { display:none;
	
	width:300px;
	margin:0; padding:0px; list-style:none;
	background:#fff; color:#333;
	-moz-border-radius:5px; -webkit-border-radius:5px; border-radius:5px;
	-moz-box-shadow:0 0 5px #999; -webkit-box-shadow:0 0 5px #999; box-shadow:0 0 5px #999
}
.size>ul.list li {
	padding:10px;
	border-bottom: solid 1px #ccc;
}
.size>ul.list li:hover {
	background:#0769AD; color:#fff;
}
.size>ul.list li:last-child { border:none }
</style>
<script src="js/jquery.js"></script>
<script src="js/game_logic.js"></script>
<script src="js/menu_logic.js"></script>
</head>

<body>
  <canvas id="canvas" width="600" height="600"></canvas>
</body>
</html>
<div class="container">
<div class="size">
		<ul class="list">
			<li id="resume">Resume</li>
			<li id="restart">Restart</li>
			<li id="exit">Exit</li>
		</ul>
</div>
</div>