<?php 
	require_once __DIR__ . '/Auth.php';
	
	$auth = new Auth();

	if (!$auth->check()) {
		header('Location: login.php');
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
	<a href="logout.php">Logout</a>
	<h1>Welcome <?php echo $auth->getUser()->username ?>!</h1>
	<p><?php echo $auth->getUser()->email ?></p>
</div>


</body>
</html>