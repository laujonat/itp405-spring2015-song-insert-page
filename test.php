<?php 

require_once __DIR__ . '/Auth.php';
$auth = new Auth();
var_dump($auth->getUser());
var_dump($auth->check());
var_dump($_SESSION);