<?php
session_start ();
$data = [ ];
$errors = [ ];
$num1 = '';
$num2 = '';
$ops = '';
if (! empty ( $_POST )) {
	
	$data ['num1'] = validateData ( $_POST ['num1'] );
	$data ['num2'] = validateData ( $_POST ['num2'] );
	$data ['operations'] = $_POST ['operations'];
	$num1 = ! empty ( $data ['num1'] ) ? $data ['num1'] : '';
	$num2 = ! empty ( $data ['num2'] ) ? $data ['num2'] : '';
	$ops = ! empty ( $data ['operations'] ) ? $data ['operations'] : '';
	
	if (! $num1) {
		$errors [] = 'Number 1 is required!';
	} elseif (! is_numeric ( $num1 )) {
		$errors [] = 'Number 1 must be numeric!';
	}
	if (! $num2) {
		$errors [] = 'Number 2 is required!';
	} elseif (! is_numeric ( $num2 )) {
		$errors [] = 'Number 2 must be numeric!';
	}
	function add($num1, $num2) {
		$res = $num1 + $num2;
		return $res;
	}
	function sub($num1, $num2) {
		$res = $num1 - $num2;
		return $res;
	}
	function mult($num1, $num2) {
		$res = $num1 * $num2;
		return $res;
	}
	function div($num1, $num2) {
		$res = $num1 / $num2;
		return $res;
	}
	if (count ( $errors ) < 1) {
		$result = $ops ( $num1, $num2 );
	}
}
function validateData($data) {
	$data = trim ( $data );
	$data = stripslashes ( $data );
	$data = htmlspecialchars ( $data );
	return $data;
}

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Operations</title>
<style>
label {
	display: block;
}
</style>
</head>
<body>
	<div id="container">

		<form action="" method="post"
			style="width: 50%; margin: 4em; border: 2px solid black; padding: 1em">
			<div>
				<label for="">Number 1</label> <input type="text" name="num1"
					value="" />
			</div>
			<div>
				<label for="">Number 2</label> <input type="text" name="num2"
					value="" />
			</div>
			<div>
				<select name="operations" id="ops">
					<option value="add">+</option>
					<option value="sub">-</option>
					<option value="mult">*</option>
					<option value="div">/</option>
				</select>
			</div>
			<div>
				<button type="submit">Calculate</button>
			</div>
			<div>
				<p id="result">Result :<?php
				
if (! empty ( $result )) {
					echo $result;
				}
				?>
					</p>
						<?php foreach ($errors as $e):?>
						<p id="error" style="color: red;"><?= $e?></p>
					<?php endforeach;?>
				</div>
		</form>
	</div>
</body>
</html>




