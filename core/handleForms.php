<?php 

require_once 'dbConfig.php'; 
require_once 'models.php';

if (isset($_POST['insertlibrarybtn'])) {

	$query = insertlibrary($pdo,$_POST['Library_name'], $_POST['Locations'], $_POST['specialization']);

	if ($query) {
		header("Location: ../index.php");
	}
	else {
		echo "Insertion failed";
	}

}


if (isset($_POST['editlibraryBtn'])) {
	$query = updatelibrary ($pdo,$_POST['library_name'], $_POST['locations'], $_POST['specialization'],$_GET['library_id']);

	if ($query) {
		header("Location: ../index.php");
	}

	else {
		echo "Edit failed";;
	}

}




if (isset($_POST['deletelibraryBtn'])) {
	$query = deletelibrary($pdo, $_GET['library_id']);

	if ($query) {
		header("Location: ../index.php");
	}

	else {
		echo "Deletion failed";
	}
}




if (isset($_POST['insertNewbookBtn'])) {
	$query = insertbook($pdo, $_POST['title'], $_POST['author'], $_GET['library_id']);

	if ($query) {
		header("Location: ../viewbook.php?library_id=" .$_GET['library_id']);
	}
	else {
		echo "Insertion failed";
	}
}




if (isset($_POST['editbookBtn'])) {
	$query = updatebook($pdo, $_POST['title'], $_POST['author'], $_GET['library_id']);

	if ($query) {
		header("Location: ../viewbook.php?library_id=" .$_GET['library_id']);
	}
	else {
		echo "Update failed";
	}

}




if (isset($_POST['deletebookBtn'])) {
	$query = deletebook($pdo, $_GET['book_id']);

	if ($query) {
		header("Location: ../viewbook.php?library_id=" .$_GET['library_id']);
	}
	else {
		echo "Deletion failed";
	}
}




?>