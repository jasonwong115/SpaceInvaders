<?php

	if(isset($_GET["username"]) && isset($_GET["score"])){
		session_start();
		$username = $_GET['username'];
		$score = $_GET['score'];
		$db = new DB();
		$db->insertScore($username, $score);
		echo "inserted";
	}else if(isset($_GET["newUsername"]) && !isset($_GET["src"])){
		session_start();
		$username = $_SESSION['username'];
		$newUsername = $_GET['newUsername'];
		$db = new DB();
		$db->updateUsername($username, $newUsername);
		echo "updated";
	}else if(isset($_GET["newUsername"]) && isset($_GET["src"])){
		session_start();
		$username = $_SESSION['username'];
		$newUsername = $_GET['newUsername'];
		$srcToken = $_GET["src"];
		if($srcToken==$_SESSION['token']){
			$db = new DB();
			$db->updateUsername($username, $newUsername);
			$_SESSION['username'] = $newUsername;
			$_SESSION['token'] = $newUsername;
			echo "updated";
		}else{
			echo "not updated";
		}
	}else if(isset($_POST["username"]) && isset($_POST["password"])){
		session_start();
		$username = $_POST['username'];
		$password = $_POST['password'];
		$db = new DB();
		$result = $db->selectUserAndPass($username, $password);
		$num_rows = $result->num_rows;
		if($num_rows > 0){
			$_SESSION['username'] = $username;
			$_SESSION['token'] = $username;
			header("Location: game.php");
		}
		echo "logged in";
	}

	class DB {
		private $mysqli;

		function __construct() {
			$this->mysqli = new mysqli("LocalHost","root","","invaders");
			
			if ($this->mysqli->connect_errno) {
				echo "Failed to connect to MySQL: (" . $this->mysqli->connect_errno . ") " . $this->mysqli->connect_error;
			}
		}

		//select a users scores
		public function selectScores($username) {
			$querySQL = "SELECT * FROM invaders.t6_scores where username= '$username'";

			$result = $this->mysqli->query($querySQL);
			return $result;
		}
		
		//logs a user in
		public function selectUserAndPass($username,$password) {
			$querySQL = "SELECT * FROM invaders.t6_users where username= '$username' AND password='$password'";
			$result = $this->mysqli->query($querySQL);
			return $result;
		}

		// inserts score into db
		public function insertScore($username, $score) {
			$this->openConn();
			$result = $this->selectScores($username);
			$dbscore = 0;
			while($row = mysqli_fetch_array($result)) {
				$dbscore = $row['score'];
			}
			if($dbscore < $score){
				$delete = "DELETE FROM invaders.t6_scores
							WHERE username='$username'";
				$this->mysqli->query($delete);
				$insert = "INSERT INTO invaders.t6_scores(username, score) 
						   VALUES ('$username','$score')";

				$this->mysqli->query($insert);
			}
			$this->closeConn();
		}
		
		//logs a user in
		public function updateUsername($username,$newUsername) {
			$updateSQL = "UPDATE invaders.t6_users SET username = '$newUsername' WHERE username = '$username'";
			$result = $this->mysqli->query($updateSQL);
			return $result;
		}

		public function closeConn(){
			mysqli_close($this->mysqli);
		}
		public function openConn(){
			$this->mysqli = new mysqli("localhost","jason","wong","invaders");
			if ($this->mysqli->connect_errno) {
				echo $mysqli->connect_error;
			}
		}
	}
?>