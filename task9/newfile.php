<?php
$user = isset($_POST['user']) ? $_POST['user'] :'';
$surname = isset($_POST['surname']) ? $_POST['surname'] :'';
$family = isset($_POST['family']) ? $_POST['family'] :'';
$bdate= isset($_POST['bdate']) ? $_POST['bdate'] :'';
$nickname= isset($_POST['nickname']) ? $_POST['nickname'] :'';

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Second file</title>
		<link rel="stylesheet" href="style.css" />
	</head>
	<body>
		<div id="form" style="width:50%;
				margin: auto;
				border:2px solid black;
				border-radius:15px;
				padding: 1em;
				display :block;" >
			<form action="" method="post" >
				<div>
					<label for="">First name :</label>
					<span><?= $user; ?></span>
				</div>
				<div>
					<label for="">Last name : </label>
					<span><?= $family; ?></span>
				</div>
				<div>
					<label for="">Last name : </label>
					<span><?= $surname; ?></span>
				</div>
				<div>
					<label for="">Last name : </label>
					<span><?= $nickname; ?></span>
				</div>
				<div>
					<label for="">Birth date :</label>
					<span><?= $bdate; ?></span>
				</div>
				<div>
					<button type="submit">Send</button>
				</div>
				<div>
					<a href="index.php">Home</a>
				</div>
			</form>
		</div>
	</body>
</html>