<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<?php $getlibraryByID = getlibraryByID($pdo, $_GET['library_id']); ?>
	<h1>Are you sure you want to delete this book?</h1>
	<div class="container" style="border-style: solid; height: 400px;">
		<h2>Library Name: <?php echo $getlibraryByID['library_name'] ?></h2>
		<h2>Location: <?php echo $getlibraryByID['locations'] ?></h2>
		<h2>specialization: <?php echo $getlibraryByID['specialization'] ?></h2>

		<div class="deletebtn" style="float: right; margin-right: 10px;">

			<form action="core/handleForms.php?library_id=<?php echo $_GET['library_id']; ?>" method="POST">
				<input type="submit" name="deletelibraryBtn" value="Delete">
			</form>			
			
		</div>	

	</div>
</body>
</html>