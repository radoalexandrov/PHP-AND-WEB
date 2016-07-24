<?php
session_start();
$input = '';
$cgradus = '';
$fgradus ='';
$data = [];
$errors = [];
if (!empty($_POST)) {
	
	$data['input']=  validateData ($_POST['input']);
	$input = !empty($data['input']) ? $data['input'] :'';
	$select = $_POST['select'];
		
	if (!$input) {
		$errors[] = 'Number field is required!';
	} elseif (!is_numeric($input)) {
      $errors[] = "Only numbers allowed"; 
    }
    $fgradus = ($input * 1.8) +32;
    $cgradus = ($input - 32) /1.8;
    if ($select == 1 && $input <= -273.11){
    	 $errors[] = "Absolute ZERO is -273.11,your number must be bigger !";
    }
    if ($select == 2 && $input <= -459.67){
    	$errors[] = "Absolute ZERO is -459.67,your number must be bigger !";
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
		<title>Gradus conversion</title>
		<style>
			label {
				display: block;
			}
		</style>
	</head>
	<body>
		<div id="table" style=" width:50%;margin: 4em; border:2px solid black;padding: 1em">
			<form action="" method="post">
				<?php foreach ($errors as $e):?>
				<p style="color:red;"><?= $e?></p>
				<?php endforeach;?>
			<select name="select" id="">
				<option value="1">Celsius to Farenhait</option>
				<option value="2">Farenhait to Celsius</option>
			</select>
			<div>
				<label for="">Temperature :  </label>
				<input type="text" name="input" value=""/>
			</div>
			<div>
				<button type="submit">Calculate</button>
			</div>
			<div id="result">
				<p><?php if ($input && is_numeric($input) & count($errors) < 1  ) {
					if ($select == 1) {
						echo " $input Celsius gradus is equivalent to $fgradus Farenhait gradus . ";
					} else {
						echo " $input Farenhit gradus is equivalent to $cgradus Celsius gradus . ";
						}
					}
				?></p>

			</div>
		</form>
		</div>
	</body>
</html>


