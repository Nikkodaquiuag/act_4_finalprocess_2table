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
	<?php $getbookByID = getbookbyID($pdo, $_GET['book_id']); ?>
	<h1>Are you sure you want to delete this project?</h1>
	<div class="container" style="border-style: solid; height: 400px;">
		<h2>Title: <?php echo $getbookByID['title'] ?></h2>
		<h2>Author: <?php echo $getbookByID['author'] ?></h2>
		<h2>Date Added: <?php echo $getbookByID['date_added'] ?></h2>

		<div class="deleteBtn" style="float: right; margin-right: 10px;">

			<form action="core/handleForms.php?book_id=<?php echo $_GET['book_id']; ?>&library_id=<?php echo $_GET['library_id']; ?>" method="POST">
				<input type="submit" name="deletebookBtn" value="Delete">
			</form>			
			
		</div>	

	</div>
</body>
</html>