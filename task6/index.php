<?php
session_start();

$data = [];
$errors = [];
$user = '';
$family = '';
$bdate= '';
if (!empty($_POST)) {
	
	$data['user']=  validateData ($_POST['user']);
	$data['family']= validateData ($_POST['family']);
	$data['bdate']= validateData ($_POST['bdate']);
	$user = !empty($data['user']) ? $data['user'] :'';
	$family = !empty($data['family']) ? $data['family'] :'';
	$bdate =!empty($data['bdate']) ? $data['bdate'] :'';


	
	if (!$user) {
		$errors[] = 'Username is required!';
	} elseif (strlen($user) < 3) { 
		$errors[] = 'Username must have 3 or more symbols!';
	} elseif (!preg_match("/^[a-zA-Z]*$/",$user)) {
      $errors[] = "Only letters allowed"; 
    }
	if (!$family) {
		$errors[] = 'Password is required!';
	} elseif (strlen($family) < 3) { 
		$errors[] = 'Password must have 3 or more symbols!';
	}
	if (!$bdate) {
		$errors[] = 'Birthdate is required!';
	}
	
	
}
 function validateData($data) {
 	$data = trim($data);
 	$data = stripslashes($data);
 	$data = htmlspecialchars($data);
 	return $data;
 }


?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Data must stay</title>
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
			<?php foreach ($errors as $e):?>
				<p style="color:red;"><?= $e?></p>
				<?php endforeach;?>
			<div>
				<label for="">First name </label>
				<input type="text" name="user" value="<?= $user; ?>" />
			</div>
			<div>
				<label for="">Last name  </label>
				<input type="text" name="family" value="<?= $family; ?>"  />
			</div>
			<div>
				<label for="">Birth date</label>
				<input type="date" name="bdate" value="<?= $bdate; ?>"/>
			</div>
			<div>
				<button type="submit">Send</button>
			</div>
		</form>
		</div>
	</body>
</html>


