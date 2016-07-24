<?php

$info=$_SERVER['HTTP_USER_AGENT'];
$info1=$_SERVER['SERVER_SIGNATURE'];
$info2=$_SERVER['HTTP_HOST'];

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Browser info</title>
		<link rel="stylesheet" href="style.css" />
	</head>
	<body>
		<h1 >Browser info</h1>
		<div style=" ">
			<h2>Browser info from $_SYSTEM :</h2>
			<p><?php echo "Your browser info : $info";?></p>
			<p><?php echo "Server info :$info1" ;?></p>
			<p><?php echo "Info about host : $info2";?></p>
		</div>

	</body>
</html>

