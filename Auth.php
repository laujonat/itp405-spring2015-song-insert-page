<?php 

require_once __DIR__ . '/Database.php';

class Auth extends Database {
	public function __construct()
	{
		session_start();
		parent::__construct();
	}

	public function attempt($user, $password)
	{
		$sql = "
			SELECT * 
			FROM users 
			WHERE username = ? AND password = SHA1(?) 
			LIMIT 1
		";

		$statement = static::$pdo->prepare($sql);
		$statement->bindParam(1, $user);
		$statement->bindParam(2, $password);
		$statement->execute();
		$user = $statement->fetch(PDO::FETCH_OBJ);
		
		if ($user) {
			$_SESSION['user'] = $user;

			return true;
		}

		return false;
	}

	public function check()
	{
		if (isset($_SESSION['user'])) {
			return true;
		}

		return false;
	}

	public function logout()
	{
		session_destroy();
	}

	public function getUser()
	{
		if (isset($_SESSION['user'])) {
			return $_SESSION['user'];
		}
	}
}