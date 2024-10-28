<?php require_once 'core/models.php'; ?>
<?php require_once 'core/dbConfig.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<a href="viewbook.php?library_id=<?php echo $_GET['library_id']; ?>">
	View The book</a>
	<h1>Edit the book!</h1>
	<?php $getbookByID = getbookByID($pdo, $_GET['book_id']); ?>
	<form action="core/handleForms.php?book_id=<?php echo $_GET['book_id']; ?>
	&library_id=<?php echo $_GET['library_id']; ?>" method="POST">
		<p>
			<label for="firstName">book Name</label> 
			<input type="text" name="title" 
			value="<?php echo $getbookByID['title']; ?>">
		</p>
		<p>
			<label for="firstName">author</label> 
			<input type="text" name="author" 
			value="<?php echo $getbookByID['author']; ?>">
			<input type="submit" name="editbookBtn">
		</p>
	</form>
</body>
</html>