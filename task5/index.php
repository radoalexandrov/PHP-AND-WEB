<!DOCTYPE html>
<html>
 <head>
        <meta charset="UTF-8">
        <title>Task 5</title>
        <link rel="stylesheet" href="css/index.css">
    </head>
    <body>
	   
    <div>
        <form action="index.php?&somevalue=1&antother=1914" method="post" style=" width:50%;margin: 4em; border:2px solid black;padding: 1em">
            <div>
                <label for="firstname">First name:</label>
                <input type="text" id="firstname" name="firstname">

            </div>
            <div>
                <label for="family">Family:</label>
                <input type="text" id="family" name="family">

            </div>
            <div>
                <label for="bdate">Date of Birth:</label>
                <input type="date" id="bdate" name="bdate">

            </div>
            <div>
                <button type="submit">Submit</button>
            </div>
            <div>
            	<table border="1">
					<tr>
						<th>Type/name</th>
						<th>Type/value</th>
					</tr>
					<tbody>			
						<?php
							foreach($_REQUEST as $key => $value) {
							?><tr><td><?php var_dump($key);?></td>
							<td><?php var_dump($value);?></td></tr><?php
					  }?> 
					</tbody>
				</table>
			</div>
        </form>
    </div>
    </body>
</html>