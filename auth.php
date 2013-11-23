<?php

if( !isset($_POST["isSubmitted"]) ){ //_$POST[""] - vajno3
	echo('
		<form action="auth.php" method="post" accept-charset="UTF-8">
			 <fieldset>
				<input type="hidden" name="isSubmitted" />
				<input type="text" name="username" />
				</br>
				<input type="password" name="pass" />
				</br>
				<input type="submit" value="Log in" />
			</fieldset>
		</form>	
	');
}
else{
	$conn = new mysqli("localhost", "root", "", "site" );//vajno 1
	$result = $conn->query("SELECT * FROM Registrirani WHERE username='{$_POST["username"]}' AND pass='{$_POST["pass"]}' "); //vajno2
	if( $result->num_rows == 0 ){
		echo "fail";
	}
	else{
		session_start();
		$_SESSION['username'] = $_POST["username"];
		$query = $conn->query("SELECT Potrebiteli.name, Potrebiteli.lastname FROM Potrebiteli, Registrirani WHERE Potrebiteli.username = Registrirani.username;");
		$result = $query->fetch_assoc();
		$_SESSION['name'] = $result['name'];
		$_SESSION['lastname'] = $result['lastname'];
		echo "Welcome, ". $_SESSION['username']."!";
	}
}
?>