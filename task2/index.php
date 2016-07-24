<?php
session_start();

$data = [];
$errors = [];
$user = '';
$pass = '';
$repass = '';
if (!empty($_POST)) {
	
	$data['user']=  validateData ($_POST['user']);
	$data['pass']= validateData ($_POST['pass']);
	$data['repass']= validateData ($_POST['repass']);
	$user = !empty($data['user']) ? $data['user'] :'';
	$pass = !empty($data['pass']) ? $data['pass'] :'';
	$repass =!empty($data['repass']) ? $data['repass'] :'';
	$hashpass = crypt($pass,'ubyhnumi,xdxwzq lmkw,dxolp.;');

	
	if (!$user) {
		$errors[] = 'Username is required!';
	} elseif (strlen($user) < 3) { 
		$errors[] = 'Username must have 3 or more symbols!';
	} elseif (!preg_match("/^[a-zA-Z]*$/",$user)) {
      $errors[] = "Only letters allowed"; 
    }
	if (!$pass) {
		$errors[] = 'Password is required!';
	} elseif (strlen($pass) < 3) { 
		$errors[] = 'Password must have 3 or more symbols!';
	}
	if (!$repass) {
		$errors[] = 'Repating password is required!';
	} elseif ($pass != $repass) {
		$errors[] = 'Passwords must be the same!';
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
		<title>Password check</title>
		<style>
			label {
				display: block;
			}
		</style>
	</head>
	<body>
		<form action="" method="post" style=" width:50%;margin: 4em; border:2px solid black;padding: 1em">
			<?php foreach ($errors as $e):?>
				<p style="color:red;"><?= $e?></p>
				<?php endforeach;?>
			<div>
				<label for="">Username </label>
				<input type="text" name="user" value=""/>
			</div>
			<div>
				<label for="">Password </label>
				<input type="password" name="pass" value=""/>
			</div>
			<div>
				<label for="">Repeat password</label>
				<input type="password" name="repass" value=""/>
			</div>
			<div>
				<button type="submit">Send</button>
			</div>
			<div id="result">
				<p><?php if (!$errors ){
					echo "Username : $user " ;
				}?></p>
				<p><?php if ($pass === $repass && $pass !='') {
					echo "  Hashed password : $hashpass ";
				}?></p>
			
			</div>
		</form>
	</body>
</html>


