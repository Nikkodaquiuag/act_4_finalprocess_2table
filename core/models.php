<?php  

function insertlibrary($pdo, $library_name, $locations, $specialization) {

	$sql = "INSERT INTO library (library_name, locations, specialization) VALUES(?,?,?)";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$library_name, $locations, $specialization]);

	if ($executeQuery) {
		return true;
	}
}



function updatelibrary($pdo, $library_name, $locations, $specialization, $library_id) {

	$sql = "UPDATE library
				SET library_name = ?,
					locations = ?, 
					specialization = ?
				WHERE library_id = ?
			";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$library_name, $locations, $specialization, $library_id]);
	
	if ($executeQuery) {
		return true;
	}

}


function deletelibrary($pdo, $library_id) {
	$deletelibraryProj = "DELETE FROM book WHERE library_id = ?";
	$deleteStmt = $pdo->prepare($deletelibraryProj);
	$executeDeleteQuery = $deleteStmt->execute([$library_id]);

	if ($executeDeleteQuery) {
		$sql = "DELETE FROM library WHERE library_id = ?";
		$stmt = $pdo->prepare($sql);
		$executeQuery = $stmt->execute([$library_id]);

		if ($executeQuery) {
			return true;
		}

	}
	
}




function getAlllibrary($pdo) {
	$sql = "SELECT * FROM library";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute();

	if ($executeQuery) {
		return $stmt->fetchAll();
	}
}

function getlibraryByID($pdo, $library_id) {
	$sql = "SELECT * FROM library WHERE library_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$library_id]);

	if ($executeQuery) {
		return $stmt->fetch();
	}
}





function getbookBylibrary($pdo, $library_id) {
	
	$sql = "SELECT 
				book.book_id AS book_id,
				book.title AS title,
				book.author AS author,
				book.date_added AS date_added,
				CONCAT(library.library_name,' ',library.locations) AS book_owner
			FROM book
			JOIN library ON book.library_id = library.library_id
			WHERE book.library_id = ? 
			GROUP BY book.title;
			";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$library_id]);
	if ($executeQuery) {
		return $stmt->fetchAll();
	}
}


function insertbook($pdo, $title, $author, $library_id) {
	$sql = "INSERT INTO book (title, author, library_id) VALUES (?,?,?)";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$title, $author, $library_id]);
	if ($executeQuery) {
		return true;
	}

}

function getbookByID($pdo, $book_id) {
	$sql = "SELECT 
				book.book_id AS book_id,
				book.title AS title,
				book.author AS author,
				book.date_added AS date_added
			FROM book
			JOIN library ON book.library_id = library.library_id
			WHERE book.book_id  = ? 
			GROUP BY book.title";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$book_id]);
	if ($executeQuery) {
		return $stmt->fetch();
	}
}

function updatebook($pdo, $author, $title, $book_id) {
	$sql = "UPDATE book
			SET title = ?,
				author = ?
			WHERE book_id = ?
			";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$author, $title, $book_id]);

	if ($executeQuery) {
		return true;
	}
}

function deletebook($pdo, $book_id) {
	$sql = "DELETE FROM book WHERE book_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$book_id]);
	if ($executeQuery) {
		return true;
	}
}




?>