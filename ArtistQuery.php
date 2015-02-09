<?php 

	require_once __DIR__ . '/Database.php';

	class ArtistQuery extends Database {

		public function __construct() {
			// session_start();
			parent::__construct();
			// echo "constructed";
		}

		public function getAll() {
			$sql = " 
				SELECT *
				FROM artists
				ORDER BY artist_name
				";

			$statement = static::$pdo->prepare($sql);
			$statement->execute();
			// $check = $statement->fetch(PDO::FETCH_ASSOC);
			// echo "<select>";

			while($result = $statement->fetch(PDO::FETCH_ASSOC)) {
				$id = $result['id'];
				$name = $result['artist_name'];
				echo "<option value='$id'>$name</option>";
			}

			// echo "</select>";


		}


	}



?>