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
	<a href="index.php">Return to home</a>
	<h1>Add New book</h1>
	<form action="core/handleForms.php?library_id=<?php echo $_GET['library_id']; ?>" method="POST">
		<p>
			<label for="firstName">book Name</label> 
			<input type="text" name="title">
		</p>
		<p>
			<label for="firstName">author</label> 
			<input type="text" name="author">
			<input type="submit" name="insertNewbookBtn">
		</p>
	</form>

	<table style="width:100%; margin-top: 50px;">
	  <tr>
	    <th>book ID</th>
	    <th>title</th>
	    <th>author</th>
	    <th>Date Added</th>
	    <th>Action</th>
	  </tr>
	  <?php $getbookBylibrary = getbookBylibrary($pdo, $_GET['library_id']); ?>
	  <?php foreach ($getbookBylibrary as $row) { ?>
	  <tr>
	  	<td><?php echo $row['book_id']; ?></td>	  	
	  	<td><?php echo $row['title']; ?></td>	  	
	  	<td><?php echo $row['author']; ?></td>	  	  	
	  	<td><?php echo $row['date_added']; ?></td>
	  	<td>
	  		<a href="editbook.php?book_id=<?php echo $row['book_id']; ?>&library_id=<?php echo $_GET['library_id']; ?>">Edit</a>

	  		<a href="deletebook.php?book_id=<?php echo $row['book_id']; ?>&library_id=<?php echo $_GET['library_id']; ?>">Delete</a>
	  	</td>	  	
	  </tr>
	<?php } ?>
	</table>

	
</body>
</html>