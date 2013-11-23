<?php

session_start();
if( !isset( $_SESSION["username"] ) ){
	exit("Please, login first.");
}

if( isset( $_POST["isSent"] ) ){

	$conn = new mysqli("localhost", "root", "", "site");
	$str = "INSERT INTO Potrebiteli(chat_name, name, lastname, gender, age) VALUES('{$_POST["chatName"]}', '{$_POST["name"]}', '{$_POST["lastname"]}', '{$_POST["gender"]}', '{$_POST["age"]}') WHERE username='{$_SESSION["username"]}';";
	/*$query = $conn->query($str); 
	//echo "<h1>" . $conn->errno ."</h2>";
	if( $conn->errno ){
		echo "there is no problem";
	}*/
	echo "mainata ti";
	$query = $conn->query($str);
}

?>	


<html>
<head>
	<style>
		fieldset{
			display: inline-block;
			background-color: green;
		}
		input{
			display: block;
			}
	</style>

	<link rel="stylesheet" type="text/css" href="MyStyle.css">


<title><?php echo $_SESSION["username"]."'s profile"; ?></title>

</head>

<body>
<?php
	echo $_SESSION['username'];
?>


<form method="post" action="./profile_edit.php">
<fieldset>	
	<input type="hidden" name="isSent" value="10" />
	<label for='chatName' >Chat name: </label>
	<input type="text" name="chatName" />
	<label for='name' >First name: </label>
	<input type="text" name="name" />
	<label for='lastname' >Last name: </label>
	<input type="text" name="lastname" />
	<label for='age' >Age: </label>
	<input type="text" name="age" />
	<label for='gender' >Gender: </label>
	<input type="text" name="gender" />
	<input type="submit" value="Edit Profile" />
</fieldset>
</form>
</body>

</html>