<?php
$counter = isset($_POST['counter']) ? $_POST['counter'] : 0;

if ($_POST) {
	$counter++;
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Post send counter</title>

	</head>
	<body>
		<div id="form" style="width:50%;
				margin: auto; 
				border:2px solid black;
				border-radius:15px;
				padding: 1em; 
				display :block;" >
			<form action="index.php" method="post">
				<div>
					<label for="">First name </label>
					<input type="text" name="user" value="" />
					<input type="hidden" name="counter" value="<?= $counter ?>">
				</div>
				<div>
					<label for="">Last name  </label>
					<input type="text" name="family" value=""  />
				</div>
				<div>
					<label for="">Birth date</label>
					<input type="date" name="bdate" value=""/>
				</div>
				<?= ($_POST && $counter) ? "<p>Submitted $counter times.</p>" : '' ?>
				<div>
					<button type="submit">Send</button>
				</div>
			</form>
		</div>
	</body>
</html>


