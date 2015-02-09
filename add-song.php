<?php
	require_once __DIR__ . '/ArtistQuery.php';
	require_once __DIR__ . '/GenreQuery.php';
	require_once __DIR__ . '/Song.php';
	session_start();

	$artistQuery = new ArtistQuery();
	$genreQuery = new GenreQuery();
	$songQuery = new Song();

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if(!isset($_POST['songtitle']) || empty($_POST['genre_opt']) || empty($_POST['artist_opt']) || !isset($_POST['songprice'])) {
			$message = "Necessary fields left blank";
			echo $message;
			echo "<script type='text/javascript'>alert('$message');</script>";
			header("Location: banking.php");
			// header("Location:add-song.php");
		} else {
			if(!is_numeric($_POST['songprice'])) {
				echo "INVALID PRICE";
				$message = "Invalid Price!";
				echo "<script type='text/javascript'>alert('$message');</script>";
				header("Location: banking.php");
			} else {
				echo "SUCCESS";
				$songtitle = $_POST['songtitle'];
				$selectartist = $_POST['artist_opt'];
				$selectgenre =  $_POST['genre_opt'];
				$songprice = $_POST['songprice'];

				$songQuery->setTitle($songtitle);
				$songQuery->setArtist($selectartist);
				$songQuery->setGenreId($selectgenre);
				$songQuery->setPrice($songprice);
				$songQuery->save();
			}
			
		}

	

	} 


?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="bootstrap.min.css">
</head>	
<body>
<div class="container">
	<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<div class = "form-group">
			<label for="title">Title</label>
			<input type="text" name="songtitle" class="form-control" id="song_title">
		</div>
		<div class = "form-group">
			<label for = "artists">Artists</label><br>
			<select name = "artist_opt">
				<option disabled selected> -- Select an Artist -- </option>
				<?php echo $artistQuery->getAll() ?>
			</select>
		</div>
		<div class = "form-group">
			<label for = "genres">Genre</label><br>
			<select name = "genre_opt">
				<option disabled selected> -- Select a Genre -- </option>
				<?php echo $genreQuery->getAll() ?>
			</select>
		</div>
		<div class = "form-group">
			<label for="price">Price</label><br>
			<input type="text" name="songprice" class="form-control" id="price">
		</div>
		<input type="submit" name="submit" class="btn btn-default" value="Insert">
	</form>


</div>

</body>
</html>