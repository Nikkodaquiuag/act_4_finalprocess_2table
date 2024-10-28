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
	<h1>Welcome To library System. Add new book !</h1>
	<form action="core/handleForms.php" method="POST">
		<p>
			<label for="library_name">Library Name</label> 
			<input type="text" name="Library_name">
		</p>
		<p>
			<label for="locations">Locations</label> 
			<input type="text" name="Locations">
		</p>
		<p>
			<label for="specialization">Specialization</label> 
			<input type="text" name="specialization">
			<input type="submit" name="insertlibrarybtn">
		</p>
	</form>
	<?php $getAlllibrary = getAlllibrary($pdo); ?>
	<?php foreach ($getAlllibrary as $row) { ?>
	<div class="container" style="border-style: solid; width: 50%; height: 300px; margin-top: 20px;">
		<h3>LibraryName: <?php echo $row['library_name']; ?></h3>
		<h3>Locations: <?php echo $row['locations']; ?></h3>
		<h3>Specialization: <?php echo $row['specialization']; ?></h3>
		<h3>Date Added: <?php echo $row['date_added']; ?></h3>


		<div class="editAndDelete" style="float: right; margin-right: 20px;">
			<a href="viewbook.php?library_id=<?php echo $row['library_id']; ?>">View book</a>
			<a href="editlibrary.php?library_id=<?php echo $row['library_id']; ?>">Edit</a>
			<a href="deletelibrary.php?library_id=<?php echo $row['library_id']; ?>">Delete</a>
		</div>


	</div> 
	<?php } ?>
</body>
</html> 