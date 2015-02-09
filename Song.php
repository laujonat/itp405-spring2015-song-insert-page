<?php
	require_once __DIR__ . '/Database.php';

	class Song extends Database {
		protected $title, $id, $genre_id, $price;

		public function __construct() {
			// session_start();
			parent::__construct();
		}

		public function save() {
			// echo $_SESSION['artistname'];


			$stmt = static::$pdo->prepare("INSERT INTO songs (title, artist_id, genre_id, price) VALUES(?, ?, ?, ?)");
			$stmt->bindParam(1, $title2);
			$stmt->bindParam(2, $id2);
			$stmt->bindParam(3, $genre_id2);
			$stmt->bindParam(4, $price2);
			$title2 = $this->title;
			$id2 = $this->id;
			$genre_id2 = $this->genre_id;
			$price2 = $this->price;


			$stmt->execute();	


		}

		public function setTitle($title) {
			$this->title = $title;
		}

		public function setArtist($id) {
			$this->id = $id;
		}

		public function setGenreId($genre_id) {
			$this->genre_id = $genre_id;
		}

		public function setPrice($price) {
			$this->price = $price;
		}

		public function getTitle() {
			return $this->title;
		}

		public function getId() {
			return $this->id;
		}

	}
?>