<?php

	require_once __DIR__ . '/Database.php';

	class GenreQuery extends Database {
		public function __construct() {
			// session_start();
			parent::__construct();
		}

		public function getAll() {

			$sql = " 
				SELECT *
				FROM genres
				ORDER BY genre
				";

			$statement = static::$pdo->prepare($sql);
			$statement->execute();
			while($result = $statement->fetch(PDO::FETCH_ASSOC)) {
				$id = $result['id'];
				$name = $result['genre'];
				echo "<option value='$id'>$name</option>";
			}
		}

	}



?>