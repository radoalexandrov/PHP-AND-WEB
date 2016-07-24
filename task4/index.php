<?php
/*Създайте HTML страница с PHP скрипт, вкойто потребителя трябва да въведете 10
числа. След това ги сложете в array,сортирайте ги и ги изпишете сортирани.Намерете
най-малкото и най-голямото число и ги изпишете*/
$data = [];
$errors = [];
$array = [];
$min ='';
$max ='';
$sarray= [];
if (!empty($_POST)) {
	$data['input'] =  validateData ($_POST['input']);
	$input = !empty($data['input']) ? $data['input'] :'';
	if (!$input) {
		$errors[] = 'Number field is required!';
	} 
	/*elseif (preg_match('/([,]+[0-9]+)/', $input)) {
		$errors[] = "Only numbers  are allowed";
	} elseif (!is_numeric($input) || $input !=',') {
			$errors[] = 'Only numbers and coma are allowed!';
	} */
	
	$array= explode(',', $input);
	if (count($array) != 10) {
		$errors[] = "10 numbers are needed";
	}
	$min =  min($array);
	$max = max($array);
	sort($array);
	$sarray = implode('| ', $array);

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
		<title>Task 4</title>
		<link rel="stylesheet" href="style.css" />
	</head>
	<body>
		<div id="container">
			<form action="" method="post" style=" width:50%;margin: 4em; border:2px solid black;padding: 1em">
				<?php foreach ($errors as $e):?>
				<p style="color:red;"><?= $e?></p>
				<?php endforeach;?>
				<label for="input">Please input 10 numbers separated with coma :</label>	
				<input type="text" name="input" value="" />
				<button type="submit">Send</button>
			</form>
			<div style=" width:50%;margin: 4em; border:2px solid black;padding: 1em">
				<p><?php if (count($errors )< 1) {?></p>
				<p><?php echo "Min number is $min ."; ?></p>
				<p><?php echo "Max number is $max ." ;?></p>
				<p><?php echo "Sorted numbers : $sarray ";}?></p>
			</div>
		</div>
	</body>
</html>
