<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<style>
		body {
			font-family: "Arial";
		}
		input {
			font-size: 1.5em;
			height: 50px;
			width: 200px;
		}
		table, th, td {
		  border:1px solid black;
		}
	</style>
</head>
<body>
	<?php $getlibraryByID = getlibraryByID($pdo, $_GET['library_id']); ?>
	<form action="core/handleForms.php?library_id=<?php echo $_GET['library_id']; ?>" method="POST">
        <p><label for="locations">locations</label> <input type="text" name="locations"value="<?php echo $getlibraryByID['locations']; ?>"></p>
		<p><label for="library_name">library_name</label> <input type="text" name="library_name"value="<?php echo $getlibraryByID['library_name']; ?>"></p>
		<p><label for="specialization">specialization</label> <input type="text" name="specialization"value="<?php echo $getlibraryByID['specialization']; ?>"></p>
			<input type="submit" name="editlibraryBtn">
		</p>
	</form>
</body>
</html>